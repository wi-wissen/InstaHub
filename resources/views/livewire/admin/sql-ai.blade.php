<div
x-data="{
        isLoading: false,
        runQuery() {
            this.isLoading = true;
            $wire.runQuery(this.editorContent)
                .then(data => {
                    // Syntax Highlighting
                    this.$nextTick(() => {
                        delete this.$refs.query.dataset.highlighted;
                        hljs.highlightElement(this.$refs.query)
                    });
                })
                .finally(() => {
                    this.isLoading = false;
                });
        }
    }"
    @keydown.ctrl.enter="runQuery"
>
    <div class="form-group">
        <textarea wire:model="prompt" class="form-control" spellcheck="false"></textarea>
        <button @click="runQuery" type="button" class="btn btn-primary w-100 mt-2" x-bind:disabled="isLoading">{{ __('Run') }}</button>
    </div>

    <pre
        x-show="$wire.query && $wire.query != 'UNKNOWN'"
        wire:ignore
        class="hljs language-sql mt-3 mb-0 card-body"
        x-text="$wire.query"
        x-ref="query"
    ></pre>

    <div
        x-bind:class="{ 'd-none': !isLoading }" x-cloak
        class="d-flex align-items-center justify-content-between alert alert-info alert-important mt-3 mb-0"
        role="alert"
    >
        <span>{{ __('Anfrage wird verarbeitet...')}}</span>
        <div class="spinner-border spinner-border spinner-border-sm ml-auto" role="status" aria-hidden="true"></div>
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

    <style>
        #table {
            transform: rotateX(180deg);
        }

        #table > table {
            transform: rotateX(180deg);
        }
    </style>
</div>