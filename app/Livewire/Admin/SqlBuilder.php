<?php

namespace App\Livewire\Admin;

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
    public $table = null;

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
        try {
            $results = DB::select($this->query);
            if (!$results) {
                $this->message = [
                    'type' => 'warning',
                    'text' => __('Anfrage ausgeführt. 0 Ergebnisse gefunden.')
                ];
            } else {
                $this->message = [
                    'type' => 'success',
                    'text' => __('Query executed successfully. :count results found.', ['count' => count($results)])
                ];
            }
            $this->table = $this->formatResult($results);
        } catch (\Exception $e) {
            $this->message = [
                'type' => 'danger',
                'text' => $e->getMessage()
            ];
        }
    }

    private function formatResult($results)
    {
        if (empty($results)) {
            return null;
        }

        $html = '<table class="table table-striped"><thead><tr>';
        foreach (array_keys((array)$results[0]) as $column) {
            $html .= "<th>$column</th>";
        }
        $html .= '</tr></thead><tbody>';

        foreach ($results as $row) {
            $html .= '<tr>';
            foreach ((array)$row as $value) {
                $html .= "<td>$value</td>";
            }
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';
        return $html;
    }
}