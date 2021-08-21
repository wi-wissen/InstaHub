@extends('layouts.app')

@section('css')
<style>
.user {
    text-decoration: none;
    text-color: #212529;
}
.user img {
    margin-right: 5px;
}

h4 {
    margin-bottom: 0;
}

.card {
    padding: 10px;
}

p {
    margin-bottom: 0;
}

.media {
    margin-bottom: 1em;
}
</style>

@endsection

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
                <div class="card">
                    @foreach($users as $user)
                    <div class="media">
                        <a class="user" href ="{{'/' . $user->username}}">
                            <img class="rounded-circle img-thumbnail" src="/{{ $user->avatar }}" alt="{{ $user->avatar }}" title="{{ $user->score != null ? $user->score : '' }}" height="50" width="50">  
                        </a>
                        <div class="media-body">
                        @if (RequestHub::hasTable('follows'))
                            <follow-button class="float-right" id="{{$user->id}}" v-bind:isfollowing="{{Auth::user()->isfollowing($user)}}"></follow-button>
						@endif
                            <a class="user" href ="{{'/' . $user->username}}"><h4 class="mt-0">{{ $user->username }}</h4></a>
                            <p>{{ $user->name }}</p>
                            <p>
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