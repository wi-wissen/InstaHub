<div
    x-data="{
        editorContent: @entangle('query'),
        editor: null,
        initEditor() {
            const highlight = editor => {
                // highlight.js does not trims old tags,
                // let's do it by this hack.
                editor.textContent = editor.textContent;
                delete editor.dataset.highlighted;
                hljs.highlightElement(editor);
            }

            this.editor = new CodeJar(this.$refs.editor, highlight, {
                tab: '  '
            });
            this.editor.updateCode(this.editorContent);
            this.editor.onUpdate(code => {
                console.log(code);
                this.editorContent = code;
            });
        },
        runQuery() {
            $wire.runQuery(this.editorContent)
                .then(data => this.initEditor());
        }
    }"
    x-init="initEditor"
    @keydown.ctrl.enter="runQuery"
>
    <h1>SQL</h1>
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <div x-ref="editor" id="editor" class="hljs language-sql"></div>
                <button @click="runQuery" type="button" class="btn btn-primary w-100 mt-2">{{ __('Run') }}</button>
            </div>
            
            <div 
                x-cloak x-show="$wire.message" 
                x-bind:class="'alert alert-' + ($wire.message ? $wire.message.type : '') + ' alert-important alert-dismissible mt-3 mb-0'"
                role="alert"
            >
                <span x-text="$wire.message ? $wire.message.text : ''"></span>
                <button wire:click="$set('message', null)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @if($results)
                <div id="table" class="mt-3" style="overflow: auto;">
                    @include('admin.partials.result-table', ['results' => $results])
                </div>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <p>{{ __('The following tables may be queried') }}:</p>
            {!! $tables !!}
        </div>
    </div>
    @if(config('app.allow_public_db_access'))
    <div class="card">
        <div class="card-body">
            @php
                $connection = config('database.connections');
                $connection = end($connection);
            @endphp
            <b>Database Server:</b>
            @if (env('DB_HOST') == '127.0.0.1' || env('DB_HOST') == 'localhost')
                {{ env('APP_URL') . ':' . env('DB_PORT') }}
            @else
                {{ $connection['host'] . ':' . env('DB_PORT') }}
            @endif
            <br />
            <b>{{ __('Database') }}: </b>{{ $connection['database'] }}<br />
            <b>{{ __('Username') }}: </b>{{ $connection['username'] }}<br />
            <b>{{ __('Password') }}: </b>{{ $connection['password'] }}<br />
            <b>{{ __('Charset') }}: </b>{{ $connection['charset'] }}<br />
            <b>{{ __('Collation') }}: </b>{{ $connection['collation'] }}
        </div>
    </div>
    @endif

    <style>
        #table {
            transform: rotateX(180deg);
        }

        #table > table {
            transform: rotateX(180deg);
        }
    </style>
</div>