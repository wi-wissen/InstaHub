<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Sql extends Component
{
    public $query = '';
    public $tables = '';
    public $message = null;
    public $results = [];
    

    public function mount()
    {
        $this->query = session('last_query', '');
        $this->loadTables();
    }

    public function render()
    {
        return view('livewire.admin.sql');
    }

    public function runQuery()
    {
        $this->unsetResults();

        try {
            if (strpos(strtolower(trim($this->query)), 'select') !== 0) {
                DB::statement($this->query);
                $this->message = [
                    'type' => 'success',
                    'text' => __('Query executed.'),
                ];
            } else {
                $this->results = DB::select($this->query);
                if (! $this->results) {
                    $this->message = [
                        'type' => 'warning',
                        'text' => __('Query executed. 0 results found.'),
                    ];
                } else {
                    $this->message = [
                        'type' => 'success',
                        'text' => __('Query executed successfully. :count results found.', ['count' => count($this->results)])
                    ];
                }
            }
        } catch (QueryException $e) {
            $this->message = [
                'type' => 'danger',
                'text' => $e->getMessage()
            ];
        }

        session(['last_query' => $this->query]);
    }

    public function unsetResults()
    {
        $this->results = [];
        $this->message = null;
    }

    private function loadTables()
    {
        $r = DB::table('information_schema.tables')->where('table_schema', DB::getDatabaseName())->get();
        $dbclass = '';
        foreach ($r as $v) {
            if (!strcmp($v->TABLE_TYPE, 'BASE TABLE') && $v->TABLE_NAME != 'migrations') {
                $dbclass .= '<b>' . htmlspecialchars($v->TABLE_NAME) . ':</b> ';
                $columns = Schema::getColumnListing($v->TABLE_NAME);
                $dbclass .= implode(', ', array_map('htmlspecialchars', $columns));
                $dbclass .= '<br />';
            }
        }
        $this->tables = $dbclass;
    }
}