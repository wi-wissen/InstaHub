<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Facades\RequestHub;

class UserActivate extends Component
{
    public $user;
    public $isReadOnly;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->isReadOnly = RequestHub::isReadOnly();
    }

    public function render()
    {
        return view('livewire.user-activate');
    }

    public function toggleActive()
    {
        $this->user->is_active = !$this->user->is_active;
        $this->user->save();
    }
}