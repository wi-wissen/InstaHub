@extends('layouts.app')

@section('content')
<div class="container" id="ad-edit">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Create') }} <b>@{{name}}</b>
                    <a href="{{ env('DOC_URL') . '#/frontend?id=business'}}" class="text-muted float-right">{{ __('Documentation') }}</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ '/ads' }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input v-model="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }} row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                    @if (old('type') == 'banner')
                                        <option value="banner" selected>{{ __('Banner') }}</option>
                                        <option value="photo">{{ __('Photo') }}</option>
                                    @else
                                        <option value="banner" selected>{{ __('Banner') }}</option>
                                        <option value="photo">{{ __('Photo') }}</option>
                                    @endif
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    {{ __('messages.adEditor.position') }}
                                </small>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }} row">
                            <label for="priority" class="col-md-4 col-form-label text-md-right">{{ __('Priority') }}</label>

                            <div class="col-md-6">
                                <input id="priority" type="text" class="form-control @error('priority') is-invalid @enderror" name="priority" value="{{ old('priority') }}" placeholder="1" autofocus>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    {{ __('messages.adEditor.priority') }}
                                </small>

                                @error('priority')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
												
                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }} row">
                            <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('URL') }}</label>

                            <div class="col-md-6">
                                <input v-model="url" id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" placeholder="/noad" autofocus>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    {{ __('messages.adEditor.url') }}
                                </small>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }} row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input v-model="img" id="img" type="text" class="form-control @error('img') is-invalid @enderror" name="img" value="{{ old('img') }}"  placeholder="/img/ad/sommerferien.jpg" autofocus>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    {!! __('messages.adEditor.image') !!}
                                </small>

                                @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('query') ? ' has-error' : '' }} row">
                            <label for="query" class="col-md-4 col-form-label text-md-right">{{ __('SQL-Query') }}</label>

                            <div class="col-md-6">
                                <input id="query" type="text" class="form-control @error('query') is-invalid @enderror" name="query" value="{{ old('query') }}" autofocus>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                {!! __('messages.adEditor.query') !!}
                                </small>

                                @error('query')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                        <div class="form-group">
                            <div class="col-md-10">
                                <button :disabled="!!readonly" type="submit" class="btn btn-success float-right">
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
                    <a v-bind:href="url">
                        <img v-bind:src="img" v-bind:alt="name" class="img-thumbnail img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
	.card {
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('script')
<script>
	var data = {
		name:"{{ old('name', '') }}",
        img:"{{ old('img', '') }}",
        url:"{{ old('url', '') }}",
        readonly: {{ (RequestHub::isReadOnly()) ? 'true' : 'false' }},
	}
</script>
@endsection
