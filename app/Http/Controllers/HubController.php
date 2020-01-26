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
use App\Photo;

use App\Http\Resources\Hub as HubResource;

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
        return view('hub.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function apiIndex() 
    {
        if (Auth::user()->role == 'admin') $hubs = Hub::paginate(30);
        elseif (Auth::user()->role == 'teacher') $hubs = User::find(Auth::user()->id)->hubs()->paginate(30);
        
        return HubResource::collection($hubs);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function apiSearch($text) 
    {
        if (Auth::user()->role == 'admin') $hubs = Hub::where('name', 'LIKE', '%' . $text . '%')->paginate(30);
        elseif (Auth::user()->role == 'teacher') $hubs = User::find(Auth::user()->id)->hubs()->where('name', 'LIKE', '%' . $text . '%')->paginate(30);
        
        return HubResource::collection($hubs);
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
            'hub' => 'required|max:191|alpha_num|unique:hubs,name',
            'password' => 'required|min:5|confirmed',
            'teacher' => [
                'required',
                Rule::exists('users', 'username')->where(function ($query) {
                    $query->where('is_active', 1);
                }),
            ],
            'name' => 'required|max:191',
            'email' =>  'required|email',
			'bio' => 'nullable|max:500',
			'birthday' => 'nullable|date_format:Y-m-d',
			'city' => 'nullable|string',
			'country' => 'nullable|string',
			'centimeters' => 'nullable|numeric',
        ]);

        //check if teacher
        $teacherId = null;
        if (Auth::check()) if(Auth::user()->role='teacher' || Auth::user()->role='mod') $teacherId = Auth::user()->id;

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
            'teacher_id' => ($teacherId) ? $teacherId : User::where('username', '=', $request->teacher)->first()->id, //use own or search teacher.id
            'password' => $pw,
        ]);
        
        //Added create database and databaseuser
        \DB::statement("CREATE DATABASE IF NOT EXISTS ". env('DB_DATABASE') ."_" . $hub->id . ";");
        \DB::statement("GRANT ALL ON ". env('DB_DATABASE') ."_" . $hub->id . ".* TO '". env('DB_DATABASE') ."_" . $hub->id . "'@'localhost'IDENTIFIED BY '" . $hub->password . "';");
        
        if(env('ALLOW_PUBLIC_DB_ACCESS')) { //second user needed because % means all except localhost
            \DB::statement("GRANT ALL ON ". env('DB_DATABASE') ."_" . $hub->id . ".* TO '". env('DB_DATABASE') ."_" . $hub->id . "'@'%'IDENTIFIED BY '" . $hub->password . "';");
        }

        //set db
        Config::set("database.connections." . env('DB_DATABASE') . "_" . $hub->id, array(
            'driver'    => 'mysql',
            'host'      => env('DB_HOST'),
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
            'bio' => $request->bio ?: null,
            'gender' => $request->gender ?: null,
            'birthday' => $request->birthday ?: null,
            'city' => $request->city ?: null,
            'country' => $request->country ?: null,
            'centimeters' => $request->centimeters ?: null,
            'avatar' => $url,
            'role' => 2
        ]);

        $user->role = 2;
        $user->save();

        DB::commit();

        if(!$teacherId) {
            //created by student
            flash(__('Your hub must be activated by your teacher!'))->warning();
            return redirect("https://" . $hub->name . env('SESSION_DOMAIN')  . "/home");
        }
        else {
            //created by teacher
            $user->is_active = 1; //trust himself
            $user->save();

            return redirect("/home");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $hub = Hub::findOrFail($id);
        abort_unless($hub->teacher_id == Auth::user()->id || Auth::user()->role == 'admin', 401);

        //set db
        Config::set("database.connections." . env('DB_DATABASE') . "_" . $hub->id, array(
            'driver'    => 'mysql',
            'host'      => env('DB_HOST'),
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
        Session::put('user_hub', $hub->name);
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
        $hub = Hub::findOrFail($id);
        abort_unless($hub->teacher_id == Auth::user()->id || Auth::user()->role == 'admin', 401);

        //delete all old photos from disk
        //set db
        Config::set("database.connections." . env('DB_DATABASE') . "_" . $hub->id, array(
            'driver'    => 'mysql',
            'host'      => env('DB_HOST'),
            'database'  => env('DB_DATABASE') . "_" . $hub->id,
            'username'  => env('DB_DATABASE') . "_" . $hub->id,
            'password'  => $hub->password,
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ));

        Config::set('database.default', env('DB_DATABASE') . "_" . $hub->id);

        if (Schema::hasTable('photos')) {
            $photos = Photo::all();
            foreach ($photos as $photo) {
                // _960 cant (hopfully) part of an uuid, so it is an present photo
                if (strpos($photo->url, '_960') == false) {
                    Storage::disk('local')->delete($photo->url);
                }
            }
        }

        $avatars = User::all();
        foreach ($avatars as $avatar) {
            $preset_avatars = array("avatar.png", "001.jpg","002.jpg","003.jpg","004.jpg","005.jpg","006.jpg","007.jpg","008.jpg","009.jpg","010.jpg","011.jpg","012.jpg","013.jpg","014.jpg","015.jpg","016.jpg","017.jpg","018.jpg","019.jpg","020.jpg","021.jpg","022.jpg","023.jpg","024.jpg","025.jpg","026.jpg","027.jpg","028.jpg","029.jpg","030.jpg","031.jpg","032.jpg","033.jpg","034.jpg","035.jpg","036.jpg","037.jpg","038.jpg","039.jpg","040.jpg","041.jpg","042.jpg","043.jpg","044.jpg","045.jpg","046.jpg","047.jpg","048.jpg","049.jpg","050.jpg","051.jpg","052.jpg","053.jpg","054.jpg","055.jpg","056.jpg","057.jpg","058.jpg","059.jpg","060.jpg","061.jpg","062.jpg","063.jpg","064.jpg","065.jpg","066.jpg","067.jpg","068.jpg","069.jpg","070.jpg","071.jpg","072.jpg","073.jpg","074.jpg","075.jpg","076.jpg","077.jpg","078.jpg","079.jpg","080.jpg","081.jpg","082.jpg","083.jpg","084.jpg","085.jpg","086.jpg","087.jpg","088.jpg","089.jpg","090.jpg","091.jpg","092.jpg","093.jpg","094.jpg","095.jpg","096.jpg","097.jpg","098.jpg","099.jpg","100.jpg","101.jpg","102.jpg","103.jpg","104.jpg","105.jpg","106.jpg","107.jpg","108.jpg","109.jpg","110.jpg","111.jpg","112.jpg","113.jpg","114.jpg","115.jpg","116.jpg","117.jpg","118.jpg","119.jpg","120.jpg","121.jpg","122.jpg","123.jpg","124.jpg","125.jpg","126.jpg","127.jpg","128.jpg","129.jpg","130.jpg","131.jpg","132.jpg","133.jpg","134.jpg","135.jpg","136.jpg","137.jpg","138.jpg","139.jpg","140.jpg","141.jpg","142.jpg","143.jpg","144.jpg","145.jpg","146.jpg","147.jpg","148.jpg","149.jpg","150.jpg","151.jpg","152.jpg","153.jpg","154.jpg","155.jpg","156.jpg","157.jpg","158.jpg","159.jpg","160.jpg","161.jpg","162.jpg","163.jpg","164.jpg","165.jpg","166.jpg","167.jpg","168.jpg","169.jpg","170.jpg","171.jpg","172.jpg","173.jpg","174.jpg","175.jpg","176.jpg","177.jpg","178.jpg","179.jpg","180.jpg","181.jpg","182.jpg","183.jpg","184.jpg","185.jpg","186.jpg","187.jpg","188.jpg","189.jpg","190.jpg","191.jpg","192.jpg","193.jpg","194.jpg","195.jpg","196.jpg","197.jpg","198.jpg","199.jpg","200.jpg","201.jpg","202.jpg","203.jpg");
            $filename = $avatar->avatar;
            if ($filename != 'avatar.png') $filename = explode("/", $filename)[1];
            if (!in_array($filename, $preset_avatars)) {
                //uploaded avater
                Storage::disk('local')->delete($avatar->avatar);
            }
        }

        //set primary db
        Config::set('database.default', env('DB_CONNECTION'));

        \DB::statement("DROP DATABASE IF EXISTS ". env('DB_DATABASE') ."_" . $hub->id . ";");
        \DB::statement("DROP USER IF EXISTS '". env('DB_DATABASE') ."_" . $hub->id . "'@'localhost';");
        \DB::statement("DROP USER IF EXISTS '". env('DB_DATABASE') ."_" . $hub->id . "'@'%';");
        
        $hub->delete();

        return response()->json([
            'destroyed' => true
        ]);
    }

    /**
     * setActivate Hub.
     *
     * @param  int  $id
     * @return active
     */
     public function setActivate(Request $request)
     {
        //set db
        $hub = Hub::findOrFail($request->id);
        abort_unless($hub->teacher_id == Auth::user()->id || Auth::user()->role == 'admin', 401);

        Config::set("database.connections." . env('DB_DATABASE') . "_" . $hub->id, array(
            'driver'    => 'mysql',
            'host'      => env('DB_HOST'),
            'database'  => env('DB_DATABASE') . "_" . $hub->id,
            'username'  => env('DB_DATABASE') . "_" . $hub->id,
            'password'  => $hub->password,
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ));

        Config::set('database.default', env('DB_DATABASE') . "_" . $hub->id);
        
        $user = User::where('username', '=', 'admin')->first();
        $user->is_active = $request->activate;
        $user->save();

        return response()->json([
            'activate' => $request->activate
        ]);
     }

    /**
     * setReadonly Hub.
     *
     * @param  int  $id
     * @return active
     */
     public function setReadonly(Request $request)
     {
        $hub = Hub::findOrFail($request->id);
        abort_unless($hub->teacher_id == Auth::user()->id || Auth::user()->role == 'admin', 401);

        if($request->readonly) {
            \DB::statement("REVOKE ALL ON ". env('DB_DATABASE') ."_" . $hub->id . ".* FROM '". env('DB_DATABASE') ."_" . $hub->id . "'@'localhost';");
            \DB::statement("GRANT SELECT ON ". env('DB_DATABASE') ."_" . $hub->id . ".* TO '". env('DB_DATABASE') ."_" . $hub->id . "'@'localhost';");
            //a bit hacky to prevent failing if table does not exist you have to grant 'CREATE', but you may remove it later
            \DB::statement("GRANT CREATE, INSERT ON ". env('DB_DATABASE') ."_" . $hub->id . ".analytics TO '". env('DB_DATABASE') ."_" . $hub->id . "'@'localhost';");
            \DB::statement("REVOKE CREATE ON ". env('DB_DATABASE') ."_" . $hub->id . ".analytics FROM '". env('DB_DATABASE') ."_" . $hub->id . "'@'localhost';");
    
            //otherwise logout will fail
            \DB::statement("GRANT UPDATE (remember_token, updated_at) ON ". env('DB_DATABASE') ."_" . $hub->id . ".users TO '". env('DB_DATABASE') ."_" . $hub->id . "'@'localhost';");
            
            if(env('ALLOW_PUBLIC_DB_ACCESS')) { //second user needed because % means all except localhost
                \DB::statement("REVOKE ALL ON ". env('DB_DATABASE') ."_" . $hub->id . ".* FROM '". env('DB_DATABASE') ."_" . $hub->id . "'@'%'");
                \DB::statement("GRANT SELECT ON ". env('DB_DATABASE') ."_" . $hub->id . ".* TO '". env('DB_DATABASE') ."_" . $hub->id . "'@'%';");
                //a bit hacky to prevent failing if table does not exist you have to grant 'CREATE', but you may remove it later
                \DB::statement("GRANT CREATE, INSERT ON ". env('DB_DATABASE') ."_" . $hub->id . ".analytics TO '". env('DB_DATABASE') ."_" . $hub->id . "'@'%';");
                \DB::statement("REVOKE CREATE ON ". env('DB_DATABASE') ."_" . $hub->id . ".analytics FROM '". env('DB_DATABASE') ."_" . $hub->id . "'@'%';");
            }
        }
        else {
            \DB::statement("GRANT ALL ON ". env('DB_DATABASE') ."_" . $hub->id . ".* TO '". env('DB_DATABASE') ."_" . $hub->id . "'@'localhost'IDENTIFIED BY '" . $hub->password . "';");
        
            if(env('ALLOW_PUBLIC_DB_ACCESS')) { //second user needed because % means all except localhost
                \DB::statement("GRANT ALL ON ". env('DB_DATABASE') ."_" . $hub->id . ".* TO '". env('DB_DATABASE') ."_" . $hub->id . "'@'%'IDENTIFIED BY '" . $hub->password . "';");
            }
        }

        return response()->json([
            'readonly' => $request->readonly
        ]);
     }
}
