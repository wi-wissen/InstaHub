<?php

namespace App\Http\Controllers;

use App\Facades\RequestHub;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPhoto($filename)
    {
        $entry = Photo::where('url', '=', 'photos/'.$filename)->firstOrFail();

        $url = $entry->url;
        $file = null;

        if (strpos($url, '_960') || strpos($url, '-unsplash')) {
            // legacy support
            $url = 'photos/1/'.$filename; // legacy support
            $file = Storage::disk('public')->get($url);
        }
        else if (Storage::disk('local')->exists($url)) {
            $file = Storage::disk('local')->get($url);
        } else {
            abort(404);
        }

        return (new Response($file, 200))
            ->header('Content-Type', Storage::mimeType($url))
            ->header('Content-Disposition', 'attachment; filename="'.'photo'.'"');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAvatar($filename)
    {
        if($filename == '000.jpg') {
            return (new Response(Storage::disk('local')->get('avatars/000.jpg'), 200))
               ->header('Content-Type', 'jpg')
               ->header('Content-Disposition', 'attachment; filename="ad-avatar-jpg');
        }
        
        $user = User::where('avatar', '=', 'avatars/'.$filename)->firstOrFail();

        $avatar = $user->avatar;
        $file = null;

        if (preg_match('/^(\d{1,3})\.jpg$/', $filename) && intval($filename) <= 196) {
            // legacy support
            $avatar = 'avatars/1/'.$filename;
            $file = Storage::disk('public')->get($avatar);
        }
        else if (Storage::disk('local')->exists($avatar)) {
            $file = Storage::disk('local')->get($avatar);
        } else {
            abort(404);
        }

        return (new Response($file, 200))
            ->header('Content-Type', Storage::mimeType($avatar))
            ->header('Content-Disposition', 'attachment; filename="'.$user->username.'"');
    }

    /**
     * Delete the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAvatar($filename)
    {
        $user = User::where('avatar', '=', 'avatars/'.$filename)->firstOrFail();

        $user->avatar = null;
        $user->save();
    }

    /**
     * Delete the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPhoto($id)
    {
        $entry = Photo::find($id);

        if ($entry) {
            $entry->delete();

            flash(__('Photo deleted'))->success();
        } else {
            flash('Photo '.$id.' does not exist')->error();
        }

        return redirect('/');
    }
}
