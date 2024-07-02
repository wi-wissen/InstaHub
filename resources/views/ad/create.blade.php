@extends('layouts.app')

@section('content')
<div class="container" id="ad-edit" x-data="{
    name: '{{ old('name', '') }}',
    img: '{{ old('img', '') }}',
    url: '{{ old('url', '') }}',
    readonly: {{ RequestHub::isReadOnly() ? 'true' : 'false' }},

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
        this.editor.updateCode(this.$refs.query.value);
        this.editor.onUpdate(code => {
            this.$refs.query.value = code;
        });
    },
}">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Create') }} <b x-text="name"></b></span>
                    <a href="{{ env('DOC_URL') . '#/frontend?id=business'}}" class="text-muted">{{ __('Documentation') }}</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ '/ads' }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-10">
                                <input x-model="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="type" class="col-md-2 col-form-label text-md-end">{{ __('Type') }}</label>
                            <div class="col-md-10">
                                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                                    <option value="banner" {{ old('type') == 'banner' ? 'selected' : '' }}>{{ __('Banner') }}</option>
                                    <option value="photo" {{ old('type') == 'photo' ? 'selected' : '' }}>{{ __('Photo') }}</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">{{ __('messages.adEditor.position') }}</div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="priority" class="col-md-2 col-form-label text-md-end">{{ __('Priority') }}</label>
                            <div class="col-md-10">
                                <input id="priority" type="text" class="form-control @error('priority') is-invalid @enderror" name="priority" value="{{ old('priority') }}" placeholder="1">
                                <div class="form-text">{{ __('messages.adEditor.priority') }}</div>
                                @error('priority')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="url" class="col-md-2 col-form-label text-md-end">{{ __('URL') }}</label>
                            <div class="col-md-10">
                                <input x-model="url" id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" placeholder="/noad">
                                <div class="form-text">{{ __('messages.adEditor.url') }}</div>
                                @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="img" class="col-md-2 col-form-label text-md-end">{{ __('Image') }}</label>
                            <div class="col-md-10">
                                <input x-model="img" id="img" type="text" class="form-control @error('img') is-invalid @enderror" name="img" value="{{ old('img') }}" placeholder="/img/ad/sommerferien.jpg">
                                <div class="form-text">{!! __('messages.adEditor.image') !!}</div>
                                @error('img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="query" class="col-md-2 col-form-label text-md-end">{{ __('SQL-Query') }}</label>
                            <div class="col-md-10">
                                <input x-ref="query" id="query" type="text" hidden name="query" value="{{ old('query') }}">
                                <div x-ref="editor" id="editor" class="hljs language-sql @error('query') is-invalid @enderror"></div>
                                <div class="form-text">{!! __('messages.adEditor.query') !!}</div>
                                @error('query')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="float-right">
                                <button x-bind:disabled="readonly" type="submit" class="btn btn-success float-end">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Preview') }}</div>
                <div class="card-body">
                    <a x-bind:href="url">
                        <img x-show="img" x-bind:src="img" x-bind:alt="name" class="img-thumbnail img-fluid">
                    </a>
                    <span class="fst-italic" x-show="!img">{{ __('Empty') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection