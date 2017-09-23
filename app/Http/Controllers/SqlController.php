<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profile;
use DB;
//use Input;
use Config;
use Auth;
use Schema;
use Illuminate\Support\Facades\Hash;
use Debugbar;
use Table;

class SqlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getQuery(Request $request)
    {
        $table =false;
        if ($request->has('editor')) {
             //Ergebnis vorbereiten
            try {
                $r = DB::select($request->editor);
                if (!$r) {
                        flash("Anfrage ausgeführt.", 'success');
                } else {
                    flash("Anfrage ausgeführt. " . count($r) ." Ergebnisse gefunden.", 'success');
                    $table = Table::create($r); 
                    $table->setView('admin.table');
                }
                              
            } catch(\Illuminate\Database\QueryException $ex){ 
                flash($ex->getMessage(), 'danger'); 
            }
        }


        //Tabelle darstellen
        $dbclass ="";
        $r = DB::table('information_schema.tables')->get();
        if (!$r) {
                echo "<div class='alert alert-danger'>Keine Tabellen gefunden.</div>";
        }
        foreach ($r as $v) {
            if (!strcmp($v->TABLE_TYPE, "BASE TABLE") && $v->TABLE_NAME != "migrations") {
                $dbclass = $dbclass . "<b>" . $v->TABLE_NAME . ':</b> ';
                $columns = Schema::getColumnListing($v->TABLE_NAME);
                foreach ($columns as &$column) {
                    $dbclass = $dbclass . $column . ", ";
                }
                $dbclass = $dbclass . "<br />";
            }
        }



        return view('admin.sql', ['result' => $table, 'tables' => $dbclass]);
    }
}