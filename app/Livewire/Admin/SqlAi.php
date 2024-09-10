<?php

namespace App\Livewire\Admin;

use App\Facades\RequestHub;
use Livewire\Component;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use OpenAI;
use Throwable;

class SqlAi extends Component
{
    public $prompt = '';
    public $query = '';
    public $tables = '';
    public $message = null;
    public $results = [];  

    public function mount()
    {
        $this->prompt = session('last_prompt', '');
        $this->loadTables();
    }

    public function render()
    {
        return view('livewire.admin.sql-ai');
    }

    public function runQuery()
    {
        $this->unsetResults();

        if(! $this->prompt) {
            return;
        }

        try {
            // create a new OpenAI client
            $client = OpenAI::factory()
                ->withBaseUri(config('azure.resource_name').'.openai.azure.com/openai/deployments/'.config('azure.deployment_id'))
                ->withHttpHeader('api-key', config('azure.openai_key'))
                ->withQueryParam('api-version', config('azure.api_version'))
                ->make();

            // send a request to the API
            $result = $client->chat()->create([
                'messages' => [
                    ['role' => 'system', 'content' => $this->buildSystemPrompt()],
                    ['role' => 'user', 'content' => $this->prompt],
                ],
                'max_tokens' => 100,
            ]);

            // decrement the teachers token count
            RequestHub::decrementTokens($result->usage->totalTokens);

            // extract the SQL query from the response
            $this->query = $this->extractSQL($result->choices[0]->message->content);

            if($this->query == 'UNKNOWN') {
                $this->message = [
                    'type' => 'danger',
                    'text' => __('The input cannot be implemented with a database query.'),
                ];
    
                return;
            }
        } catch (Throwable $e) {
            $this->message = [
                'type' => 'danger',
                'text' => (config('app.debug')) ? $e->getMessage() : __('Error in the AI query.'),
            ];

            return;
        }

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

        session(['last_prompt' => $this->prompt]);
    }

    private function buildSystemPrompt()
    {
        $command =  <<<'EOT'
Du bist ein SQL-Generator. Du antwortest ausschließlich in gültigen SQL.

Der Nutzer hat eine Aufgabe, die sich mit SQL Lösen lässt. Andernfalls schreibe nur UNKNOWN

Folgende einzelne Tabellen können abgefragt werden:
EOT;

        return $command . '\n' . $this->tables;
    }

    private function loadTables()
    {
        $r = DB::table('information_schema.tables')->where('table_schema', DB::getDatabaseName())->get();
        $dbclass = '';
        foreach ($r as $v) {
            if (!strcmp($v->TABLE_TYPE, 'BASE TABLE') && $v->TABLE_NAME != 'migrations') {
                $dbclass .= $v->TABLE_NAME . ': ';
                $columns = Schema::getColumnListing($v->TABLE_NAME);
                $dbclass .= implode(', ', $columns);
                $dbclass .= "\n";
            }
        }
        $this->tables = $dbclass;
    }

    private function extractSQL($input) {
        // Entferne Leerzeichen am Anfang und Ende
        $input = trim($input);
        
        // Prüfe, ob der Input mit Markdown-Codeblock-Syntax beginnt
        if (preg_match('/^```sql\s*(.*?)\s*```$/s', $input, $matches)) {
            // Extrahiere den SQL-Code aus dem Markdown-Codeblock
            return trim($matches[1]);
        } elseif (preg_match('/^```\s*(.*?)\s*```$/s', $input, $matches)) {
            // Für den Fall, dass 'sql' nach '```' fehlt, aber es trotzdem ein Codeblock ist
            return trim($matches[1]);
        } else {
            // Wenn kein Markdown-Codeblock gefunden wurde, gib den gesamten Input zurück
            return $input;
        }
    }

    public function unsetResults()
    {
        $this->results = [];
        $this->message = null;
    }
}