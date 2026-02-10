<?php

namespace App\Http\Controllers;

use App\Facades\RequestHub;
use App\Models\Hub;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Laravel\Facades\Image;

class HubController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:teacher'])->except(['welcome', 'create', 'store']);
        $this->middleware('can:viewAny,App\Models\Hub')->only('index');
        $this->middleware('can:view,hub')->only('show');
        $this->middleware('can:create,App\Models\Hub')->only('create', 'store');
        $this->middleware('can:update,hub')->only('edit', 'update');
        $this->middleware('can:delete,hub')->only('destroy');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'hub' => 'required|max:255|alpha_num|unique:hubs,name',
            'password' => 'required|min:5|confirmed',
            'teacher' => [
                'required',
                Rule::exists('users', 'username')->where(function ($query) {
                    $query->where('is_active', 1);
                }),
            ],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $query = (Auth::user()->role == 'admin')
            ? Hub::query() // admin
            : User::find(Auth::user()->id)->hubs(); // teacher

        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%");
            });
        }

        $hubs = $query->paginate(10)->withQueryString();

        return view('hub.index', compact('hubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (! session('_old_input.hub', null)) {
            $word = config('app.hub_words');
            $number = config('app.hub_numbers');

            do {
                $name = '';
                $name = $name.$word[rand(0, count($word) - 1)];
                $name = $name.rand(0, $number);
            } while (Hub::where('name', '=', $name)->exists());

            session(['register_hub_name' => strtolower($name)]);
        }

        return view('hub.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hub' => [
                'required',
                'max:191',
                'alpha_num',
                'unique:hubs,name',
                function ($attribute, $value, $fail) {
                    if (Auth::guest() && $value !== session('register_hub_name', null)) {
                        $fail(__('Only predefined hub names are allowed.'));
                    }
                },
            ],
            'password' => 'required|min:5|confirmed',
            'teacher' => [
                'required',
                Rule::exists('users', 'username')->where(function ($query) {
                    $query->where('is_active', 1);
                }),
            ],
            'name' => 'required|max:191',
            'username' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value !== 'admin') {
                        $fail(__('Username is not `admin`.'));
                    }
                },
            ],
            'email' => 'required|email',
            'bio' => 'nullable|max:500',
            'birthday' => 'nullable|date_format:Y-m-d',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'centimeters' => 'nullable|numeric',
        ]);

        // check if teacher
        $teacherId = null;
        if (Auth::check()) {
            if (Auth::user()->role = 'teacher' || Auth::user()->role = 'mod') {
                $teacherId = Auth::user()->id;
            }
        }

        // generate db password
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!§$%&/()=?{[]}+-#';
        $count = mb_strlen($chars);

        for ($i = 0, $pw = ''; $i < 8; $i++) {
            $index = rand(0, $count - 1);
            $pw .= mb_substr($chars, $index, 1);
        }

        // create hub
        $teacherUser = User::where('username', '=', $request->teacher)->firstOrFail();
        $hub = Hub::create([
            'name' => $request->hub,
            'teacher_id' => ($teacherId) ? $teacherId : $teacherUser->id, // use own or search teacher.id
            'password' => $pw,
            'generation' => $teacherUser->hub_default_generation,
            'query_level' => $teacherUser->hub_default_query_level,
        ]);

        // unset used hub name
        session(['register_hub_name' => null]);

        // Added create database and databaseuser
        DB::statement('CREATE DATABASE IF NOT EXISTS '.env('DB_DATABASE').'_'.$hub->id.';');
        DB::statement('GRANT ALL ON '.env('DB_DATABASE').'_'.$hub->id.".* TO '".env('DB_DATABASE').'_'.$hub->id."'@'localhost' IDENTIFIED BY '".$hub->password."';");

        if (config('app.allow_public_db_access')) { // second user needed because % means all except localhost
            DB::statement('GRANT ALL ON '.env('DB_DATABASE').'_'.$hub->id.".* TO '".env('DB_DATABASE').'_'.$hub->id."'@'%' IDENTIFIED BY '".$hub->password."';");
        }

        RequestHub::useHubDB($hub->id, function () use ($teacherUser, $request, $teacherId, $hub) {
            // hydrate hub
            if ($teacherUser->hub_default_creating == 'users') {
                $hub->changeTables(['users'], 'fill');
            } elseif ($teacherUser->hub_default_creating == 'all_empty') {
                $hub->changeTables(['users', 'photos', 'tags', 'likes', 'follows', 'comments', 'analytics', 'ads'], 'create');
            } elseif ($teacherUser->hub_default_creating == 'all_full') {
                $hub->changeTables(['users', 'photos', 'tags', 'likes', 'follows', 'comments', 'analytics', 'ads'], 'fill');
            }

            // insert admin
            $url = 'avatar.png';
            if ($request->hasFile('avatar')) {
                if ($request->file('avatar')->isValid()) {
                    // Bild quadratisch zuschneiden, auf max 512px und als WebP speichern
                    $image = Image::read($request->file('avatar'));
                    $image->coverDown(512, 512, 'center');

                    $url = 'avatars/'.Str::random(40).'.webp';
                    Storage::put($url, $image->toWebp(quality: 90));
                }
            }

            $admin = User::where('username', 'admin')->first();
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'bio' => $request->bio,
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'city' => $request->city,
                'country' => $request->country,
                'centimeters' => $request->centimeters,
                'avatar' => $url,
                'is_active' => ($teacherId && Auth::user()->id == $teacherId), // trust yourself
            ]);
        });

        if ($teacherId && Auth::user()->id == $teacherId) {
            // created by user itself
            return redirect('/');
        } else {
            // created by student or for other teacher by a teacher
            flash(__('Your hub must be activated by your teacher!'))->warning();

            return redirect(str_replace('{subdomain}', $hub->name, config('app.url_hub')));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Hub $hub)
    {
        return view('hub.show', ['hub' => $hub]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Hub $hub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Hub $hub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Hub $hub)
    {
        abort_unless($hub->teacher_id == Auth::user()->id || Auth::user()->role == 'admin', 401);

        $hub->delete();

        return response()->json([
            'destroyed' => true,
        ]);
    }
}
