<?php

namespace App\Livewire\Hub;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Hub;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    
    public $loading = [
        'activate' => false,
        'readonly' => false,
    ];

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = (Auth::user()->role == 'admin') 
            ? Hub::query() // admin
            : Auth::user()->hubs(); // teacher

        if ($this->search) {
            $searchTerm = $this->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%");
            });
        }

        $hubs = $query->paginate(10)->withQueryString();
        
        return view('livewire.hub.index', [
            'hubs' => $hubs,
        ]);
    }

    public function setActivate($hubId, $activate)
    {
        $this->loading['activate'] = true;

        $hub = Hub::findOrFail($hubId);

        $hub->activated = $activate; // computed property

        $this->loading['activate'] = false;
    }

    public function setReadonly($hubId, $readonly)
    {
        $this->loading['readonly'] = true;

        $hub = Hub::findOrFail($hubId);

        $hub->readonly = $readonly; // computed property

        $this->loading['readonly'] = false;
    }

    public function fillTables($hubId, $tables)
    {
        $this->loading['fill'] = true;

        $hub = Hub::findOrFail($hubId);

        $tableArray = explode(',', $tables);
        $hub->changeTables($tableArray, 'fill');

        $this->loading['fill'] = false;
    }
}