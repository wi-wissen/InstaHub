<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Arr;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Collection;

use App\Photo;
use App\User;
use App\Analytic;
use App\Ad;
use App\Like;
use App\Comment;

use App\Http\Resources\Photo as PhotoResource;
use App\Http\Resources\Ad as AdResource;

use Auth;
use Debugbar;
use Config;

class HomeController extends Controller
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
    public function index(Request $request, $sort = null)
    {
        if($sort) session(['sort_feed' => $sort]);

        $photos = [];

        if (Schema::hasTable('follows') && Schema::hasTable('photos')) {
            $user = Auth::user();

            $following_ids = []; // hmm i dont feel this is good practice refactor later

            foreach ($user->following as $following) {
                array_push($following_ids, $following->id);
            }
            array_push($following_ids, $user->id); //always show own posts

            if(session('sort_feed') == 'best') { // sort by best
                
                if (Photo::where('user_id', $following_ids)->exists()) {   
                    $photos = Photo::whereIn('user_id', $following_ids)												// $photos speichert die neuesten 100 Fotos von Nutzern, denen
                        ->withCount('likes')->withCount('comments')->orderBy('created_at','desc')->limit(100)->get();	// der Nutzer folgt
                }
            
                // EdgeRank
                // score = aff*edge*decay
                // Affinität 2
                
                $aff = [];	// Affinity

                $user_ids = User::get('id')->pluck('id');
                foreach($user_ids as $user_id) {
                    $aff[$user_id] = 1;
                }
       
                $likes= Photo::select('photos.user_id as user_id_photo')							// $likes speichert alle Likes, die der User vergeben hat
                                    ->join('likes',function ($join) use ( $user) {
                                        $join->on('photos.id', '=', 'likes.photo_id')
                                        -> where('likes.user_id', '=', $user->id);
                                    })->orderBy('likes.created_at', 'desc')->limit(100)->get();		// Sortiert nach Datum und auf 100 beschränkt
                
                foreach ($likes as $like){
                    $aff[$like->user_id_photo] += 1;												// Pro Like eines Fotos wird die Affinität zum Urheber um 1 erhöht
                }
                
                $comments= Photo::select('photos.user_id as user_id_photo')							// $comments speichert alle Kommentare, die der User verfasst hat
                                    ->join('comments',function ($join) use ($user) {
                                        $join->on('photos.id', '=', 'comments.photo_id')
                                        -> where('comments.user_id', '=', $user->id);
                                    })->orderBy('comments.created_at', 'desc')->limit(100)->get();	// Sortiert nach Datum und auf 100 beschränkt
                
                foreach ($comments as $comment){
                    $aff[$comment->user_id_photo] += 2;												// Pro Kommentar wird die Affinität zum Urheber um 2 erhöht
                }
                
                //Affinität und Edge
                foreach ($photos as $photo){
                    $photo['score'] = 1;															// Jedes Foto erhält initial die Punktzahl 1
                }

                $edge_likes = Photo::select('likes.user_id as user_id_likes', 'photos.id as photo_id')		// $edge_likes[i] speichert alle Likes, die das Foto mit ID i erhalten hat
                    ->join('likes',function ($join) use ($photos) {
                        $join->on('photos.id', '=', 'likes.photo_id')
                            ->whereIn('photos.id', $photos->pluck('id'));
                    })->get();

                foreach ($photos as $photo){
                    foreach ($edge_likes as $edge_like){						// Für jedes dieser Likes wird der Affinitätswert des 
                        if($edge_like['photo_id'] == $photo->id) {
                            $photo['score'] += $aff[$edge_like['user_id_likes']];				// Like-Urhebers zur Punktzahl hinzu addiert
                        }																		// Hat ein Foto keine Likes erhalten, beträgt die Punktzahl 1
                    }
                }

                $edge_comments = Photo::select('comments.user_id as user_id_comments', 'photos.id as photo_id')	// $edge_comments[i] speichert alle Kommentare, 
                    ->join('comments',function ($join) use ($photos) {		// die das Foto mit ID i erhalten hat
                        $join->on('photos.id', '=', 'comments.photo_id')
                            ->whereIn('photos.id', $photos->pluck('id'));;
                    })->get();

                foreach ($photos as $photo){
                    foreach ($edge_comments as $edge_comment){					// Für jedes dieser Kommentare wird der zweifache Affinitätswert 
                        if($edge_comment['photo_id'] == $photo->id) {
                            $photo['score'] += $aff[$edge_comment['user_id_comments']]*2;		// des Kommentar-Urhebers zur Punktzahl hinzu addiert
                        }
                    }																		// Hat ein Foto auch keine Kommentare erhalten, beträgt die Punktzahl immer noch 1
                }
                                
                //Aktualität
                $decay = [];																				// $decay[i] speichert den Aktualitätswert von Foto i
                foreach ($photos as $photo){																// Der Wert liegt immer zwischen 1 und 0,1
                    if((time()+3600-strtotime($photo["created_at"])) < 101530){										//101530 entspricht 10 Tagen in Sek
                        $decay[$photo->id] = pow(0.995,((time()+3600-strtotime($photo["created_at"]))/900));		//900=60*15 -> alle 15 min -5%
                    }else{
                        $decay[$photo->id] = 0.01;
                    }
                }
                
                //Punktzahl
                foreach ($photos as $photo){
                    $photo['score'] *= $decay[$photo->id];						// Die Endpunktzahl ergibt sich aus dem Produkt der bisherigen Punktzahl (aus den Aff.-werten)
                }																// mit dem Aktualitätswert
                
                $photos = $photos->sortByDesc('score')->paginate(5);
            }
            else { // sort by date
                session(['sort_feed' => 'last']);

                if (Photo::where('user_id', $following_ids)->exists()) {
                    $photos = Photo::whereIn('user_id', $following_ids)->orderBy('created_at', 'desc')->paginate(5);
                }
            }
        }

        if (Schema::hasTable('ads')) {
            $ad = Ad::getAd();
            return view('home', ['photos' => $photos, 'ad' => $ad]);
        }
        else {
            return view('home', ['photos' => $photos]);
        } 
    }

    public function photosbytag ($name) {
        if (Schema::hasTable('tags')) {
            $photos = Photo::whereHas('tags', function ($query) use($name) {
                    $query->where('name', '=', strtolower($name));
                })->paginate(5);
            if (Schema::hasTable('ads')) {
                $ad = Ad::getAd();
                return view('home', ['photos' => $photos, 'ad' => $ad]);
            }
            else {
                return view('home', ['photos' => $photos]);
            } 
        } elseif (Schema::hasTable('photos')) {
            $photos = Photo::where('description', 'like', "%#$name%" )->paginate(5);
            if (Schema::hasTable('ads')) {
                $ad = Ad::getAd();
                return view('home', ['photos' => $photos, 'ad' => $ad]);
            }
            else {
                return view('home', ['photos' => $photos]);
            } 
        }
    }

    public function single($photo_id, Request $request) 
	{
        $photo = Photo::findOrFail($photo_id);
        
        $photo = new PhotoResource($photo);

        //analytic
        if (Schema::hasTable('analytics')) {
            Analytic::create(['user_id' => Auth::id(), 'photo_id' => $photo->id]);
        }

        //return(new PhotoResource($photo));

        if (Schema::hasTable('ads')) {
            $ad = Ad::getAd($photo_id);

            if ($ad) { //is there a matching ad?
                $ad = new AdResource($ad);
                return view('photo.show', ['photo' => $photo->response()->content(), 'ad' => $ad->response()->content()]);
            }
            else {
                return view('photo.show', ['photo' => $photo->response()->content()]);
            }
        }
        else {
            return view('photo.show', ['photo' => $photo->response()->content()]);
        }
	}
}
