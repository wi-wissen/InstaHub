<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Sql extends Component
{
    public $query = '';
    public $result = '';
    public $tables = '';
    public $message = null;
    public $type = null;

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
        $this->result = '';
        $this->message = null;
        $this->type = null;

        try {
            if (strpos(strtolower(trim($this->query)), 'select') !== 0) {
                DB::statement($this->query);
                $this->message = 'Anfrage ausgeführt.';
                $this->type = 'success';
            } else {
                $r = DB::select($this->query);
                if (!$r) {
                    $this->message = __('Query executed. 0 results found.');
                    $this->type = 'warning';
                } else {
                    $this->message = __('Query executed successfully. :count results found.', ['count' => count($r)]);
                    $this->type = 'success';
                    $this->result = $this->formatResult($r);
                }
            }
        } catch (QueryException $ex) {
            $this->message = $ex->getMessage();
            $this->type = 'danger';
        }

        session(['last_query' => $this->query]);
    }

    private function formatResult($r)
    {
        $cols = array_keys((array) $r[0]);
        $t = "<table class='table mb-0'>";
        $t .= "<thead><tr>";
        foreach ($cols as $col) {
            $t .= "<th>" . htmlspecialchars($col) . "</th>";
        }
        $t .= "</tr></thead><tbody>";
        foreach ($r as $row) {
            $t .= "<tr>";
            foreach ($cols as $col) {
                $value = $row->$col;
                if ($value === null) {
                    $t .= "<td><code>NULL</code></td>";
                } elseif (filter_var($value, FILTER_VALIDATE_URL)) {
                    $t .= "<td><a href='" . htmlspecialchars($value) . "'>" . htmlspecialchars($value) . "</a></td>";
                } elseif (preg_match("/^.*\.(jpg|jpeg|png|gif)$/i", $value)) {
                    $t .= "<td><a href='/" . htmlspecialchars($value) . "'>" . htmlspecialchars($value) . "</a></td>";
                } else {
                    $t .= "<td>" . htmlspecialchars($value) . "</td>";
                }
            }
            $t .= "</tr>";
        }
        $t .= "</tbody></table>";
        return $t;
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