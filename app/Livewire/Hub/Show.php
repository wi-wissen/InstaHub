<?php

namespace App\Livewire\Hub;

use App\Facades\RequestHub;
use App\Models\Hub;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

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
            ->where('TABLE_SCHEMA', '=', DB::connection()->getDatabaseName())
            ->get();

        $this->tableStatus = [];
        foreach ($tables as $table) {
            $count = DB::table($table->TABLE_NAME)->count();
            $this->tableStatus[] = [
                'name' => $table->TABLE_NAME,
                'count' => $count,
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
