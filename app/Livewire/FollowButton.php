<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowButton extends Component
{
    public $username;
    public $isFollowing;
    public $readonly = false;

    public function mount($username, $isFollowing = false)
    {
        $this->username = $username;
        $this->isFollowing = $isFollowing;
    }

    public function render()
    {
        return view('livewire.follow-button');
    }

    public function follow()
    {
        $user = User::where('username', $this->username)->first();
        
        Auth::user()->following()->attach($user);
        $this->isFollowing = true;
    }

    public function unfollow()
    {
        $user = User::where('username', $this->username)->first();

        Auth::user()->following()->detach($user);
        $this->isFollowing = false;
    }
}