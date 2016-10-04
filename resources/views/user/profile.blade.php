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

						@if ($following)
							<button class="btn btn-success disabled">Following</button>
						@else
							<form action="{{ route('follow', $user->id) }}" method="post">
								{{ csrf_field() }}
								<input type="submit" class="btn btn-success" value="Follow" />
							</form>
						@endif

					</div>
				</div>
				<hr>
				<div class="panel panel-defaut">
					<div class="row">
						@foreach ($photos as $photo)
						<div class="col-md-4">
							<img src="{{  '../photos/' . $photo->url }}" class="img-responsive"/><br>
						</div>
						@endforeach
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection