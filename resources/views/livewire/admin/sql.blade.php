<div
    x-data="{
        editorContent: @entangle('query'),
        editor: null,
        isLoading: false,
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
                this.editorContent = code;
            });
            // Add a custom event listener for Ctrl+Enter
            this.$refs.editor.addEventListener('keydown', (e) => {
                if (e.ctrlKey && e.key === 'Enter') {
                    e.preventDefault();
                    e.stopPropagation();
                    this.runQuery();
                }
            }, true); // true activate capturin mode to prevent line flickering
        },
        runQuery() {
            if(this.editorContent && !this.isLoading) {
                this.isLoading = true;
                $wire.runQuery(this.editorContent)
                    .then(data => {
                        this.initEditor();
                        this.isLoading = false;
                    });
            }
        }
    }"
    x-init="initEditor"
>
    <h1>SQL</h1>
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <div wire:ignore x-ref="editor" id="editor" class="hljs language-sql"></div>
                <button @click="runQuery" type="button" class="btn btn-primary w-100 mt-2" x-bind:disabled="isLoading">
                    <span x-show="!isLoading">{{ __('Run') }}</span>
                    <span x-show="isLoading">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        {{ __('Loading...') }}
                    </span>
                </button>
            </div>
           
            @include('admin.partials.result-alert')

            @include('admin.partials.result-table')
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