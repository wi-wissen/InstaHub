<?php

namespace App\Livewire\Admin;

use App\Facades\RequestHub;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use OpenAI;
use Throwable;

class Sql extends Component
{
    public $query = '';

    public $tablesHtml = '';

    public $tablesMarkdown = '';

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
                        'text' => __('Query executed successfully. :count results found.', ['count' => count($this->results)]),
                    ];
                }
            }
        } catch (QueryException $e) {
            $errorMessage = $this->extractSqlErrorMessage($e);

            if (RequestHub::query_level() == 'ai' && RequestHub::hasTokens()) {
                try {
                    // create a new OpenAI client
                    $client = OpenAI::factory()
                        ->withBaseUri(config('openai.base_url'))
                        ->withHttpHeader('Authorization', 'Bearer '.config('openai.api_key'))
                        ->make();

                    // send a request to the API
                    $result = $client->chat()->create([
                        'model' => config('openai.model'),
                        'messages' => [
                            ['role' => 'system', 'content' => $this->buildSystemPrompt($errorMessage)],
                            ['role' => 'user', 'content' => $this->query],
                        ],
                        'max_tokens' => 500,
                    ]);

                    // decrement the teachers token count
                    RequestHub::decrementTokens($result->usage->totalTokens);

                    // get message from AI
                    $message = $result->choices[0]->message->content;

                    if ($message != 'UNKNOWN') {
                        // update error message only if there was actually an sql error
                        $errorMessage = $message;
                    }
                } catch (Throwable $e) {
                    // nothing to do
                }
            }

            $this->message = [
                'type' => 'danger',
                'text' => $errorMessage,
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

        foreach ($r as $v) {
            if (! strcmp($v->TABLE_TYPE, 'BASE TABLE') && $v->TABLE_NAME != 'migrations') {
                $columns = Schema::getColumnListing($v->TABLE_NAME);

                $this->tablesHtml .= '<b>'.htmlspecialchars($v->TABLE_NAME).':</b> ';
                $this->tablesHtml .= implode(', ', array_map('htmlspecialchars', $columns));
                $this->tablesHtml .= '<br />';

                $this->tablesMarkdown .= $v->TABLE_NAME.': ';
                $this->tablesMarkdown .= implode(', ', $columns);
                $this->tablesMarkdown .= "\n";
            }
        }
    }

    private function extractSqlErrorMessage(QueryException $e): string
    {
        $sqlState = $e->errorInfo[0] ?? '';
        $errorCode = $e->errorInfo[1] ?? '';
        $message = $e->errorInfo[2] ?? '';

        if (str_starts_with($sqlState, '42')) {
            // https://en.wikipedia.org/wiki/SQLSTATE
            return $message;
        }

        return $e->getMessage();
    }

    private function buildSystemPrompt($errorMessage)
    {
        $command = <<<EOT
Du gibst SQL-Fehler in normaler Sprache aus. Und gibst einen kurzen Hinweis, wie der Fehler behoben werden kann.

Der Nutzer gibt dir seinen SQL-Befehl. Ist es kein SQL-Befehl, schreibe nur UNKNOWN

Der Nutzer spricht die Sprache mit dem Kürzel `{$this->getBrowserLanguage()}`.

Hier Zwei Beispiel-Fehler:
* `Unknown column 'name' in 'field list'` -> `Die Spalte `name` existiert nicht in der Tabelle 'users'.`
* `You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'comments' at line 1` -> `Du musst nach 'comments' noch ein Komma setzen.`

Gib nur so Hinweise. Gib nie die Lösung des Problems aus!

Antwort möglichst in einem kompakten Satz.

Folgende einzelne Tabellen können abgefragt werden:

{$this->tablesMarkdown}

Und das ist die Fehlermeldung:

{$errorMessage}
EOT;

        return $command;
    }

    private function getBrowserLanguage()
    {
        $httpAcceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? null;

        if ($httpAcceptLanguage === null) {
            return App::getLocale();
        }

        $lang = substr($httpAcceptLanguage, 0, 2);

        return $lang ?: App::getLocale(); // Fallback to current locale if substr returns an empty string
    }
}
