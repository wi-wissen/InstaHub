<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Schema;

use App\Photo;
use App\User;
use App\Hub;
use Auth;
use DB;
use Config;

class DbadminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateTags(Request $request)
    {
        $photos = Photo::all();

        DB::beginTransaction(); //better performance

        foreach ($photos as $photo) {
            $photo->updateTags();
            echo "updated $photo->id <br />";
        }

        DB::commit();
    }

    public function cryptPWs(Request $request)
    {
        $users = User::all();

        DB::beginTransaction(); //better performance

        foreach ($users as $user) {
            $user->cryptpw();
            echo "updated $user->id <br />";
        }

        DB::commit();
    }

    public function migrateTable($id, $tablename)
    {
        $this->setdb($id);

        Schema::dropIfExists($tablename);
        
        Artisan::call('migrate', array('--path' => "database/migrations/$tablename", '--force' => true));
        Schema::dropIfExists('migrations'); //sorry laravel, but thats the only way.

        flash("Table $tablename exists (now).")->success();
        return redirect("/hubs/$id/dba/admin");
    }

    public function fillTable($id, $tablename)
    {
        $this->setdb($id);

        if (!Schema::hasTable($tablename)) {
            Artisan::call('migrate', array('--path' => "database/migrations/$tablename", '--force' => true));
            Schema::dropIfExists('migrations'); //sorry laravel, but thats the only way.
        }

        Artisan::call('db:seed', array('--class' => ucfirst($tablename) . "TableSeeder"));

        flash("Table $tablename filled with dummy data.")->success();

        if ($tablename == 'users') {
            //create dummy dba for managing this hub
            $user = User::create([
                'username' => 'admin',
                'name' => 'admin',
                'email' => 'admin@instahub.app',
                'password' => bcrypt(uniqid()),
                'avatar' => 'avatar.png',
                'role' => 2
            ]);
    
            $user->role = 2;
            $user->is_active = true;
            $user->save();

            flash("All DBAs are lost. New one is generated. Please create new one or reset password.")->warning();
        }

        return redirect("/hubs/$id/dba/admin");
    }

    public function dropTable($id, $tablename)
    {
        $this->setdb($id);

        Schema::dropIfExists($tablename);

        flash("Table $tablename does not (longer) exist.")->success();
        return redirect("/hubs/$id/dba/admin");
    }

    public function index($id) 
    {
        return view('admin.dbadmin', ['hub' => Hub::find($id)]);
    }

    private function setdb($id) 
    {
        $hub = Hub::find($id);
        
        Config::set("database.connections." . env('DB_DATABASE') . "_" . $hub->name, array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => env('DB_DATABASE') . "_" . $hub->name,
            'username'  => env('DB_DATABASE') . "_" . $hub->name,
            'password'  => $hub->password,
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        Config::set('database.default', env('DB_DATABASE') . "_" . $hub->name);
        
        \Debugbar::info('db:' .Config::get('database.default'));
    }


}
