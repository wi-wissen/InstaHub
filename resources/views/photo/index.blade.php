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
                        @elseif(session('sort_feed') == 'custom')
                            {{ __('Custom Photos') }}
                        @else
                            {{ __('Latest Photos') }}
                        @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @php $basePath = '/' . ltrim(preg_replace('/\?.*/', '', Request::path()), '/'); @endphp
                        <a class="dropdown-item" href="{{ $basePath }}?sort=latest">{{ __('Latest Photos') }}</a>
                        <a class="dropdown-item" href="{{ $basePath }}?sort=best">{{ __('Best Photos') }}</a>
                        <li><hr class="dropdown-divider"></li>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#customWeightsModal">{{ __('Custom Photos') }}</a>
                    </div>
                </div>
                @endif

            	@foreach ($photos as $photo)
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center p-0">
                            <h5 style="padding-left:1.00rem; padding-right: 2.5rem;" class="card-title my-2"><img class="rounded-circle img-thumbnail p-0 me-1" src="/{{ $photo->user->avatar }}" alt="{{ $photo->user->avatar }}" height="50" width="50"> <a href="/{{ $photo->user->username }}" style="color: #333">{{ $photo->user->username  }}</a></h5>
                            @include('photo.partials.photo-menu', ['photo' => $photo])
                        </div>
                        <a href="/p/{{ $photo->id }}" title="{{$photo->description}}"><img src="/{{ '' . $photo->url }}" class="img-fluid" style="display: block;margin: 0 auto; width:100%"/></a>
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
                    @if(!$photos->count())
                        <div class="alert alert-info alert-important" role="alert">
                            {{ __('Nothing found.') }}
                        </div>
                    @endif
                    {{ $photos->links() }}
                @else
                    @if (RequestHub::hasTable('photos'))
                        @if (RequestHub::hasTable('follows')) 
                        <div class="alert alert-info alert-important" role="alert">
                            {{ __('Nothing to show.') }} <strong>{{ __('Follow some great') }} <a href="/explore/users/suggested">{{ __('Members') }}</a>!</strong>
                        </div>
                        @else
                        <div class="alert alert-info alert-important" role="alert">
                            {{ __('Nothing to show.') }}
                        </div>
                        @endif
                    @else 
                    <div class="alert alert-success alert-important" role="alert">
                        {{ __('You are logged in.') }}</strong>
                    </div>
                    @endif
                @endif
            </div>
        </div>
</div>

@if (RequestHub::hasTable('comments') || RequestHub::hasTable('likes'))
    @include('photo.partials.custom-weights-modal')
@endif
@endsection
