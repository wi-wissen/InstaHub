<?php

namespace App\Http\Controllers;

use App\Facades\RequestHub;
use App\Models\Ad;
use App\Models\Analytic;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class PhotoController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
        ];
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

            // Custom-Weights in der Session speichern oder löschen
            if ($sort === 'custom' && $request->has('weights')) {
                session(['sort_feed_weights' => $request->input('weights')]);
            } elseif ($sort !== 'custom') {
                session()->forget('sort_feed_weights');
            }
        }

        $photos = collect([]);
        $following_ids = collect([]);

        if (RequestHub::hasTable('photos')) {
            // If follows table exists, only load photos from followed users
            $hasFollows = RequestHub::hasTable('follows');
            if ($hasFollows) {
                $following_ids = Auth::user()->following()->pluck('users.id');
                $following_ids->push(Auth::user()->id); // always show own posts
            }

            // Prepare query builder (with or without follows filter)
            $baseQuery = $following_ids !== null
                ? Photo::whereIn('user_id', $following_ids)
                : Photo::query();

            if (session('sort_feed') == 'best' || session('sort_feed') == 'custom') {
                // Weights aus Session lesen (werden beim Custom-Sort dort gespeichert)
                $weights = [];
                if (session('sort_feed') == 'custom') {
                    $weights = session('sort_feed_weights', []);
                }

                if ((clone $baseQuery)->exists()) {
                    if ($hasFollows) {
                        // With follows: personalized EdgeRank (affinity per user)
                        $photos = (clone $baseQuery)->with('user')->orderBy('created_at', 'desc')->limit(100)->get();
                        $photos = $photos->addPhotoScore($weights)->paginate(5);
                    } else {
                        // Without follows: pre-select top 100 by SQL score (Likes + Comments + Decay)
                        $hasLikes = RequestHub::hasTable('likes');
                        $hasComments = RequestHub::hasTable('comments');

                        $w = array_merge(['like_weight' => 1, 'comment_weight' => 2, 'decay' => 1], $weights);

                        // Score ≈ (1 + likes * w_like + comments * w_comment) × decay
                        // decay = EXP(LN(0.995) / 900 × age_in_seconds) ≈ EXP(-0.00000557 × age)
                        $scoreParts = ['1'];
                        if ($hasLikes) {
                            $scoreParts[] = 'COALESCE(likes_count, 0) * '.(int) $w['like_weight'];
                        }
                        if ($hasComments) {
                            $scoreParts[] = 'COALESCE(comments_count, 0) * '.(int) $w['comment_weight'];
                        }
                        $scoreExpr = '('.implode(' + ', $scoreParts).')';
                        if ($w['decay'] > 0) {
                            $scoreExpr .= ' * EXP(-0.00000557 * TIMESTAMPDIFF(SECOND, created_at, NOW()))';
                        }

                        $photos = (clone $baseQuery)
                            ->with('user')
                            ->when($hasLikes, fn ($q) => $q->withCount('likes'))
                            ->when($hasComments, fn ($q) => $q->withCount('comments'))
                            ->orderByRaw($scoreExpr.' DESC')
                            ->limit(100)
                            ->get();
                        $photos = $photos->addPhotoScoreGlobal($weights)->paginate(5);
                    }
                }
            } else { // sort by date
                session(['sort_feed' => 'last']);

                if ((clone $baseQuery)->exists()) {
                    $photos = (clone $baseQuery)
                        ->with('user')
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);
                }
            }
        }

        if (RequestHub::hasTable('ads')) {
            $ad = Ad::getAd();

            return view('photo.index', ['photos' => $photos, 'ad' => $ad, 'followingIds' => $following_ids]);
        } else {
            return view('photo.index', ['photos' => $photos, 'followingIds' => $following_ids]);
        }
    }

    public function photosbytag(Request $request, $name)
    {
        $sort = $request->input('sort', null);

        if ($sort) {
            session(['sort_feed' => $sort]);

            // Custom-Weights in der Session speichern oder löschen
            if ($sort === 'custom' && $request->has('weights')) {
                session(['sort_feed_weights' => $request->input('weights')]);
            } elseif ($sort !== 'custom') {
                session()->forget('sort_feed_weights');
            }
        }

        $photos = null;

        // Weights aus Session lesen (werden beim Custom-Sort dort gespeichert)
        $weights = [];
        if (session('sort_feed') == 'custom') {
            $weights = session('sort_feed_weights', []);
        }

        if (RequestHub::hasTable('tags')) {
            if (session('sort_feed') == 'best' || session('sort_feed') == 'custom') {

                $photos = Photo::whereHas('tags', function ($query) use ($name) {
                    $query->where('name', '=', strtolower($name));
                })
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    ->limit(200)
                    ->get()
                    ->addPhotoScoreGlobal($weights)
                    ->paginate(5);
            } else { // sort by date
                session(['sort_feed' => 'last']);

                $photos = Photo::whereHas('tags', function ($query) use ($name) {
                    $query->where('name', '=', strtolower($name));
                })
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
            }
        } elseif (RequestHub::hasTable('photos')) {
            if (session('sort_feed') == 'best' || session('sort_feed') == 'custom') {

                $photos = Photo::where('description', 'like', "%#$name%")
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    ->limit(200)
                    ->get()
                    ->addPhotoScoreGlobal($weights)
                    ->paginate(5);
            } else { // sort by date
                session(['sort_feed' => 'last']);

                $photos = Photo::where('description', 'like', "%#$name%")->with('user')->paginate(5);
            }
        }

        // Preload following IDs for the 3-dot menu (avoids N+1 queries)
        $followingIds = collect([]);
        if (RequestHub::hasTable('follows')) {
            $followingIds = Auth::user()->following()->pluck('users.id');
        }

        if (RequestHub::hasTable('ads')) {
            $ad = Ad::getAd();

            return view('photo.index', ['photos' => $photos, 'ad' => $ad, 'followingIds' => $followingIds]);
        } else {
            return view('photo.index', ['photos' => $photos, 'followingIds' => $followingIds]);
        }
    }

    public function show(Photo $photo)
    {
        // analytic
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
        $request->validate([
            'photo' => 'required|max:'.$this->max_filesize(),
            'description' => 'required',
        ]);

        $upload = $request->file('photo');
        $user = $request->user();

        // Read image and scale down to max 1280px (longest side)
        $image = Image::read($upload);
        $image->scaleDown(width: 1280, height: 1280);

        // Encode as WebP and save
        $filename = 'photos/'.Str::random(40).'.webp';
        Storage::put($filename, $image->toWebp(quality: 90));

        $photo = Photo::create([
            'user_id' => $user->id,
            'description' => $request->description,
            'url' => $filename,
        ]);

        flash(__('Photo uploaded'))->success();

        return redirect('p/'.$photo->id);
    }

    // in kilobytes
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

        return $result; // in kbyte
    }
}
