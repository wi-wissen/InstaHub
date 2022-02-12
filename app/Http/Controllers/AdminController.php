<?php

namespace App\Http\Controllers;

use App\Facades\RequestHub;
use App\Models\Analytic;
use App\Models\Hub;
use App\Models\Photo;
use App\Models\User;
use Artisan;
use Auth;
use Config;
use DB;
use Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Schema;

class AdminController extends Controller
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
        if ($hub->teacher_id == Auth::id() || Auth::user()->role == 'admin') {
            RequestHub::setHubDB($hub->id);

            foreach ($request->tables as $t) {
                if ($request->action == 'fill') {
                    $this->fillTable($t);
                } elseif ($request->action == 'drop') {
                    $this->dropTable($t);
                } elseif ($request->action == 'create') {
                    $this->migrateTable($t);
                }
            }

            return response()->json($this->messages);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    private function migrateTable($tablename)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists($tablename);
        if ($tablename == 'users') {
            Schema::dropIfExists('password_resets');
        } //users migrates this table too.
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Artisan::call('migrate', ['--path' => "database/migrations/$tablename", '--force' => true]);
        Schema::dropIfExists('migrations'); //sorry laravel, but thats the only way.

        $this->messages[] = "Table $tablename exists (now).";
    }

    private function fillTable($tablename)
    {
        $user = null;
        if ($tablename == 'users' && RequestHub::hasTable('users')) {
            $user = User::where('username', '=', 'admin')->first();
        }

        if (! RequestHub::hasTable($tablename)) {
            Artisan::call('migrate', ['--path' => "database/migrations/$tablename", '--force' => true]);
            Schema::dropIfExists('migrations'); //sorry laravel, but thats the only way.
        }

        Artisan::call('db:seed', ['--class' => ucfirst($tablename).'TableSeeder', '--force' => true]);

        $this->messages[] = "Table $tablename filled with dummy data.";

        if ($tablename == 'users') {
            if ($user) {
                $user = User::create([
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'avatar' => $user->avatar,
                    'is_active' => $user->is_active,
                ]);
            } else {
                //create dummy dba for managing this hub
                $pw = substr(uniqid(), 8);
                $user = User::create([
                    'username' => 'admin',
                    'name' => 'admin',
                    'email' => 'admin@instahub.test',
                    'password' => bcrypt($pw),
                    'avatar' => 'avatar.png',
                    'is_active' => true,
                ]);

                $this->messages[] = "No DBAs was found. New Passwort for 'admin' was generated: ".$pw;
            }

            $user->role = 2; //dba - role is not massfillable for security reasons
            $user->save();
        }
    }

    private function dropTable($tablename)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists($tablename);
        if ($tablename == 'users') {
            Schema::dropIfExists('password_resets');
        } //users migrates this table too.
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $this->messages[] = "Table $tablename does not (longer) exist.";
    }

    public function setAdminPW($id)
    {
        RequestHub::setHubDB($id);

        if (! RequestHub::hasTable('users')) {
            $this->migrateTable('users');
        } //to make sure that needed table exists

        $pw = substr(uniqid(), 8);
        $user = User::where('username', '=', 'admin')->first();

        if ($user) {
            $user->password = bcrypt($pw);
            $user->save();
        } else {
            $user = User::create([
                'username' => 'admin',
                'name' => 'admin',
                'email' => 'admin@instahub.test',
                'password' => bcrypt($pw),
                'avatar' => 'avatar.png',
                'is_active' => true,
            ]);
        }

        return response()->json([
            'pw' => $pw,
        ]);
    }

    public function getTableStatus($id)
    {
        $hub = Hub::find($id);

        RequestHub::setHubDB($id);

        //check actual status
        $dbclass = '';
        $r = DB::table('information_schema.tables')->where('TABLE_TYPE', '=', 'BASE TABLE')->get();
        if (! $r) {
            echo "<div class='alert alert-danger'>Keine Tabellen gefunden.</div>";
        }
        Debugbar::info($r);
        foreach ($r as $v) {
            $dbclass = $dbclass.'<b>'.$v->TABLE_NAME.':</b> '.DB::table($v->TABLE_NAME)->count().' rows <br />';
        }

        return response()->json([
            'state' => $dbclass,
        ]);
    }

    public function trimAnalytics()
    {
        $hubs = Hub::all();

        foreach ($hubs as $hub) {
            RequestHub::setHubDB($hub->id);

            if (RequestHub::hasTable('analytics')) {
                //trim analytics to max 10.000 entries (not exact methode)
                $latest = DB::table('analytics')->latest()->first()->id;
                Analytic::latest()->where('id', '<', $latest - 10000)->delete();
            }
        }
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

        RequestHub::setHubDB($hub->id);

        $user = User::where('username', '=', 'admin')->first();
        $user->is_active = $request->activate;
        $user->save();

        return response()->json([
            'activate' => $request->activate,
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

        if ($request->readonly) {
            \DB::statement('REVOKE ALL ON '.env('DB_DATABASE').'_'.$hub->id.".* FROM '".env('DB_DATABASE').'_'.$hub->id."'@'localhost';");
            \DB::statement('GRANT SELECT ON '.env('DB_DATABASE').'_'.$hub->id.".* TO '".env('DB_DATABASE').'_'.$hub->id."'@'localhost';");
            //a bit hacky to prevent failing if table does not exist you have to grant 'CREATE', but you may remove it later
            \DB::statement('GRANT CREATE, INSERT ON '.env('DB_DATABASE').'_'.$hub->id.".analytics TO '".env('DB_DATABASE').'_'.$hub->id."'@'localhost';");
            \DB::statement('REVOKE CREATE ON '.env('DB_DATABASE').'_'.$hub->id.".analytics FROM '".env('DB_DATABASE').'_'.$hub->id."'@'localhost';");

            //otherwise logout will fail
            \DB::statement('GRANT UPDATE (remember_token, updated_at) ON '.env('DB_DATABASE').'_'.$hub->id.".users TO '".env('DB_DATABASE').'_'.$hub->id."'@'localhost';");

            if (config('app.allow_public_db_access')) { //second user needed because % means all except localhost
                \DB::statement('REVOKE ALL ON '.env('DB_DATABASE').'_'.$hub->id.".* FROM '".env('DB_DATABASE').'_'.$hub->id."'@'%'");
                \DB::statement('GRANT SELECT ON '.env('DB_DATABASE').'_'.$hub->id.".* TO '".env('DB_DATABASE').'_'.$hub->id."'@'%';");
                //a bit hacky to prevent failing if table does not exist you have to grant 'CREATE', but you may remove it later
                \DB::statement('GRANT CREATE, INSERT ON '.env('DB_DATABASE').'_'.$hub->id.".analytics TO '".env('DB_DATABASE').'_'.$hub->id."'@'%';");
                \DB::statement('REVOKE CREATE ON '.env('DB_DATABASE').'_'.$hub->id.".analytics FROM '".env('DB_DATABASE').'_'.$hub->id."'@'%';");
            }
        } else {
            \DB::statement('GRANT ALL ON '.env('DB_DATABASE').'_'.$hub->id.".* TO '".env('DB_DATABASE').'_'.$hub->id."'@'localhost'IDENTIFIED BY '".$hub->password."';");

            if (config('app.allow_public_db_access')) { //second user needed because % means all except localhost
                \DB::statement('GRANT ALL ON '.env('DB_DATABASE').'_'.$hub->id.".* TO '".env('DB_DATABASE').'_'.$hub->id."'@'%'IDENTIFIED BY '".$hub->password."';");
            }
        }

        return response()->json([
            'readonly' => $request->readonly,
        ]);
    }

    /**
     * Redirect to the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function redirect($id)
    {
        $hub = Hub::findOrFail($id);
        abort_unless($hub->teacher_id == Auth::user()->id || Auth::user()->role == 'admin', 401);

        $secret = bin2hex(random_bytes(32));
        Cache::put('hub-'.$id.'-auth-token', $secret, 120); //sessions are isolated, so we use cache to store a 64-char secret

        return redirect(RequestHub::url($hub->name).'/login/'.$secret);
    }
}
