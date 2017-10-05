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

    public function getQuery(Request $request)
    {
        $table =false;
        if ($request->has('editor')) {
             //Ergebnis vorbereiten
            try {
                $r = DB::select($request->editor);
                if (!$r) {
                        flash("Anfrage ausgeführt.", 'success')->important();
                        $t = "";
                } else {
                    flash("Anfrage ausgeführt. " . count($r) ." Ergebnisse gefunden.", 'success')->important();

                    $cols = array_keys((array) $r[0]);
                    $t = "<table class='table'>";
                    foreach ($cols as &$col) {
                        $t = $t . '<th>' . $col . '</th>';
                    }
                    foreach ($r as $row) {
                        $row = (array) $row;
                        $t = $t . "<tr>";
                        foreach ($cols as &$col) {
                            $wert = $row[$col];
                            //Ausgabe ggf. anpassen - Links
                            if (filter_var($wert, FILTER_VALIDATE_URL)) $wert = "<a href='$wert'>$wert</a>"; //Links
                            //if (preg_match("/^.*\.(jpg|jpeg|png|gif)$/i", $wert)) $wert = "<img src='$wert'>"; //Bilder
                            if (preg_match("/^.*\.(jpg|jpeg|png|gif)$/i", $wert)) $wert = "<a href='$wert'>$wert</a>"; //Bilder for cleaner table
                            $t = $t . '<td>' . $wert . '</td>';
                        }
                        $t = $t . "</tr>";
                    }
                    $t = $t . "</table>";
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
                $dbclass = rtrim($dbclass, ", ") . "<br />";
            }
        }



        return view('admin.sql', ['result' => $t, 'tables' => $dbclass]);
    }
}