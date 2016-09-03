@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="media">
					<div class="media-left">
						<img src="{{'../' . $user->avatar}}" alt="{{ $user->username }}" class="media-object" width="250" height="250">
					</div>
					<div class="media-body">
						<h2>{{ $user->name }}</h2>
						<h5>{{ '@' . $user->username }}</h5>
						<p>{{ $user->bio }}</p>
						<a href='#' class="btn btn-primary">Follow</a>
					</div>
				</div>
				<hr>
				<div class="panel panel-defaut">
					@foreach ($photos as $photo)
						{{$photo->description}}
						
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection