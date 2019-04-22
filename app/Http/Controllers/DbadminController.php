<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Schema;

use App\Photo;
use App\User;
use App\Hub;
use App\Analytic;
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
        //if this ends to early your php memory limit is reached - turn off debug-mode or increase
        $photos = Photo::all();

        DB::beginTransaction(); //better performance

        foreach ($photos as $photo) {
            $photo->updateTags();
            echo "($photo->id) updated $photo->url <br />";
        }

        DB::commit();
    }

    public function cryptPWs(Request $request)
    {
        $users = User::all();

        DB::beginTransaction(); //better performance

        foreach ($users as $user) {
            $user->cryptpw();
            echo "updated $user->username <br />";
        }

        DB::commit();
    }

    public function migrateTable($id, $tablename)
    {
        $this->setdb($id);

        DB::beginTransaction(); //better performance and safer

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists($tablename);
        if ($tablename == "users") Schema::dropIfExists("password_resets"); //users migrates this table too.
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Artisan::call('migrate', array('--path' => "database/migrations/$tablename", '--force' => true));
        Schema::dropIfExists('migrations'); //sorry laravel, but thats the only way.

        DB::commit();

        flash("Table $tablename exists (now).")->success();
        return redirect("/hubs/$id/dba/admin");
    }

    public function fillTables($id, $list)
    {
        $this->setdb($id);

        $a=explode(',',$list);
        foreach ($a as $t) {
            $this->fillTable($id, $t, true);
        }

        return redirect("/hubs/$id/dba/admin");
    }
    
    public function fillTable($id, $tablename, $batch=false)
    {
        if (!$batch) $this->setdb($id);

        $user = null;
        if ($tablename == 'users') $user = User::where('username', '=', 'admin')->first();

        DB::beginTransaction(); //better performance and safer

        if (!Schema::hasTable($tablename)) {
            Artisan::call('migrate', array('--path' => "database/migrations/$tablename", '--force' => true));
            Schema::dropIfExists('migrations'); //sorry laravel, but thats the only way.
        }

        Artisan::call('db:seed', array('--class' => ucfirst($tablename) . "TableSeeder"));

        flash("Table $tablename filled with dummy data.")->success();

        if ($tablename == 'users') {
            if($user) {
                $user = User::create([
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'avatar' => $user->avatar,
                    'role' => 2
                ]);
            }
            else {
                //create dummy dba for managing this hub
                $pw = substr(uniqid(),8);
                $user = User::create([
                    'username' => 'admin',
                    'name' => 'admin',
                    'email' => 'admin@instahub.app',
                    'password' => bcrypt($pw),
                    'avatar' => 'avatar.png',
                    'role' => 2
                ]);
        
                $user->role = 2;
                $user->is_active = true;
                $user->save();

                flash("No DBAs was found. New Passwort for 'admin' was generated: " . $pw)->warning()->important();
            }
        }

        DB::commit();

        if (!$batch) return redirect("/hubs/$id/dba/admin");
    }

    public function dropTable($id, $tablename)
    {
        $this->setdb($id);

        DB::beginTransaction(); //better performance and safer

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists($tablename);
        if ($tablename == "users") Schema::dropIfExists("password_resets"); //users migrates this table too.
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        DB::commit();

        flash("Table $tablename does not (longer) exist.")->success();
        return redirect("/hubs/$id/dba/admin");
    }

    public function setAdminPW($id) {

        $this->setdb($id);

        $pw = substr(uniqid(),8);
        $user = User::where('username', '=', 'admin')->first();
        $user->password = bcrypt($pw);
        $user->save();

        flash("New Passwort for 'admin' was generated: " . $pw)->success()->important();

        return redirect("/hubs/$id/dba/admin");
    }

    public function index($id) 
    {
        $hub = Hub::find($id);

        $this->setdb($id);

        //check actual status
        $dbclass ="";
        $r = DB::table('information_schema.tables')->where('TABLE_TYPE','=','BASE TABLE')->get();
        if (!$r) {
                echo "<div class='alert alert-danger'>Keine Tabellen gefunden.</div>";
        }
        \Debugbar::info($r);
        foreach ($r as $v) {
            $dbclass = $dbclass . "<b>" . $v->TABLE_NAME . ':</b> ' . DB::table($v->TABLE_NAME)->count() . ' rows <br />';
        }

        return view('admin.dbadmin', ['hub' => $hub, 'state' => $dbclass]);
    }

    public function trimAnalytics() 
    {
        $hubs = Hub::all();

        foreach ($hubs as $hub) {
            $this->setdb($hub->id);
            
            if (Schema::hasTable('analytics')) {
                //trim analytics to max 10.000 entries (not exact methode)
                $latest = DB::table('analytics')->latest()->first()->id;
                Analytic::latest()->where('id', '<', $latest-10000)->delete();
            }
        }
    }

    private function setdb($id) 
    {
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
        
        \Debugbar::info('db:' .Config::get('database.default'));
    }


}
