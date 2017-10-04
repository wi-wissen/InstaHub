<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Schema;

use App\Photo;
use App\User;
use Auth;

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
        foreach ($photos as $photo) {
            $photo->updateTags();
            echo "updated $photo->id <br />";
        }
    }

    public function cryptPWs(Request $request)
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->cryptpw();
            echo "updated $user->id <br />";
        }
    }

    public function migrateTable($tablename)
    {
        Schema::dropIfExists($tablename);
        
        Artisan::call('migrate', array('--path' => "database/migrations/$tablename", '--force' => true));
        Schema::dropIfExists('migrations'); //sorry laravel, but thats the only way.

        flash("Table $tablename exists (now).")->success();
        return view('admin.dbadmin');
    }

    public function fillTable($tablename)
    {
        Artisan::call('db:seed', array('--class' => ucfirst($tablename) . "TableSeeder", '--force' => true));

        flash("Table $tablename filled with dummy data.")->success();
        return view('admin.dbadmin');
    }

    public function dropTable($tablename)
    {
        Schema::dropIfExists($tablename);

        flash("Table $tablename does not (longer) exist.")->success();
        return view('admin.dbadmin');
    }

    public function index() 
    {
        return view('admin.dbadmin');
    }


}
