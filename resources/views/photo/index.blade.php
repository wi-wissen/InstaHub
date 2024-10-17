@extends('layouts.app')

@section('content')
<div class="container">
		@include('flash::message')
		<div class="row justify-content-center">
			<div class="col-10">

                @if ($photos && $photos->count() && (RequestHub::hasTable('comments') || RequestHub::hasTable('likes')))
                <div class="dropdown">
                    <a class="btn btn-light dropdown-toggle mb-1 btn-lg" href="#" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(session('sort_feed') == 'best')
                            {{ __('Best Photos') }}
                        @else
                            {{ __('Latest Photos') }}
                        @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/{{ ltrim( str_replace('?sort=latest', "", str_replace('?sort=best', "", Request::path())), '/') }}?sort=latest">{{ __('Latest Photos') }}</a>
                        <a class="dropdown-item" href="/{{ ltrim( str_replace('?sort=latest', "", str_replace('?sort=best', "", Request::path())), '/') }}?sort=best">{{ __('Best Photos') }}</a>
                    </div>
                </div>
                @endif

            	@foreach ($photos as $photo)
                    <div class="card">
                        <div class="card-body" style="padding:1rem 0 0 0;">
                        <h5 style="padding-left:1.00rem;" class="card-title"><img class="rounded-circle img-thumbnail p-0" src="/{{ $photo->user->avatar }}" alt="{{ $photo->user->avatar }}" height="50" width="50"> <a href="/{{ $photo->user->username }}" style="color: #333">{{ $photo->user->username  }}</a></h5>              
                        </div>
                        <a href="/p/{{ $photo->id }}" title="{{$photo->description}} @if(Auth::user()->allowed('dba') && $photo->score)(Score: {{$photo->score}}) @endif"><img src="/{{ '' . $photo->url }}" class="img-fluid" style="display: block;margin: 0 auto; width:100%"/></a>
                    </div>
 
                    @if (RequestHub::hasTable('ads') && $loop->iteration == 2)
                        @if ($ad != null)
                        <div class="card">
                            <div class="card-body" style="padding:1rem 0 0 0;">
                                <h5 style="padding-left:1.00rem;" class="card-title"><img class="rounded-circle img-thumbnail p-0" src="/avatars/000.jpg" alt="000.jpg" width="50" height="50"> <a href="#" style="color: #333">{{ __('Special Offer') }}</a></h5>              
                            </div>
                            <a href="{{$ad->url}}"><img src="{{$ad->img}}" class="card-img-bottom" style="display: block;margin: 0 auto; width:100%"></a>
                        </div>
                        @endif
                    @endif
            	@endforeach
                
                @if(method_exists($photos, 'links'))
                    {{ $photos->links() }}
                @else
                    @if (RequestHub::hasTable('follows') && RequestHub::hasTable('follows')) 
                    <div class="alert alert-info alert-important" role="alert">
                        {{ __('Nothing to show.') }} <strong>{{ __('Follow some great') }} <a href="/explore/users/suggested">{{ __('Members') }}</a>!</strong>
                    </div>
                    @else 
                    <div class="alert alert-success alert-important" role="alert">
                        {{ __('You are logged in.') }}</strong>
                    </div>
                    @endif
                @endif
            </div>
        </div>
</div>
@endsection
