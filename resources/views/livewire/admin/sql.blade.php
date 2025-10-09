<div
    x-data="{
        editorContent: @entangle('query'),
        isLoading: false,
        initEditor() {
            const textarea = this.$refs.textarea;
            const preview = this.$refs.preview;
            
            // Warte auf Livewire-Sync und dann initial mirror
            this.$nextTick(() => {
                textarea.value = this.editorContent;
                this.mirror();
            });
            
            // Update on input
            textarea.addEventListener('input', () => {
                this.editorContent = textarea.value;
                this.mirror();
            });
            
            // Sync scrolling
            textarea.addEventListener('scroll', () => {
                preview.scrollTop = textarea.scrollTop;
                preview.scrollLeft = textarea.scrollLeft;
            });
            
            // Handle manual resize
            const resizeObserver = new ResizeObserver(() => {
                preview.style.height = textarea.offsetHeight + 'px';
            });
            resizeObserver.observe(textarea);
            
            // Add Ctrl+Enter and Tab handler
            textarea.addEventListener('keydown', (e) => {
                if (e.ctrlKey && e.key === 'Enter') {
                    e.preventDefault();
                    e.stopPropagation();
                    this.runQuery();
                }

                if (e.key === 'Tab') {
                    e.preventDefault();
                    document.execCommand('insertText', false, '  ');
                }
            }, true);
        },
        mirror() {
            const textarea = this.$refs.textarea;
            const preview = this.$refs.preview;
            
            // highlight.js needs textContent set first
            preview.textContent = textarea.value;
            delete preview.dataset.highlighted;
            hljs.highlightElement(preview);
            
            // Auto-grow textarea
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
            
            // Sync preview height
            preview.style.height = textarea.scrollHeight + 'px';
        },
        runQuery() {
            if(this.editorContent && !this.isLoading) {
                this.isLoading = true;
                $wire.runQuery(this.editorContent)
                    .then(data => {
                        this.mirror();
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
                <div wire:ignore id="editor">
                    <pre x-ref="preview" class="preview hljs language-sql"></pre>
                    <textarea 
                        x-ref="textarea" 
                        class="code" 
                        spellcheck="false"
                    ></textarea>
                </div>
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
            {!! $tablesHtml !!}
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