<?php

namespace App\Collections;

use App\Facades\RequestHub;
use Illuminate\Database\Eloquent\Collection;
use Auth;

class PhotoCollection extends Collection
{
    public function addPhotoScore() {
        $user = Auth::user();
        $photos = $this; //for use in nested functions

        // EdgeRank
        // score = aff*edge*decay
        // Affinität 2
        
        $aff = [];	// Affinity

        $user_ids = User::get('id')->pluck('id');
        foreach($user_ids as $user_id) {
            $aff[$user_id] = 1;
        }

        if (RequestHub::hasTable('likes')) {
            $likes= Photo::select('photos.user_id as user_id_photo')							// $likes speichert alle Likes, die der User vergeben hat
                                ->join('likes',function ($join) use ( $user) {
                                    $join->on('photos.id', '=', 'likes.photo_id')
                                    -> where('likes.user_id', '=', $user->id);
                                })->orderBy('likes.created_at', 'desc')->limit(100)->get();		// Sortiert nach Datum und auf 100 beschränkt
            
            foreach ($likes as $like){
                $aff[$like->user_id_photo] += 1;												// Pro Like eines Fotos wird die Affinität zum Urheber um 1 erhöht
            }
        }

        if (RequestHub::hasTable('comments')) {   
            $comments= Photo::select('photos.user_id as user_id_photo')							// $comments speichert alle Kommentare, die der User verfasst hat
                                ->join('comments',function ($join) use ($user) {
                                    $join->on('photos.id', '=', 'comments.photo_id')
                                    -> where('comments.user_id', '=', $user->id);
                                })->orderBy('comments.created_at', 'desc')->limit(100)->get();	// Sortiert nach Datum und auf 100 beschränkt
            
            foreach ($comments as $comment){
                $aff[$comment->user_id_photo] += 2;												// Pro Kommentar wird die Affinität zum Urheber um 2 erhöht
            }
        }
        
        //Affinität und Edge
        foreach ($this->items as $photo){
            $photo['score'] = 1;															// Jedes Foto erhält initial die Punktzahl 1
        }

        if (RequestHub::hasTable('likes')) {
            $edge_likes = Photo::select('likes.user_id as user_id_likes', 'photos.id as photo_id')		// $edge_likes[i] speichert alle Likes, die das Foto mit ID i erhalten hat
                ->join('likes',function ($join) use ($photos) {
                    $join->on('photos.id', '=', 'likes.photo_id')
                        ->whereIn('photos.id', $photos->pluck('id'));
                })->get();

            foreach ($this->items as $photo){
                foreach ($edge_likes as $edge_like){						// Für jedes dieser Likes wird der Affinitätswert des 
                    if($edge_like['photo_id'] == $photo->id) {
                        $photo['score'] += $aff[$edge_like['user_id_likes']];				// Like-Urhebers zur Punktzahl hinzu addiert
                    }																		// Hat ein Foto keine Likes erhalten, beträgt die Punktzahl 1
                }
            }
        }

        if (RequestHub::hasTable('comments')) {
            $edge_comments = Photo::select('comments.user_id as user_id_comments', 'photos.id as photo_id')	// $edge_comments[i] speichert alle Kommentare, 
                ->join('comments',function ($join) use ($photos) {		// die das Foto mit ID i erhalten hat
                    $join->on('photos.id', '=', 'comments.photo_id')
                        ->whereIn('photos.id', $photos->pluck('id'));;
                })->get();

            foreach ($this->items as $photo){
                foreach ($edge_comments as $edge_comment){					// Für jedes dieser Kommentare wird der zweifache Affinitätswert 
                    if($edge_comment['photo_id'] == $photo->id) {
                        $photo['score'] += $aff[$edge_comment['user_id_comments']]*2;		// des Kommentar-Urhebers zur Punktzahl hinzu addiert
                    }
                }																		// Hat ein Foto auch keine Kommentare erhalten, beträgt die Punktzahl immer noch 1
            }
        }
                        
        //Aktualität
        $decay = [];																				// $decay[i] speichert den Aktualitätswert von Foto i
        foreach ($this->items as $photo){																// Der Wert liegt immer zwischen 1 und 0,1
            if((time()-strtotime($photo["created_at"])) < 101530){										//101530 entspricht 10 Tagen in Sek
                $decay[$photo->id] = pow(0.995,((time()-strtotime($photo["created_at"]))/900));		//900=60*15 -> alle 15 min -5%
            }else{
                $decay[$photo->id] = 0.01;
            }
        }
        
        //Punktzahl
        foreach ($this->items as $photo){
            $photo['score'] *= $decay[$photo->id];						// Die Endpunktzahl ergibt sich aus dem Produkt der bisherigen Punktzahl (aus den Aff.-werten)
        }																// mit dem Aktualitätswert
        
        $this->items = $this->sortByDesc('score')->items;

        return $this;
    }

    public function addPhotoScoreGlobal() {
        //Affinität und Edge
        foreach ($this->items as $photo){
            $photo['score'] = 1;															// Jedes Foto erhält initial die Punktzahl 1
        }

        if (RequestHub::hasTable('likes')) {
            $this->loadCount('likes');
            foreach ($this->items as $photo){
                $photo['score'] += $photo->likes_count;
            }
        }

        if (RequestHub::hasTable('comments')) {
            $this->loadCount('comments');
            foreach ($this->items as $photo){
                $photo['score'] += 2*$photo->comments_count;
            }
        }

        //Aktualität
        $decay = [];																				// $decay[i] speichert den Aktualitätswert von Foto i
        foreach ($this->items as $photo){																// Der Wert liegt immer zwischen 1 und 0,1
            if((time()-strtotime($photo["created_at"])) < 101530){										//101530 entspricht 10 Tagen in Sek
                $decay[$photo->id] = pow(0.995,((time()-strtotime($photo["created_at"]))/900));		//900=60*15 -> alle 15 min -5%
            }else{
                $decay[$photo->id] = 0.01;
            }
        }
        
        //Punktzahl
        foreach ($this->items as $photo){
            $photo['score'] *= $decay[$photo->id];						// Die Endpunktzahl ergibt sich aus dem Produkt der bisherigen Punktzahl (aus den Aff.-werten)
        }																// mit dem Aktualitätswert

        $this->items = $this->sortByDesc('score')->items;

        return $this;
    }
}
