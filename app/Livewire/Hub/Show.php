<?php

namespace App\Livewire\Hub;

use Livewire\Component;
use App\Models\Hub;
use App\Facades\RequestHub;
use Illuminate\Support\Facades\DB;

class Show extends Component
{
    public $hub;
    public $tableStatus = [];
    public $adminPassword = '';

    public function mount(Hub $hub)
    {
        $this->hub = $hub;
        $this->updateTableStatus();
        $this->adminPassword = $hub->adminPw;
    }

    public function render()
    {
        return view('livewire.hub.show');
    }

    public function updateTableStatus()
    {
        RequestHub::setHubDB($this->hub->id);
        $tables = DB::table('information_schema.tables')
            ->where('TABLE_TYPE', '=', 'BASE TABLE')
            ->get();

        $this->tableStatus = [];
        foreach ($tables as $table) {
            $count = DB::table($table->TABLE_NAME)->count();
            $this->tableStatus[] = [
                'name' => $table->TABLE_NAME,
                'count' => $count
            ];
        }
    }

    public function fillTables($tables, $action)
    {
        $tableArray = explode(',', $tables);
        $this->hub->changeTables($tableArray, $action);
        $this->updateTableStatus();
    }

    public function resetAdminPassword()
    {
        $this->adminPassword = $this->hub->resetAdminPassword();
    }
}