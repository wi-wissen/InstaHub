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
        <button @click="runQuery" type="button" class="btn btn-primary w-100 mt-2" x-bind:disabled="isLoading || {{ !RequestHub::hasTokens() ? 'true' : 'false' }}">{{ __('Run') }}</button>
    </div>

    <pre
        x-show="$wire.query && $wire.query != 'UNKNOWN'"
        wire:ignore
        class="hljs language-sql mt-3 mb-0 card-body"
        x-text="$wire.query"
        x-ref="query"
    ></pre>

    @if(! RequestHub::hasTokens())
        <div
            class="d-flex align-items-center justify-content-between alert alert-warning alert-important mt-3 mb-0"
            role="alert"
        >
            <span>{{ __('No AI budget available.')}}</span>
        </div>
    @endif

    <div
        x-bind:class="{ 'd-none': !isLoading }" x-cloak
        class="d-flex align-items-center justify-content-between alert alert-info alert-important mt-3 mb-0"
        role="alert"
    >
        <span>{{ __('Request is being processed...')}}</span>
        <div class="spinner-border spinner-border spinner-border-sm ml-auto" role="status" aria-hidden="true"></div>
    </div>
    
    @include('admin.partials.result-alert')

    @include('admin.partials.result-table')
</div>