@extends('layouts.app')

@section('css')
<style>
    .card{
        margin-bottom: 1em;
    }
</style>
@endsection

@section('content')
<div class="container">
		@include('flash::message')
		<div class="row justify-content-center">
			<div class="col-10">
            	@foreach ($photos as $photo)
                    <div class="card">
                        <div class="card-body" style="padding:1rem 0 0 0;">
                        <h5 style="padding-left:1.00rem;" class="card-title"><img class="rounded-circle img-thumbnail" src="/{{ $photo->user->avatar }}" alt="{{ $photo->user->avatar }}" height="50" width="50"> <a href="/user/{{ $photo->user->username }}" style="color: #333">{{ $photo->user->username  }}</a></h5>              
                        </div>
                        <a href="../photo/{{ $photo->id }}"><img src="../{{ '' . $photo->url }}" class="img-fluid" style="display: block;margin: 0 auto; width:100%"/></a>
                    </div>
 
                    @if (Schema::hasTable('ads') && $loop->iteration == 2)
                        @if ($ad != null)
                        <div class="card">
                            <div class="card-body" style="padding:1rem 0 0 0;">
                                <h5 style="padding-left:1.00rem;" class="card-title"><img class="rounded-circle img-thumbnail" src="/000.jpg" alt="000.jpg" width="50" height="50"> <a href="#" style="color: #333">{{ __('Special Offer') }}</a></h5>              
                            </div>
                            <a href="{{$ad->url}}"><img src="{{$ad->img}}" class="card-img-bottom" style="display: block;margin: 0 auto; width:100%"></a>
                        </div>
                        @endif
                    @endif
            	@endforeach
                
                @if(!empty($photos))
                    {{ $photos->links() }}
                @else
                    @if (Schema::hasTable('follows') && Schema::hasTable('follows')) 
                    <div class="alert alert-info alert-important" role="alert">
                        {{ __('Nothing to show.') }} <strong>{{ __('Follow some great') }} <a href="/user">{{ __('Members') }}</a>!</strong>
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
