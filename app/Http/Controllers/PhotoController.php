<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use App\Http\Requests;

use DB;
use Schema;

use Storage;
use Config;
use Session;
use Debugbar;

use Illuminate\Http\Response;

use App\Photo;
use App\User;

class PhotoController extends Controller
{

   protected $redirectTo = '/home';

	public function __construct ()
	{
		$this->middleware('auth');
	}

	public function create()
	{
		\Debugbar::info('max filesize in kilobyte: ' . $this->max_filesize());
		return view('photo.create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'photo' => 'required|max:'. $this->max_filesize()
		]);

		$url = $request->file('photo')->store('photos');
		$user = $request->user();

		$photo = Photo::create([
			'user_id' => $user->id,
			'description' => $request->description,
			'url' => $url
		]);
		
		flash('Photo uploaded')->success();
		return redirect('photo/' . $photo->id);
	}

	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function show($filename)
	 {
		 $entry = Photo::where('url', '=', 'photos/' . $filename)->firstOrFail();
		 
		 //$this->authorize('view', $entry);
		 
		 $file = Storage::disk('local')->get($entry->url);
 
		 return (new Response($file, 200))
			   ->header('Content-Type', Storage::mimeType($entry->url))
			   ->header('Content-Disposition', 'attachment; filename="' . "photo" . '"');       
	 }

	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function showavatar($filename)
	 {
		//dd($filename);
		 $user = User::where('avatar', '=', 'avatars/' . $filename)->firstOrFail();
		 
		 //$this->authorize('view', $entry);
		 
		 $file = Storage::disk('local')->get($user->avatar);
 
		 return (new Response($file, 200))
			   ->header('Content-Type', Storage::mimeType($user->avatar))
			   ->header('Content-Disposition', 'attachment; filename="' . $user->username . '"');       
	 }

	 /**
     * Delete the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function destroyavatar($filename)
	 {
		 $user = User::where('avatar', '=', 'avatars/' . $filename)->firstOrFail();
		 
		 //$this->authorize('view', $entry);
		 
		 //known bug in laravel 5.3: https://github.com/laravel/framework/issues/18118
		//TODO: Check if Avater is unique before delete. OR change putFile and set real unique uuid
		 //return Storage::disk('local')->delete($user->avatar);
	 }

	/**
     * Delete the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function destroy($id)
	 {
		$entry = Photo::find($id);

		if ($entry) {
			$entry->delete();
			flash('Photo deleted')->success();
		} else {
			flash('Photo ' . $id . ' does not exist')->error();
		}
		

        return redirect('home');
	 }

	 //in kilobytes
	 public function max_filesize()
	 {
		$val = ini_get('post_max_size');
		$val = trim($val);
		$last = strtolower($val[strlen($val)-1]);
		switch($last) {
			// The 'G' modifier is available since PHP 5.1.0
			case 'g':
				$val *= 1024;
			case 'm':
				$val *= 1024;
			case 'k':
				$val *= 1024;
		}

		$val = $val / 1024;
	
		return $val;
	 }

	
}
