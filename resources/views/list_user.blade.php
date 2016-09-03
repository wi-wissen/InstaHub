@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				@foreach ($users as $user)
					<div class="profile">
						<img src="{{ $user->avatar }}" alt="" class="img-responsive"><br>
						<a href="{{ '../user/' . $user->id }}">{{$user->name}}</a>
						<p class="lead">{{ $user->bio }}</p>
						<a href="{{ 'users/follow/' . $user->id }}" class="btn btn-primary">Follow</a>
					</div>
					
				@endforeach
			</div>
		</div>
	</div>
	
@endsection