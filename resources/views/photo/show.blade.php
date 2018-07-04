@extends('layouts.app')

@section('content')
<div id="username" style="display: none;">{{ Auth::user()->username }}</div>
<div class="container">
	@include('flash::message')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		    @include('photo.photo', ['photo' => $photo, 'single' => true])
      </div>
    </div>
</div>
@endsection