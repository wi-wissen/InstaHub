<?php

namespace App\Models;

use App\Facades\RequestHub;
use DateTime;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;

    public $score = null;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->tokens_max = config('azure.max_tokens');
        });

        self::updating(function ($model) {
            if ($model->isDirty('avatar') && $model->avatar === null) {
                $model->deleteAvatar();
            }
        });

        self::deleting(function ($model) {
            $model->deleteAvatar();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $casts = [
        'birthday' => 'datetime',
    ];

    protected $fillable = [
        'username', 'name', 'email', 'password', 'bio', 'avatar', 'birthday',
        'city', 'country', 'gender', 'centimeters', 'is_active', 'role', 'is_admin',
        'hub_default_generation', 'hub_default_creating', 'hub_default_query_level',
        'tokens_used', 'tokens_max',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Overwritten: Determine if the user has verified their email address.
     *
     * @return bool
     */
    public function hasVerifiedEmail()
    {
        // verification is needed outside hubs
        return RequestHub::isHub() || ! is_null($this->email_verified_at);
    }

    /**
     * Overwritten: Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        if(! RequestHub::isHub()) {
            // send only in `admin` area
            $this->notify(new VerifyEmail);
        }
    }

    public function getProfileDescriptionAttribute(): string
    {
        $parts = [];

        if ($this->city && $this->country) {
            $parts[] = __('is from') . " {$this->city} ({$this->country})";
        } elseif ($this->country) {
            $parts[] = __('is from') . " {$this->country}";
        }

        if ($this->gender) {
            $parts[] = __('is') . ' ' . __($this->gender);
        }

        if ($this->age() !== 'unknown') {
            $parts[] = __('is') . ' ' . $this->age() . ' ' . __('years old');
        }

        if (empty($parts)) {
            return '';
        }

        if (count($parts) === 1) {
            return $parts[0];
        }

        $lastPart = array_pop($parts);
        return implode(', ', $parts) . ' ' . __('and') . ' ' . $lastPart . '.';
    }

    public function following()
    {
        //return $this->hasMany('App\Follow', 'follower_id');
        return $this->belongsToMany(self::class, 'follows', 'following_id', 'follower_id')->withTimestamps();
    }

    public function followers()
    {
        //return $this->hasMany('App\Follow', 'following_id');
        return $this->belongsToMany(self::class, 'follows', 'follower_id', 'following_id')->withTimestamps();
    }

    public function photos()
    {
        return $this->hasMany(\App\Models\Photo::class)->orderBy('created_at', 'desc');
    }

    public function visits()
    {
        return $this->hasMany(\App\Models\Analytic::class)->orderBy('created_at', 'desc');
    }

    public function isfollowing($user)
    {
        //dd($this->following()->get()->where('id', $user->id)->count());
        return $this->following()->get()->where('id', $user->id)->count();
    }

    public function hubs()
    {
        return $this->hasMany(\App\Models\Hub::class, 'teacher_id', 'id');
    }

    public function age()
    {
        $now = new DateTime();
        if ($this->birthday === null) {
            return 'unknown';
        }
        $interval = $this->birthday->diff($now);
        if ($interval->y > 2000) { //age set to 0
            return 'unknown';
        }

        return $interval->y;
    }

    private function deleteAvatar() {
        if (Storage::disk('local')->get($this->avatar)) {
            // uploaded avatar
            return Storage::disk('local')->delete($this->avatar);
        }
        // given avatars are stored in `public`
    }

    public function allowed($role)
    {
        if ($role == 'user') {
            return true;
        } elseif ($role == 'dba' && ($this->role == 'dba' || $this->role == 'teacher' || $this->role == 'admin')) {
            return true;
        } elseif ($role == 'teacher' && ($this->role == 'teacher' || $this->role == 'admin')) {
            return true;
        } elseif ($role == 'admin' && ($this->role == 'admin')) {
            return true;
        } else {
            return false;
        }
    }

    //for unencrypted passwords after csv import
    public function cryptpw()
    {
        if (! (substr($this->password, 0, 7) === '$2y$10$')) {
            $this->password = bcrypt($this->password);
            $this->save();
        }
    }

    public static function getSuggested($limit = 10)
    {
        $user_ids = self::get('id')->pluck('id');	//all users

        $relScore = [];								// relation score
        foreach ($user_ids as $user_id) {
            $relScore[$user_id] = 0;					// set relation score to 0 (default score)
        }

        if (RequestHub::hasTable('follows')) {
            // $results = Anzahl der Überschneidungen von gefolgten Profilen zwischen dem angemeldeten User und jedem anderen User
            $results = DB::select('SELECT u2.id as userId, COUNT(f1.follower_id) as fCount
												FROM users as u1, users as u2, follows as f1, follows as f2 
												WHERE u1.id = ?
												AND u1.id = f1.following_id and u2.id = f2.following_id AND f1.follower_id = f2.follower_id and f1.following_id != f2.following_id 
                                                GROUP BY u2.id
                                        ',
                                        [Auth::user()->id]
            );
            foreach ($results as $result) {
                $relScore[$result->userId] = $result->fCount * 4;   // Pro gemeinsam gefolgtem Profil wird der RelationScore des Users um 4 erhöht
            }

            // $result = Anzahl der Überschneidungen von Followern zwischen dem angemeldeten User und jedem anderen User
            $results = DB::select('SELECT u2.id as userId, COUNT(f1.follower_id) as fCount
												FROM users as u1, users as u2, follows as f1, follows as f2 
												WHERE u1.id = ?
												AND u1.id = f1.follower_id and u2.id = f2.follower_id AND f1.following_id = f2.following_id and f1.follower_id != f2.follower_id 
                                                GROUP BY u2.id
                                        ',
                                        [Auth::user()->id]
            );
            foreach ($results as $result) {
                $relScore[$result->userId] += $result->fCount * 1;   // Pro gemeinsamem Follower wird der RelationScore des Users um 1 erhöht
            }
        }

        if (RequestHub::hasTable('follows') && RequestHub::hasTable('photos')) {

            // $result = Anzahl der hochgeladenen Fotos eines Profils
            $results = DB::select('SELECT u1.id as userId, COUNT(p1.id) as pCount
												FROM users as u1, photos as p1
												WHERE p1.user_id = u1.id
                                                GROUP BY u1.id
                                            '
            );

            foreach ($results as $result) {
                $relScore[$result->userId] += $result->pCount * 0.1;   // Pro hochgeladenem Foto wird der RelationScore des Users um 0,1 erhöht
            }
        }

        if (RequestHub::hasTable('follows')) {

            // $results = Profile, denen der angemeldete User bereits folgt
            $results = DB::select('SELECT u2.id as userId
												FROM users as u1, users as u2, follows as f1
												WHERE u1.id = ?
												AND u2.id = f1.follower_id AND u1.id = f1.following_id'
                                        ,
                                        [Auth::user()->id]
            );

            foreach ($results as $result) {
                unset($relScore[$result->userId]);                      // Nutzer, denen bereits gefolgt wird, sollen für Vorschläge nicht berücksichtigt werden
            }
        }

        arsort($relScore);												// relScore absteigend sortieren
        $highRelScore = array_slice($relScore, 0, $limit, true);			// nur höchste Werte behalten. True: Indizes (= User-IDs) werden beibehalten

        $suggestions = [];
        foreach ($user_ids as $user_id) {
            if (isset($highRelScore[$user_id])) {						// wenn User-ID als Index in highRelScore vorhanden
                $suggestions[] = $user_id;								// dann die ID zu vorgeschlagenen Usern hinzufügen
            }
        }

        $users = self::whereIn('id', array_keys($highRelScore))
                ->orderByRaw('FIELD(id, '.implode(', ', array_keys($highRelScore)).')')
                ->get();

        //add score to models
        foreach ($users as $user) {
            $user->score = $highRelScore[$user->id];
        }

        return $users;
    }

    public function hasTokens($amount = 1)
    {
        return $this->tokens_max - $this->tokens_used >= $amount;
    }
}
