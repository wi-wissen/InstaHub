<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Http\Requests;
use Storage;
use Auth;
use Config;
use Artisan;
use Schema;
use Session;
use DB;

use App\Like;
use App\Hub;
use App\User;

class HubController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:teacher'])->except(['welcome', 'create', 'store']);;
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
    public function index()
    {
        $hubs = [];
        if (Auth::user()->role == 'admin') $hubs = Hub::paginate(20);
        elseif (Auth::user()->role == 'teacher') $hubs = User::find(Auth::user()->id)->hubs()->paginate(20);

        return view('hub.index')->with('hubs', $hubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $word = explode(',', env('WORD'));
        $number = env('WORD_NUMBER');

        do {
            $name = "";
            $name = $name . $word[rand(0, count($word)-1)];
            $name = $name . rand(0, $number);
        } while (Hub::where('name', '=', $name)->exists());
        
        return view('hub.create')->with(['username' => 'admin', 'hub' => strtolower($name)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'hub' => 'required|max:255|alpha_num|unique:hubs,name',
            'password' => 'required|min:5|confirmed',
            'teacher' => [
                'required',
                Rule::exists('users', 'username')->where(function ($query) {
                    $query->where('is_active', 1);
                }),
            ]
        ]);



        //generate db password
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!§$%&/()=?{[]}+-#';
        $count = mb_strlen($chars);

        for ($i = 0, $pw = ''; $i < 8; $i++) {
            $index = rand(0, $count - 1);
            $pw .= mb_substr($chars, $index, 1);
        }

        //create hub
        $hub = Hub::create([
            'name' => $request->hub,
            'teacher_id' => User::where('username', '=', $request->teacher)->first()->id,
            'password' => $pw,
        ]);
        
        //Added create database and databaseuser
        \DB::statement("CREATE DATABASE IF NOT EXISTS ". env('DB_DATABASE') ."_" . $hub->id . ";");
        
        $host = "localhost";
        if(env('ALLOW_PUBLIC_DB_ACCESS')) $host = "%";

        \DB::statement("GRANT ALL ON ". env('DB_DATABASE') ."_" . $hub->id . ".* TO '". env('DB_DATABASE') ."_" . $hub->id . "'@'" . $host . "'IDENTIFIED BY '" . $hub->password . "';");
 
        //set db
        Config::set("database.connections." . env('DB_DATABASE') . "_" . $hub->id, array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => env('DB_DATABASE') . "_" . $hub->id,
            'username'  => env('DB_DATABASE') . "_" . $hub->id,
            'password'  => $hub->password,
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ));

        Config::set('database.default', env('DB_DATABASE') . "_" . $hub->id);


        DB::beginTransaction(); //better performance and safer
    
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('users'); //not necesary but sometimes happend strage bug while registering..
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Artisan::call('migrate', array('--path' => "database/migrations/users", '--force' => true));
        Artisan::call('db:seed', array('--class' => "UsersTableSeeder", '--force' => true));
        Schema::dropIfExists('migrations'); //sorry laravel, but thats the only way.

        //insert admin
        $url = "avatar.png";
        if ($request->hasFile('avatar')) {
			if ($request->file('avatar')->isValid()) {
                $url = Storage::putFile('avatars', $request->avatar);
            }
		}

        $user = User::create([
            'username' => 'admin',
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'bio' => $request->bio,
            'gender' => $request->gender,
            'birthday' => $request->birthday_birthDay,
            'city' => $request->city,
            'country' => $request->country,
            'centimeters' => $request->centimeters,
            'avatar' => $url,
            'role' => 2
        ]);

        $user->role = 2;
        $user->save();

        DB::commit();

        flash('Your hub must be activated by your teacher!')->warning();
        return redirect("https://" . $hub->name . env('SESSION_DOMAIN')  . "/home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $hub = Hub::find($id);

        //set db
        Config::set("database.connections." . env('DB_DATABASE') . "_" . $hub->id, array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => env('DB_DATABASE') . "_" . $hub->id,
            'username'  => env('DB_DATABASE') . "_" . $hub->id,
            'password'  => $hub->password,
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ));

        Config::set('database.default', env('DB_DATABASE') . "_" . $hub->id);

        $user = User::where('role', '=', 'dba')->first();
        Auth::login($user);
        Session::set('user_hub', $hub->name);
        \Debugbar::info('logged in as' . $user->username);


        return redirect('https://' . $hub->name . env('SESSION_DOMAIN')  . '/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $hub = Hub::find($id);

        \DB::statement("DROP DATABASE IF EXISTS ". env('DB_DATABASE') ."_" . $hub->name . ";");
        \DB::statement("DROP USER IF EXISTS '". env('DB_DATABASE') ."_" . $hub->name . "'@'localhost';");
        
        $hub->delete();

        flash('Hub deleted')->success();
        return redirect("/hubs");
    }

    /**
     * Activate Hub (admin user).
     *
     * @param  int  $id
     * @return Response
     */
     public function activate($id)
     {
        //set db
        $hub = Hub::find($id);
        Config::set("database.connections." . env('DB_DATABASE') . "_" . $hub->id, array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => env('DB_DATABASE') . "_" . $hub->id,
            'username'  => env('DB_DATABASE') . "_" . $hub->id,
            'password'  => $hub->password,
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ));

        Config::set('database.default', env('DB_DATABASE') . "_" . $hub->id);
        
        $user = User::where('username', '=', 'admin')->first();
        $user->is_active = true;
        $user->save();

        flash('Hub activated')->success();
        return redirect("/hubs");
     }

     public function deactivate($id)
     {
        //set db
        $hub = Hub::find($id);
        Config::set("database.connections." . env('DB_DATABASE') . "_" . $hub->id, array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => env('DB_DATABASE') . "_" . $hub->id,
            'username'  => env('DB_DATABASE') . "_" . $hub->id,
            'password'  => $hub->password,
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ));

        Config::set('database.default', env('DB_DATABASE') . "_" . $hub->id);
        
        $user = User::where('username', '=', 'admin')->first();
        $user->is_active = false;
        $user->save();

        flash('Hub deactivated')->success();
        return redirect("/hubs");
     }

}