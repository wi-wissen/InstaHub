<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Facades\RequestHub;

class UserPasswordReset extends Component
{
    public $username;
    public $newPassword = null;
    public $isReadOnly;

    public function mount($username)
    {
        $this->username = $username;
        $this->isReadOnly = RequestHub::isReadOnly();
    }

    public function render()
    {
        return view('livewire.user-password-reset');
    }

    public function getNewPassword()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);
        
        $pw = '';
        for ($i = 0; $i < 6; $i++) {
            $index = rand(0, $count - 1);
            $pw .= mb_substr($chars, $index, 1);
        }

        $user = User::where('username', $this->username)->firstOrFail();
        $user->password = Hash::make($pw);
        $user->save();

        $this->newPassword = $pw;
    }
}