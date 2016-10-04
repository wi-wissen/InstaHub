@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <ul class="list-group">
                    @foreach($users as $user)
                        <li class="list-group-item">

                            <h4>
                                <img src="{{ $user->avatar }}" alt="{{ $user->avatar }}" height="50" width="50">
                                {{ $user->name }}
                                <h5 style="display:inline">{{ '@' . $user->username }}</h5> &nbsp;
                                <span>{{ count($user->followers)  }} Followers</span> &nbsp; <span>{{ count($user->following) }} Following</span>
                            </h4>

                            <br>
                            <p>{{ $user->bio }}</p>
                            {{--Maybe some photos here--}}
                            {{-- {% if() %} --}}
                            <form action="{{ route('follow', $user->id ) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-success" value="Follow" />
                            </form>


                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>



@endsection