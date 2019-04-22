@extends('layouts.app')

@section('content')
<div class="container" id="ad-edit">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit <b>@{{name}}</b>
                    <a href="{{ env('DOC_URL') . '#/frontend?id=business'}}" class="text-muted float-right">Documentation</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ '/ads/' . $ad->id }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input v-model="name" id="name" type="text" class="form-control" name="name" value="{{ old('name', $ad->name) }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }} row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>

                            <div class="col-md-6">
                                <select class="form-control" id="type" name="type">
                                    @if (old('type', $ad->type) == 'banner')
                                        <option value="banner" selected>Banner</option>
                                        <option value="photo">Photo</option>
                                    @elseif (old('type', $ad->type) == 'photo')
                                        <option value="banner" selected>Banner</option>
                                        <option value="photo">Photo</option>
                                    @endif
                                </select>

                                @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Banner are under Photos and Photos are shown at the 3rd place in the Newsfeed.
                                </small>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }} row">
                            <label for="priority" class="col-md-4 col-form-label text-md-right">Priority</label>

                            <div class="col-md-6">
                                <input v-model="priority" id="priority" type="text" class="form-control" name="priority" value="{{ old('priority', $ad->priority) }}" placeholder="1" autofocus>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    If two or more Ads are possible the one with the lowest Number (e.g. 1) will be chosen.
                                </small>

                                @if ($errors->has('priority'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
												
                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }} row">
                            <label for="url" class="col-md-4 col-form-label text-md-right">URL</label>

                            <div class="col-md-6">
                                <input v-model="url" id="url" type="text" class="form-control" name="url" value="{{ old('url', $ad->url) }}" placeholder="/noad" autofocus>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Link of your Campain.
                                </small>

                                @if ($errors->has('url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }} row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">Image</label>

                            <div class="col-md-6">
                                <input v-model="img" id="img" type="text" class="form-control" name="img" value="{{ old('img', $ad->img) }}"  placeholder="/img/ad/sommerferien.jpg" autofocus>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Absolut or relative Url to Image wich will be shown.
                                </small>

                                @if ($errors->has('img'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('query') ? ' has-error' : '' }} row">
                            <label for="query" class="col-md-4 col-form-label text-md-right">SQL-Query</label>

                            <div class="col-md-6">
                                <input id="query" type="text" class="form-control" name="query" value="{{ old('query', $ad->query) }}" autofocus>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Query must return <code>true</code> or <code>false</code> or an list of User-IDs which contains or not contains actual User. Use <code>$user</code> for actual User and <code>$photo</code> for actual Photo.
                                </small>

                                @if ($errors->has('query'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('query') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group">
                            <div class="col-md-10">
                                <button :disabled="!!readonly" type="submit" class="btn btn-primary float-right">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Preview</div>
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
		name:"{{ old('name', $ad->name) }}",
        img:"{{ old('img', $ad->img) }}",
        url:"{{ old('url', $ad->url) }}",
        readonly: {{Session::get('readonly')}},
	}
</script>
@endsection
