<?php

namespace App\Models;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['name', 'type', 'priority', 'url', 'img', 'query'];

    public static function getAd($photo_id = null)
    {
        $ads = null;
        $id = null;

        if ($photo_id) {
            $ads = self::where('type', '=', 'banner')->orderBy('priority', 'asc')->get();
        } else {
            $ads = self::where('type', '=', 'photo')->orderBy('priority', 'asc')->get();
        }

        foreach ($ads as $ad) {
            $checkIfResultExist = false;

            // prepare query
            $sql = $ad->query;
            if (strpos($sql, '$user') !== false) {
                $checkIfResultExist = true;
                $sql = str_replace('$user', Auth::id(), $sql);
            }
            if (strpos($sql, '$photo') !== false) {
                $checkIfResultExist = true;
                $sql = str_replace('$photo', $photo_id, $sql);
            }

            // run query
            try {
                $r = DB::select($sql);
                $r = (array) $r;
            } catch (\Illuminate\Database\QueryException $ex) {
                $r = [];
                flash('<p> Ad <b>'.$ad->name.'</b> is broken: </p><p>'.$ex->getMessage().'</p>', 'danger')->important();
            }

            // check query result
            if (count($r)) {
                if ($checkIfResultExist) {

                    // check if `CASE` was used
                    if (count($r) == 1 && strpos(strtolower(key((array) $r[0])), 'case') === 0) {
                        $result = (bool) $r[0]->{key((array) $r[0])};
                        if ($result) {
                            return self::find($ad->id);
                        }
                    }
                    // or just return true if one or more results are given
                    else {
                        return self::find($ad->id);
                    }
                } else {
                    // find matching column
                    $columnValue = $photo_id ?? Auth::id(); // use photo id if set or user id
                    $columnName = null;
                    if ($photo_id && property_exists($r[0], 'photo_id')) {
                        $columnValue = $photo_id;
                        $columnName = 'photo_id';
                    } elseif (property_exists($r[0], 'user_id')) {
                        $columnValue = Auth::id();
                        $columnName = 'user_id';
                    } elseif (property_exists($r[0], 'id')) {
                        $columnName = 'id';
                    }

                    if ($columnName) {
                        foreach ($r as $row) {
                            if ($row->{$columnName} == $columnValue) {
                                return self::find($ad->id);
                            }
                        }
                    } else {
                        flash('<p> Ad <b>'.$ad->name.'</b> is broken: </p><p>No known Column found.</p>', 'danger')->important();
                    }
                }
            }
        }

        return null; // return nothing if no matching ad was found
    }
}
