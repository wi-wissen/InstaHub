<?php

namespace App\Http\Controllers;

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
        if (strpos($url, '_960') == false || strpos($url, '-unsplash') == false) {
            $url = 'photos/generation_1/'.$filename; // legacy support
        }

        if (Storage::disk('local')->exists($url)) {
            $file = Storage::disk('local')->get($url);

            return (new Response($file, 200))
                  ->header('Content-Type', Storage::mimeType($url))
                  ->header('Content-Disposition', 'attachment; filename="'.'photo'.'"');
        } else {
            abort(404);
        }
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
        if (preg_match('/^(\d{3})\.jpg$/', $filename) && intval($filename) <= 196) {
            $avatar = 'avatars/generation_1/'.$filename; // legacy support
        }

        $file = Storage::disk('local')->get($avatar);

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

        $isPresetAvatar = preg_match('/^(\d{3})\.jpg$/', $filename) && intval($filename) <= 196;

        if (!$isPresetAvatar) {
            // uploaded avatar
            return Storage::disk('local')->delete($user->avatar);
        }
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
            // `_960` and `-unsplash` can't (hopfully) part of an uuid, so it is an present photo
            if (strpos($entry->url, '_960') == false && strpos($entry->url, '-unsplash') == false) {
                Storage::disk('local')->delete($entry->url);
            }

            $entry->delete();

            flash(__('Photo deleted'))->success();
        } else {
            flash('Photo '.$id.' does not exist')->error();
        }

        return redirect('/');
    }
}
