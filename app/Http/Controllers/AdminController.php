<?php

namespace App\Http\Controllers;

use App\Facades\RequestHub;
use App\Models\Analytic;
use App\Models\Hub;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
