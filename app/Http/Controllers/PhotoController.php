<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use App\Http\Requests;

use Storage;
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
		return view('photo.create');
	}

	public function store(Request $request)
	{
		// echo "Worked";
		// var_dump($request->all());
		// die();
		$url = $request->file('photo')->store('photos');
		$user = $request->user();
		// var_dump($user->id);

		Photo::create([
			'user_id' => $user->id,
			'description' => $request->description,
			'url' => $url
		]);

		return redirect('home');
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
		//dd($filename);
		 $user = User::where('avatar', '=', 'avatars/' . $filename)->firstOrFail();
		 
		 //$this->authorize('view', $entry);
		 
		 return Storage::disk('local')->delete($user->avatar);
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
	
		//$this->authorize('view', $entry);
		
		if (Photo::where('url', '=', $entry->url)->count == 1)
		{
			//prevent deleting a file who is in use in an other photo
			Storage::disk('local')->delete($entry->url);
		}
		
		$entry->delete();
		flash('Photo deleted')->success();

        return redirect('home');
	 }

	
}
