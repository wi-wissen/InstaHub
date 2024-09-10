<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserHubSettings extends Component
{
    public $generation;
    public $hubDefaultCreating;
    public $hubDefaultQueryLevel;
    public $availableGenerations;

    protected $rules = [
        'generation' => 'required|integer',
        'hubDefaultCreating' => 'required|in:users,all_empty,all_full',
        'hubDefaultQueryLevel' => 'required|in:ai,gui,sql',
    ];

    public function mount()
    {
        $user = Auth::user();
        $this->generation = $user->hub_default_generation;
        $this->hubDefaultCreating = $user->hub_default_creating;
        $this->hubDefaultQueryLevel = $user->hub_default_query_level;
        $this->availableGenerations = config('hub.generations');
    }

    public function save()
    {
        $this->validate();

        $user = Auth::user();
        $user->hub_default_generation = $this->generation;
        $user->hub_default_creating = $this->hubDefaultCreating;
        $user->hub_default_query_level = $this->hubDefaultQueryLevel;
        $user->save();

        session()->flash('message', __('Settings updated successfully.'));
    }

    public function render()
    {
        return view('livewire.user-hub-settings');
    }
}