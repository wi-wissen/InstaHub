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

		 $preset_avatars = array("001.jpg","002.jpg","003.jpg","004.jpg","005.jpg","006.jpg","007.jpg","008.jpg","009.jpg","010.jpg","011.jpg","012.jpg","013.jpg","014.jpg","015.jpg","016.jpg","017.jpg","018.jpg","019.jpg","020.jpg","021.jpg","022.jpg","023.jpg","024.jpg","025.jpg","026.jpg","027.jpg","028.jpg","029.jpg","030.jpg","031.jpg","032.jpg","033.jpg","034.jpg","035.jpg","036.jpg","037.jpg","038.jpg","039.jpg","040.jpg","041.jpg","042.jpg","043.jpg","044.jpg","045.jpg","046.jpg","047.jpg","048.jpg","049.jpg","050.jpg","051.jpg","052.jpg","053.jpg","054.jpg","055.jpg","056.jpg","057.jpg","058.jpg","059.jpg","060.jpg","061.jpg","062.jpg","063.jpg","064.jpg","065.jpg","066.jpg","067.jpg","068.jpg","069.jpg","070.jpg","071.jpg","072.jpg","073.jpg","074.jpg","075.jpg","076.jpg","077.jpg","078.jpg","079.jpg","080.jpg","081.jpg","082.jpg","083.jpg","084.jpg","085.jpg","086.jpg","087.jpg","088.jpg","089.jpg","090.jpg","091.jpg","092.jpg","093.jpg","094.jpg","095.jpg","096.jpg","097.jpg","098.jpg","099.jpg","100.jpg","101.jpg","102.jpg","103.jpg","104.jpg","105.jpg","106.jpg","107.jpg","108.jpg","109.jpg","110.jpg","111.jpg","112.jpg","113.jpg","114.jpg","115.jpg","116.jpg","117.jpg","118.jpg","119.jpg","120.jpg","121.jpg","122.jpg","123.jpg","124.jpg","125.jpg","126.jpg","127.jpg","128.jpg","129.jpg","130.jpg","131.jpg","132.jpg","133.jpg","134.jpg","135.jpg","136.jpg","137.jpg","138.jpg","139.jpg","140.jpg","141.jpg","142.jpg","143.jpg","144.jpg","145.jpg","146.jpg","147.jpg","148.jpg","149.jpg","150.jpg","151.jpg","152.jpg","153.jpg","154.jpg","155.jpg","156.jpg","157.jpg","158.jpg","159.jpg","160.jpg","161.jpg","162.jpg","163.jpg","164.jpg","165.jpg","166.jpg","167.jpg","168.jpg","169.jpg","170.jpg","171.jpg","172.jpg","173.jpg","174.jpg","175.jpg","176.jpg","177.jpg","178.jpg","179.jpg","180.jpg","181.jpg","182.jpg","183.jpg","184.jpg","185.jpg","186.jpg","187.jpg","188.jpg","189.jpg","190.jpg","191.jpg","192.jpg","193.jpg","194.jpg","195.jpg","196.jpg");
		 
		 if (!in_array($filename, $preset_avatars)) {
			//uploaded avater
			return Storage::disk('local')->delete($user->avatar);
		 }
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
			// _960 cant (hopfully) part of an uuid, so it is an present photo
			if (strpos($entry->url, '_960') == false) {
				Storage::disk('local')->delete($entry->url);
			}

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
		$val = substr($val, 0, -1); 
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
