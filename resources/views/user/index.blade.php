@extends('layouts.app')

@section('content')
    <div class="container" id="user-index">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (isset($heading))
                <h1>{{$heading}}</h1>
                @endif

                @if(isset($char))
                <ul class="pagination justify-content-center" style="margin-top:0!important">
                    <li class="page-item {{ $char == 'All' ? 'active' : '' }}"><a class="page-link" href="/explore/users">{{ __('All') }}</a></li>
                    @foreach(range('A','Z') as $v)
                    <li class="page-item {{ $char == $v ? 'active' : '' }}"><a class="page-link" href="/explore/users/letter/{{$v}}">{{$v}}</a></li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-2">
                    @foreach($users as $user)
                    <div class="media mb-3">
                        <a class="user" href ="{{'/' . $user->username}}">
                            <img class="rounded-circle img-thumbnail p-0 me-2" src="/{{ $user->avatar }}" alt="{{ $user->avatar }}" title="{{ $user->score != null ? $user->score : '' }}" height="50" width="50">  
                        </a>
                        <div class="media-body">
                            @if (RequestHub::hasTable('follows'))
                                <div class="float-right">
                                    @livewire('follow-button', ['username' => $user->username, 'isFollowing' => Auth::user()->isfollowing($user)])
                                </div>
                            @endif
                            <a class="user" href ="{{'/' . $user->username}}"><h4 class="my-0">{{ $user->username }}</h4></a>
                            <p class="mb-0">{{ $user->name }}</p>
                            <p class="mb-0">
                                @if (RequestHub::hasTable('photos'))
                                <b>{{$user->photos()->count()}}</b> {{ __('Photos') }}.
                                @endif
                                @if (RequestHub::hasTable('follows')) 
                                <a href ="{{'/' . $user->username . '/followers'}}"><b>{{$user->followers->count()}}</b> {{ __('followers') }}</a>.
                                <a href ="{{'/' . $user->username . '/following'}}"><b>{{$user->following->count()}}</b> {{ __('following') }}</a>.
                                @endif
                            </p>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>

        @if ( method_exists($users, 'links') )
        <div class="row justify-content-center" style="padding-top:1em;">
            <div class="col-md-10 d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
        @endif

    </div>



@endsection