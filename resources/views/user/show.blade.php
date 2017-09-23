@extends('layouts.app')

@section('content')
	<div class="container">
		@include('flash::message')
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="media">
					<div class="media-left">
						<img class="img-circle" src="{{'../' . $user->avatar}}" alt="{{ $user->username }}" class="media-object" width="175" height="175">
					</div>
					<div class="media-body">
						<h2>{{ $user->name }}</h2>
						<h5>{{ '@' . $user->username }}</h5>
						<p>
							<b>{{$photos->count()}}</b> Photos. 
							<a href ="{{'../user/' . $user->username . '/followers'}}"><b>{{$user->followers->count()}}</b> Follower</a>.
							<a href ="{{'../user/' . $user->username . '/following'}}">Follows <b>{{$user->following->count()}}</b></a>.
						</p>
						<p><i>{{ $user->bio }}</i></p>
						<p>{{ $user->name }} 
							@if (isset($user->city) && isset($user->country))
								is from {{$user->city}} ({{$user->country}})
							@elseif (isset($user->country))
								is from $user->country
							@endif

							@if ('unknown' == $user->age())
								and
							@else
								,
							@endif
							
							@if (isset($user->gender))
								is {{$user->gender}} 
							@endif

							@if ((isset($user->country) || isset($user->gender)) && 'unknown' != $user->age())
								and
							@else 
								.
							@endif

							@if ('unknown' != $user->age())
								is {{$user->age()}} years old.
							@endif

							</p>
						
						@if (Auth::user()->id != $user->id)
							@if (Auth::user()->isfollowing($user))
							<form action="{{ route('follow', $user->id) }}" method="post" style="display: inline;">
									{{ csrf_field() }}
									<input type="hidden" name="_method" value="DELETE">
									<input type="submit" class="btn btn-danger" value="Unfollow" />
							</form>
							@else
								<form action="{{ route('follow', $user->id) }}" method="post" style="display: inline;">
									{{ csrf_field() }}
									<input type="submit" class="btn btn-success" value="Follow" />
								</form>
							@endif
						@endif

						@if (Auth::user()->id == $user->id || Auth::user()->allowed('dba'))
							<a href="{{'../user/' . $user->username . '/edit'}}" class="btn btn-default" role="button">Edit</a>
							<a href="{{'../user/' . $user->username . '/destroy'}}" class="btn btn-danger" role="button">Delete</a>
						@endif
						
					</div>
				</div>
				<hr>
				<div class="panel panel-defaut">
					<div class="row">
						@foreach ($photos as $photo)
						<div class="col-xs-6 col-md-3">
							<a href="{{  '../photo/' . $photo->id }}" class="thumbnail">
							<img src="{{  '../' . $photo->url }}" alt="{{$photo->description}}">
							</a>
						</div>
					
						@endforeach
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection