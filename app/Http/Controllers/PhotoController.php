<?php

namespace App\Http\Controllers;

use App\Facades\RequestHub;
use App\Models\Ad;
use App\Models\Analytic;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', null);

        if ($sort) {
            session(['sort_feed' => $sort]);
        }

        $photos = collect([]);

        if (RequestHub::hasTable('follows') && RequestHub::hasTable('photos')) {
            $user = Auth::user();

            $following_ids = []; // hmm i dont feel this is good practice refactor later

            foreach ($user->following as $following) {
                array_push($following_ids, $following->id);
            }
            array_push($following_ids, $user->id); //always show own posts

            if (session('sort_feed') == 'best') { // sort by best

                if (Photo::where('user_id', $following_ids)->exists()) {
                    $photos = Photo::whereIn('user_id', $following_ids)->orderBy('created_at', 'desc')->limit(100)->get();	// $photos speichert die neuesten 100 Fotos von Nutzern, denen der Nutzer folgt
                    $photos = $photos->addPhotoScore()->paginate(5);
                    $photos->appends(['sort' => 'best']);

                }
            } else { // sort by date
                session(['sort_feed' => 'last']);

                if (Photo::where('user_id', $following_ids)->exists()) {
                    $photos = Photo::whereIn('user_id', $following_ids)
                        ->orderBy('created_at', 'desc')
                        ->paginate(5)
                        ->appends(['sort' => 'last']);
                }
            }
        }

        if (RequestHub::hasTable('ads')) {
            $ad = Ad::getAd();

            return view('photo.index', ['photos' => $photos, 'ad' => $ad]);
        } else {
            return view('photo.index', ['photos' => $photos]);
        }
    }

    public function photosbytag(Request $request, $name)
    {
        $sort = $request->input('sort', null);

        if ($sort) {
            session(['sort_feed' => $sort]);
        }

        $photos = null;

        if (RequestHub::hasTable('tags')) {
            if (session('sort_feed') == 'best') { // sort by best

                $photos = Photo::whereHas('tags', function ($query) use ($name) {
                    $query->where('name', '=', strtolower($name));
                })
                    ->orderBy('created_at', 'desc')
                    ->limit(200)
                    ->get()
                    ->addPhotoScoreGlobal()
                    ->paginate(5);
            } else { // sort by date
                session(['sort_feed' => 'last']);

                $photos = Photo::whereHas('tags', function ($query) use ($name) {
                    $query->where('name', '=', strtolower($name));
                })
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
            }
        } elseif (RequestHub::hasTable('photos')) {
            if (session('sort_feed') == 'best') { // sort by best

                $photos = Photo::where('description', 'like', "%#$name%")
                    ->orderBy('created_at', 'desc')
                    ->limit(200)
                    ->get()
                    ->addPhotoScoreGlobal()
                    ->paginate(5);
            } else { // sort by date
                session(['sort_feed' => 'last']);

                $photos = Photo::where('description', 'like', "%#$name%")->paginate(5);
            }
        }

        if (RequestHub::hasTable('ads')) {
            $ad = Ad::getAd();

            return view('photo.index', ['photos' => $photos, 'ad' => $ad]);
        } else {
            return view('photo.index', ['photos' => $photos]);
        }
    }

    public function show(Photo $photo)
    {
        //analytic
        if (RequestHub::hasTable('analytics')) {
            Analytic::create(['user_id' => Auth::id(), 'photo_id' => $photo->id]);
        }

        if (RequestHub::hasTable('ads')) {
            $ad = Ad::getAd($photo->id);

            return view('photo.show', ['photo' => $photo, 'ad' => $ad]);
        } else {
            return view('photo.show', ['photo' => $photo, 'ad' => null]);
        }
    }

    public function create()
    {
        return view('photo.create', ['filesize' => $this->max_filesize()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|max:'.$this->max_filesize(),
            'description' => 'required',
        ]);

        $url = $request->file('photo')->store('photos');
        $user = $request->user();

        $photo = Photo::create([
            'user_id' => $user->id,
            'description' => $request->description,
            'url' => $url,
        ]);

        flash(__('Photo uploaded'))->success();

        return redirect('p/'.$photo->id);
    }

    //in kilobytes
    public function max_filesize()
    {
        $val = ini_get('post_max_size');
        $val = trim($val);
        $last = strtolower($val[strlen($val) - 1]);
        $val = substr($val, 0, -1);
        switch ($last) {
                // The 'G' modifier is available since PHP 5.1.0
                case 'g':
                    $val *= 1024; // no break to also calc with mega.
                case 'm':
                    $val *= 1024;
            }

        $result = $val;

        $val = ini_get('upload_max_filesize');
        $val = trim($val);
        $last = strtolower($val[strlen($val) - 1]);
        $val = substr($val, 0, -1);
        switch ($last) {
                // The 'G' modifier is available since PHP 5.1.0
                case 'g':
                    $val *= 1024; // no break to also calc with mega.
                case 'm':
                    $val *= 1024;
            }

        if ($result > $val) {
            $result = $val;
        }

        return $result; //in kbyte
    }
}
