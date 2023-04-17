@extends('layouts.app')

@section('css')
<style>
.media-left{
	padding-right: 40px;
}

.media-left img{
	background-color: white;
}

h5 {
	margin-bottom: 0;
}

.panel {
  display: flex; /* or inline-flex */
  flex-wrap: wrap;
  /*justify-content: space-evenly;*/
  align-content: flex-start;
}

.imgcontainer {
	width: 29%;
	height: 29%;
	margin: 2%;
}

.square {
    width: 100%;
    padding-bottom: 100%;
    background-size: cover;
	background-position: center;
}
</style>

@endsection

@section('content')
	<div class="container" id="user-show">
		@include('flash::message')
		<div class="row justify-content-center">
			<div class="col-10">
				<img class="rounded-circle img-thumbnail img-square mx-auto d-block d-sm-none" src="{{'../' . $user->avatar}}" alt="{{ $user->username }}" class="media-object" width="150" height="150">
				<div class="media">
					<div class="media-left d-none d-sm-block">
						<img class="rounded-circle img-thumbnail img-square" src="{{'../' . $user->avatar}}" alt="{{ $user->username }}" class="media-object" width="175" height="175">
					</div>
					<div class="media-body">
						@if (Auth::user()->id != $user->id)
							@if (RequestHub::hasTable('follows'))
							<follow-button class="float-right" username="{{$user->username}}" v-bind:isfollowing="{{Auth::user()->isfollowing($user)}}"></follow-button>
							@endif
						@endif
						<h2>{{ $user->username }}</h2>
						<p>
							@if (RequestHub::hasTable('photos'))
							<b>{{$user->photos()->count()}}</b> {{ __('Photos') }}.
							@endif
							@if (RequestHub::hasTable('follows')) 
							@if ($user->followers->count() < 2)
							<a href ="{{'../' . $user->username . '/followers'}}"><b>{{$user->followers->count()}}</b> {{ __('follower') }}</a>.
							@else
							<a href ="{{'../' . $user->username . '/followers'}}"><b>{{$user->followers->count()}}</b> {{ __('followers') }}</a>.
							@endif
							
							<a href ="{{'../' . $user->username . '/following'}}"><b>{{$user->following->count()}} {{ __('following') }}</b></a>.
							@endif
						</p>
						<h5>{{ $user->name }}</h5>
						@if($user->bio != '')
						<p><i>{{ $user->bio }}</i></p>
						@endif
						@if ($user->country != "" || isset($user->gender) || 'unknown' != $user->age())
						<p>{{ $user->name }} 
							@if ($user->city != "" && $user->country != "")
								{{ __('is from') }} {{$user->city}} ({{$user->country}})
							@elseif ($user->country != "")
								{{ __('is from') }} {{ $user->country }}
							@endif

							@if ($user->country != "")
								@if ('unknown' == $user->age())
									{{ __('and') }}
								@elseif (isset($user->gender))
									,
								@endif
							@endif
							
							@if (isset($user->gender))
								{{ __('is') }} {{__($user->gender)}}
							@endif

							@if (($user->country != "" || isset($user->gender)) && 'unknown' != $user->age())
								{{ __('and') }}
							@else 
								.
							@endif

							@if ('unknown' != $user->age())
								{{ __('is') }} {{$user->age()}} {{ __('years old') }}.
							@endif

							</p>
						@endif
						
						@if (Auth::user()->id == $user->id || Auth::user()->allowed('dba'))
							<a href="{{'../' . $user->username . '/edit'}}" class="btn btn-outline-dark btn-sm {{ RequestHub::isReadOnly() ? "disabled" : "" }}" role="button">{{ __('Edit') }}</a>
							@if (Auth::user()->id == $user->id)
								<a href="{{'../password'}}" class="btn btn-outline-dark btn-sm {{ RequestHub::isReadOnly() ? "disabled" : "" }}" role="button">{{ __('Change Password') }}</a>
							@endif
							<button v-if="!pw" v-on:click="getNewPw('{{$user->username}}')" {{ RequestHub::isReadOnly() ? "disabled" : "" }} class="newPassword btn btn-outline-dark btn-sm">{{ __('Reset Password') }}</button>
							<code v-else style="padding: 0.25rem 0.5rem; font-size: 0.7875rem;">@{{pw}}</code>
							<a href="{{'../' . $user->username . '/destroy'}}" class="btn btn-outline-danger btn-sm {{ RequestHub::isReadOnly() ? "disabled" : "" }}" role="button">{{ __('Delete') }}</a>
						@endif
						
					</div>
				</div>
				<hr>
				@if (RequestHub::hasTable('photos'))
				<div class="panel">
					@foreach ($user->photos as $photo)
					<div class="imgcontainer">
						<a href="{{  '../p/' . $photo->id }}">
							<div class="square" style="background-image: url('{{  '../' . $photo->url }}')" alt="{{$photo->description}}"></div>
						</a>
					</div>						
					@endforeach
				</div>
				@endif
			</div>
		</div>
	</div>
@endsection

@section('script')
<script>
var id = {{ $user->id }};
</script>
@endsection