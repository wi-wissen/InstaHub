<?php

namespace App\Livewire\Admin;

use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SqlBuilder extends Component
{
    public $tables = [];
    public $sql = [
        'tables' => [],
        'attrs' => [],
        'orderBy' => [
            'attr' => '',
            'direction' => ''
        ],
        'groupBy' => '',
        'distinct' => false,
        'rules' => [],
    ];
    public $settings = [
        'showsql' => false,
        'rows' => false,
        'attributes' => false,
        'expert' => false
    ];
    public $query = '';
    public $tablenames = [];
    public $attr = [];
    public $rules = [];
    public $message = null;
    public $results = [];

    public function mount()
    {
        $this->loadTables();
    }

    public function render()
    {
        return view('livewire.admin.sql-builder');
    }

    public function updatedSql($value, $key)
    {
        if(str_starts_with($key, 'tables')) {
            $this->attr = $this->getTableAttributes();
            $this->rules = $this->getQueryRules();

            $this->dispatch('tables-updated', ['attr' => $this->attr]);
        }
    }

    private function loadTables()
    {
        $tables = DB::table('information_schema.tables')
            ->where('table_schema', DB::getDatabaseName())
            ->get();

        $this->tables = [];
        $this->tablenames = [];

        foreach ($tables as $table) {
            if ($table->TABLE_TYPE === 'BASE TABLE' && $table->TABLE_NAME !== 'migrations') {
                $tableName = $table->TABLE_NAME;
                $this->tablenames[] = $tableName;
                $columns = Schema::getColumnListing($tableName);
                $this->tables[$tableName] = $columns;
            }
        }
    }

    public function getTableAttributes()
    {
        $attrs = [];
        if (count($this->sql['tables']) == 1) {
            $attrs = $this->tables[$this->sql['tables'][0]] ?? [];
        } else {
            foreach ($this->sql['tables'] as $table) {
                foreach ($this->tables[$table] ?? [] as $column) {
                    $attrs[] = $table . '.' . $column;
                }
            }
        }
        return $attrs;
    }

    public function getQueryRules()
    {
        return array_map(function($attr) {
            return ['type' => 'text', 'id' => $attr, 'label' => $attr];
        }, $this->attr);
    }

    public function getResult()
    {
        $this->unsetResults();
        
        try {
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
        } catch (Exception $e) {
            $this->message = [
                'type' => 'danger',
                'text' => $e->getMessage()
            ];
        }
    }

    public function unsetResults()
    {
        $this->message = null;
        $this->results = [];
    }
}