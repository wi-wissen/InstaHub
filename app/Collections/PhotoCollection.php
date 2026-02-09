<?php

namespace App\Collections;

use App\Facades\RequestHub;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class PhotoCollection extends Collection
{
    /**
     * Berechnet den personalisierten Score für jedes Foto im Feed (EdgeRank-Algorithmus).
     *
     * Score = Affinität × Edge × Decay
     *
     * @param  array  $weights  Benutzerdefinierte Gewichtungen
     * @return $this
     */
    public function addPhotoScore(array $weights = [])
    {
        // Standard-Gewichtungen mit optionaler Überschreibung
        $weights = array_merge([
            'like_affinity' => 1,
            'comment_affinity' => 2,
            'like_edge' => 1,
            'comment_edge' => 2,
            'decay' => 1,
        ], $weights);

        $user = Auth::user();
        // Referenz für Nutzung in verschachtelten Funktionen
        $photos = $this;

        /**
         * Affinität berechnen
         */

        // Affinität misst, wie stark der aktuelle Nutzer mit einem anderen Nutzer interagiert hat.
        $aff = [];

        // Ohne follows-Tabelle ist Affinität nicht sinnvoll berechenbar,
        // daher überspringen wir die teure Berechnung (alle User laden etc.)
        // und setzen die Affinität nur für die relevanten Foto-Urheber auf 1.
        if (RequestHub::hasTable('follows')) {
            $user_ids = User::get('id')->pluck('id');
            foreach ($user_ids as $user_id) {
                $aff[$user_id] = 1;
            }

            // Affinität durch Likes erhöhen:
            // Pro Like eines Fotos wird die Affinität zum Urheber erhöht.
            // $likes speichert alle Likes, die der User vergeben hat (sortiert nach Datum, max 100).
            if (RequestHub::hasTable('likes')) {
                $likes = Photo::select('photos.user_id as user_id_photo')
                                    ->join('likes', function ($join) use ($user) {
                                        $join->on('photos.id', '=', 'likes.photo_id')
                                        ->where('likes.user_id', '=', $user->id);
                                    })
                                    ->orderBy('likes.created_at', 'desc')->limit(100)->get();

                foreach ($likes as $like) {
                    if (array_key_exists($like->user_id_photo, $aff)) {
                        $aff[$like->user_id_photo] += $weights['like_affinity'];
                    }
                }
            }

            // Affinität durch Kommentare erhöhen:
            // Pro Kommentar wird die Affinität zum Urheber stärker erhöht.
            // $comments speichert alle Kommentare, die der User verfasst hat (sortiert nach Datum, max 100).
            if (RequestHub::hasTable('comments')) {
                $comments = Photo::select('photos.user_id as user_id_photo')
                                    ->join('comments', function ($join) use ($user) {
                                        $join->on('photos.id', '=', 'comments.photo_id')
                                        ->where('comments.user_id', '=', $user->id);
                                    })
                                    ->orderBy('comments.created_at', 'desc')->limit(100)->get();

                foreach ($comments as $comment) {
                    if (array_key_exists($comment->user_id_photo, $aff)) {
                        $aff[$comment->user_id_photo] += $weights['comment_affinity'];
                    }
                }
            }
        } else {
            // Ohne follows: Affinität nur für die Foto-Urheber in der Collection auf 1 setzen
            foreach ($this->items as $photo) {
                $aff[$photo->user_id] = 1;
            }
        }

        /**
         * Edge-Gewicht berechnen
         */

        // Jedes Foto erhält initial die Punktzahl 1 und die Score-Details werden einzeln gespeichert.
        foreach ($this->items as $photo) {
            $photo['score'] = 1;
            $photo['score_affinity'] = $aff[$photo->user_id] ?? 1;
            $photo['score_edge_likes'] = 0;
            $photo['score_edge_comments'] = 0;
            $photo['score_decay'] = 1;
            $photo['score_weights'] = $weights;
        }

        // Edge: Likes
        // $edge_likes speichert alle Likes, die die Fotos erhalten haben.
        // Für jedes Like wird der Affinitätswert des Like-Urhebers zur Punktzahl addiert.
        // Hat ein Foto keine Likes erhalten, beträgt der Like-Edge-Score 0.
        if (RequestHub::hasTable('likes')) {
            $edge_likes = Photo::select('likes.user_id as user_id_likes', 'photos.id as photo_id')
                ->join('likes', function ($join) use ($photos) {
                    $join->on('photos.id', '=', 'likes.photo_id')
                        ->whereIn('photos.id', $photos->pluck('id'));
                })->get();

            foreach ($this->items as $photo) {
                $like_score = 0;
                foreach ($edge_likes as $edge_like) {
                    if ($edge_like['photo_id'] == $photo->id) {
                        $like_score += ($aff[$edge_like['user_id_likes']] ?? 1) * $weights['like_edge'];
                    }
                }
                $photo['score_edge_likes'] = $like_score;
                $photo['score'] += $like_score;
            }
        }

        // Edge: Kommentare
        // $edge_comments speichert alle Kommentare, die die Fotos erhalten haben.
        // Für jeden Kommentar wird der Affinitätswert des Kommentar-Urhebers zur Punktzahl addiert.
        // Hat ein Foto keine Kommentare erhalten, beträgt der Kommentar-Edge-Score 0.
        if (RequestHub::hasTable('comments')) {
            $edge_comments = Photo::select('comments.user_id as user_id_comments', 'photos.id as photo_id')
                ->join('comments', function ($join) use ($photos) {
                    $join->on('photos.id', '=', 'comments.photo_id')
                        ->whereIn('photos.id', $photos->pluck('id'));
                })->get();

            foreach ($this->items as $photo) {
                $comment_score = 0;
                foreach ($edge_comments as $edge_comment) {
                    if ($edge_comment['photo_id'] == $photo->id) {
                        $comment_score += ($aff[$edge_comment['user_id_comments']] ?? 1) * $weights['comment_edge'];
                    }
                }
                $photo['score_edge_comments'] = $comment_score;
                $photo['score'] += $comment_score;
            }
        }

        /**
         * Aktualität (Decay) berechnen
         */

        // Der Decay-Wert liegt zwischen 1 (brandneu) und 0.01 (älter als ~10 Tage).
        // 101530 Sekunden entsprechen ca. 10 Tagen.
        // Alle 15 Minuten (900 Sek.) sinkt der Wert um 0,5%.
        foreach ($this->items as $photo) {
            $age_seconds = time() - strtotime($photo['created_at']);
            if ($age_seconds < 101530) {
                $decay = pow(0.995, ($age_seconds / 900));
            } else {
                $decay = 0.01;
            }
            $photo['score_decay'] = round($decay, 4);
        }

        /**
         * Endpunktzahl berechnen
         */

        // Die Endpunktzahl ergibt sich aus dem Produkt der bisherigen Punktzahl mit dem Aktualitätswert.
        foreach ($this->items as $photo) {
            $decay_factor = $weights['decay'] > 0 ? $photo['score_decay'] : 1;
            $photo['score'] *= $decay_factor;
        }

        $this->items = $this->sortByDesc('score')->items;

        return $this;
    }

    /**
     * Berechnet den globalen Score für Fotos (z.B. für Tag-Seiten).
     * Verwendet Likes und Kommentare ohne personalisierte Affinität.
     *
     * @param  array  $weights  Benutzerdefinierte Gewichtungen
     * @return $this
     */
    public function addPhotoScoreGlobal(array $weights = [])
    {
        // Standard-Gewichtungen mit optionaler Überschreibung
        $weights = array_merge([
            'like_weight' => 1,
            'comment_weight' => 2,
            'decay' => 1,
        ], $weights);

        // Jedes Foto erhält initial die Punktzahl 1 und die Score-Details werden einzeln gespeichert.
        foreach ($this->items as $photo) {
            $photo['score'] = 1;
            $photo['score_edge_likes'] = 0;
            $photo['score_edge_comments'] = 0;
            $photo['score_decay'] = 1;
            $photo['score_weights'] = $weights;
        }

        // Likes zählen und gewichtet zur Punktzahl addieren
        if (RequestHub::hasTable('likes')) {
            $this->loadCount('likes');
            foreach ($this->items as $photo) {
                $photo['score_edge_likes'] = $photo->likes_count * $weights['like_weight'];
                $photo['score'] += $photo['score_edge_likes'];
            }
        }

        // Kommentare zählen und gewichtet zur Punktzahl addieren
        if (RequestHub::hasTable('comments')) {
            $this->loadCount('comments');
            foreach ($this->items as $photo) {
                $photo['score_edge_comments'] = $photo->comments_count * $weights['comment_weight'];
                $photo['score'] += $photo['score_edge_comments'];
            }
        }

        /**
         * Aktualität (Decay) berechnen
         */

        // Der Decay-Wert liegt zwischen 1 (brandneu) und 0.01 (älter als ~10 Tage).
        // 101530 Sekunden entsprechen ca. 10 Tagen.
        // Alle 15 Minuten (900 Sek.) sinkt der Wert um 0,5%.
        foreach ($this->items as $photo) {
            $age_seconds = time() - strtotime($photo['created_at']);
            if ($age_seconds < 101530) {
                $decay = pow(0.995, ($age_seconds / 900));
            } else {
                $decay = 0.01;
            }
            $photo['score_decay'] = round($decay, 4);
        }

        /**
         * Endpunktzahl berechnen
         */

        // Die Endpunktzahl ergibt sich aus dem Produkt der bisherigen Punktzahl mit dem Aktualitätswert.
        foreach ($this->items as $photo) {
            $decay_factor = $weights['decay'] > 0 ? $photo['score_decay'] : 1;
            $photo['score'] *= $decay_factor;
        }

        $this->items = $this->sortByDesc('score')->items;

        return $this;
    }
}
