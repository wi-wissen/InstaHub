@extends('layouts.app')

@section('content')
<div id="username" style="display: none;">{{ Auth::user()->username }}</div>
<div class="container">
	@include('flash::message')

	<div class="row justify-content-center">
		<div class="col-md-10">
			@if (Schema::hasTable('ads'))
		    	@include('photo.photo', ['photo' => $photo, 'ad' => $ad, 'single' => true])
			@else
				@include('photo.photo', ['photo' => $photo, 'single' => true])
			@endif
      </div>
    </div>
</div>
@endsection