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
							@if (Schema::hasTable('photos'))
							<b>{{$user->photos()->count()}}</b> Photos.
							@endif
							@if (Schema::hasTable('follows')) 
							<a href ="{{'../user/' . $user->username . '/followers'}}"><b>{{$user->followers->count()}}</b> Follower</a>.
							<a href ="{{'../user/' . $user->username . '/following'}}">Follows <b>{{$user->following->count()}}</b></a>.
							@endif
						</p>
						<p><i>{{ $user->bio }}</i></p>
						@if ($user->country != "" || isset($user->gender) || 'unknown' != $user->age())
						<p>{{ $user->name }} 
							@if ($user->city != "" && $user->country != "")
								is from {{$user->city}} ({{$user->country}})
							@elseif ($user->country != "")
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

							@if (($user->country != "" || isset($user->gender)) && 'unknown' != $user->age())
								and
							@else 
								.
							@endif

							@if ('unknown' != $user->age())
								is {{$user->age()}} years old.
							@endif

							</p>
						@endif
						
						@if (Auth::user()->id != $user->id)
							@if (Schema::hasTable('follows'))
							@if (Auth::user()->isfollowing($user))
							<form action="{{ url('../follow/' .$user->id) }}" method="post" style="display: inline;">
									{{ csrf_field() }}
									<input type="hidden" name="_method" value="DELETE">
									<input type="submit" class="btn btn-danger" value="Unfollow" />
							</form>
							@else
								<form action="{{ url('../follow/' .$user->id) }}" method="post" style="display: inline;">
									{{ csrf_field() }}
									<input type="submit" class="btn btn-success" value="Follow" />
								</form>
							@endif
							@endif
						@endif

						@if (Auth::user()->id == $user->id || Auth::user()->allowed('dba'))
							<a href="{{'../user/' . $user->username . '/edit'}}" class="btn btn-default" role="button">Edit</a>
							@if (Auth::user()->id == $user->id)
								<a href="{{'../user/' . $user->username . '/password'}}" class="btn btn-default" role="button">Change Password</a>
							@else
								<button id="pw{{ $user->id }}" class="newPassword btn btn-default" data-id="{{ $user->id }}" data-token="{{ csrf_token() }}" >Reset Password</button>
							@endif
							<a href="{{'../user/' . $user->username . '/destroy'}}" class="btn btn-danger" role="button">Delete</a>
						@endif
						
					</div>
				</div>
				<hr>
				@if (Schema::hasTable('photos'))
				<div class="panel panel-defaut">
					<div class="row">
						@foreach ($user->photos as $photo)
						<div class="col-xs-6 col-md-3">
							<a href="{{  '../photo/' . $photo->id }}" class="thumbnail thumb-square">
							<div class="thumb"><img src="{{  '../' . $photo->url }}" alt="{{$photo->description}}"></div>
							</a>
						</div>
					
						@endforeach
					</div>

				</div>
				@endif
			</div>
		</div>
	</div>
@endsection