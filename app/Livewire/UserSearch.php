<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserSearch extends Component
{
    public $query = '';
    public $users = [];
    public $showDropdown = false;

    public function render()
    {
        return view('livewire.user-search');
    }

    public function updatedQuery()
    {
        $this->users = [];

        if (strlen($this->query) < 2) {
            $this->showDropdown = false;
            return;
        }

        $this->users = User::where('username', 'LIKE', $this->query.'%')
                          ->limit(10)
                          ->get();

        $this->showDropdown = true;
    }

    public function resetDropdown()
    {
        $this->showDropdown = false;
    }
}