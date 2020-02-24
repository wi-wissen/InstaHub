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
    private $messages; //for functions that call other functions

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

    /**
     * change tables.
     *
     * @return Response
     */
    public function changeTable(Request $request) 
    {
        $hub = Hub::where('name', $request->name)->firstOrFail();
        if($hub->teacher_id == Auth::id() || Auth::user()->role == 'admin') {
            $this->setdb($hub->id);

            foreach ($request->tables as $t) {
                if ($request->action == 'fill')
                    $this->fillTable($hub->id, $t);
                elseif ($request->action == 'drop') {
                    $this->dropTable($hub->id, $t);
                }
                elseif ($request->action == 'create') {
                    $this->migrateTable($hub->id, $t);
                }
            }

            return response()->json($this->messages);
        }
        else {
            abort(403, 'Unauthorized action.');
        }
    }

    private function migrateTable($id, $tablename)
    {
        DB::beginTransaction(); //better performance and safer

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists($tablename);
        if ($tablename == "users") Schema::dropIfExists("password_resets"); //users migrates this table too.
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Artisan::call('migrate', array('--path' => "database/migrations/$tablename", '--force' => true));
        Schema::dropIfExists('migrations'); //sorry laravel, but thats the only way.

        DB::commit();

        $this->messages[] = "Table $tablename exists (now).";
    }

    private function fillTable($id, $tablename)
    {
        $user = null;
        if ($tablename == 'users') $user = User::where('username', '=', 'admin')->first();

        DB::beginTransaction(); //better performance and safer

        if (!Schema::hasTable($tablename)) {
            Artisan::call('migrate', array('--path' => "database/migrations/$tablename", '--force' => true));
            Schema::dropIfExists('migrations'); //sorry laravel, but thats the only way.
        }

        Artisan::call('db:seed', array('--class' => ucfirst($tablename) . "TableSeeder", '--force' => true));

        $this->messages[] = "Table $tablename filled with dummy data.";

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

                $this->messages[] = "No DBAs was found. New Passwort for 'admin' was generated: " . $pw;
            }
        }

        DB::commit();
    }

    private function dropTable($id, $tablename)
    {
        DB::beginTransaction(); //better performance and safer

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists($tablename);
        if ($tablename == "users") Schema::dropIfExists("password_resets"); //users migrates this table too.
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        DB::commit();

        $this->messages[] = "Table $tablename does not (longer) exist.";
    }

    public function setAdminPW($id) {

        $this->setdb($id);

        $pw = substr(uniqid(),8);
        $user = User::where('username', '=', 'admin')->first();
        $user->password = bcrypt($pw);
        $user->save();

        return response()->json([
            'pw' => $pw
        ]);
    }

    public function index($id) 
    {
        $hub = Hub::find($id);
        return view('admin.dbadmin', ['hub' => $hub]);
    }

    public function getTableStatus($id) 
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

        return response()->json([
            'state' => $dbclass
        ]);
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
            'host'      => env('DB_HOST'),
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
