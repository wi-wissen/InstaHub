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

    public $selectedQueryLevel;

    public function mount(Hub $hub)
    {
        $this->selectedQueryLevel = $hub->query_level;
    }

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
        $hub = Hub::findOrFail($hubId);

        $hub->activated = $activate; // computed property
    }

    public function setReadonly($hubId, $readonly)
    {
        $hub = Hub::findOrFail($hubId);

        $hub->readonly = $readonly; // computed property
    }

    public function setQueryLevel($hubId, $queryLevel)
    {
        $hub = Hub::findOrFail($hubId);
        $hub->query_level = $queryLevel;
        $hub->save();

        $this->selectedQueryLevel = $queryLevel;
    }

    public function fillTables($hubId, $tables)
    {
        $hub = Hub::findOrFail($hubId);

        $tableArray = explode(',', $tables);
        $hub->changeTables($tableArray, 'fill');
    }

    public function destroy($hubId)
    {
        $hub = Hub::findOrFail($hubId);

        $hub->delete();
    }
}