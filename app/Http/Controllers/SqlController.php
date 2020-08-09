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

class SqlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getApiQuery(Request $request) {
        $data = $this->_getQuery($request);
        return response()->json($data);
    }

    public function getQuery(Request $request)
    {
        $data = $this->_getQuery($request);
        //dd($data);
        return view('admin.sql', ['result' => $data['result'], 'tables' => $data['tables'], 'message' => $data['message'], 'type' => $data['type']]);
    }

    public function _getQuery(Request $request)
    {
        $t = "";
        $message = null; $type= null;

        if ($request->has('editor')) {
             //Ergebnis vorbereiten
            try {
                if(strpos(strtolower(trim($request->editor)), "select") !== 0) { //false for not found, 0 for starts with. 
                    // other statement - https://laravel.com/docs/5.7/database#running-queries
                    DB::statement($request->editor);
                    //nothing to show, cause no select-statement
                    $message = "Anfrage ausgeführt."; $type= 'success';
                }
                else {
                    //select
                    $r = DB::select($request->editor);
                    if (!$r) {
                        //nothing found
                        $message = "Anfrage ausgeführt. 0 Ergebnisse gefunden."; $type= 'warning';
                    }
                    else {
                        $message = "Anfrage ausgeführt. " . count($r) ." Ergebnisse gefunden."; $type= 'success';
    
                        $cols = array_keys((array) $r[0]);
                        $t = "<table class='table mb-0'>";
                        foreach ($cols as &$col) {
                            $t = $t . '<th>' . $col . '</th>';
                        }
                        foreach ($r as $row) {
                            $row = (array) $row;
                            $t = $t . "<tr>";
                            foreach ($cols as &$col) {
                                $wert = $row[$col];
                                //Ausgabe ggf. anpassen - Links
                                if (filter_var($wert, FILTER_VALIDATE_URL)) $wert = "<a href='$wert'>$wert</a>"; //absolute Links
                                else if (preg_match("/^.*\.(jpg|jpeg|png|gif)$/i", $wert)) $wert = "<a href='/$wert'>$wert</a>"; //relative Links to Photos
                                $t = $t . '<td>' . $wert . '</td>';
                            }
                            $t = $t . "</tr>";
                        }
                        $t = $t . "</table>";
                    }
                }                              
            } catch(\Illuminate\Database\QueryException $ex){ 
                $message = $ex->getMessage(); $type= 'danger'; 
            }
        }


        //Tabelle darstellen
        $dbclass ="";
        $r = DB::table('information_schema.tables')->where('table_schema', DB::getDatabaseName())->get();
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
                $dbclass = rtrim($dbclass, ", ") . "<br />";
            }
        }

        return array(
            "result" => $t,
            "tables" => $dbclass,
            "message" => $message,
            "type" => $type,
        );

        //return view('admin.sql', ['result' => $t, 'tables' => $dbclass, 'message' => $message, 'type' => $type,]);
    }

    public function getTables() {
        $dbclass ="";
        $r = DB::table('information_schema.tables')->where('table_schema', DB::getDatabaseName())->get();
        if (!$r) {
            return response()->json([]);
        }
        else {
            $arr = [];
            foreach ($r as $v) {
                if (!strcmp($v->TABLE_TYPE, "BASE TABLE") && $v->TABLE_NAME != "migrations" && $v->TABLE_NAME != "password_resets") {
                    $arr[$v->TABLE_NAME] = [];
                    $columns = Schema::getColumnListing($v->TABLE_NAME);
                    foreach ($columns as &$column) {
                        $arr[$v->TABLE_NAME][] = $column;
                    }
                }
            }
            return response()->json($arr); 
        }
    }

    public function selectGui() {
        return view('admin.select');
    }
}