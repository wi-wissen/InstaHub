@extends('layouts.app')

@section('css')
<style>
	.table {
		background-color: white;
	}
</style>
@endsection

@section('content')
    <div class="container">
        @include('flash::message')
        <div class="row  justify-content-center">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Hub</td>
                            <td>Admin</td>
                            <td>Created at</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($hubs as $hub)
                        <tr id="{{ $hub->id }}">
                                    <td><a href="https://{{ $hub->name . env('SESSION_DOMAIN')  . '/'}}">{{ $hub->name }}</a></td>
                                    @if ($hub->hasWorkingUser())
                                        <td>{{ $hub->adminname() }}</td>
                                        <td>{{ $hub->created_at }}</td>
                                        <td>
                                        @if ($hub->activated() == 0)
                                            <a href="{{ url('/hubs/' . $hub->id . '/dba/activate') }}" class="btn btn-outline-dark">Activate</a>
                                        @endif
                                        @if ($hub->readonly() == 0)
                                        <a href="{{ url('/hubs/' . $hub->id . '/dba/admin') }}" class="btn btn-primary">DB Admin</a>
                                        @endif
                                        <a href="{{ url('/hubs/' . $hub->id) }}" class="btn btn-outline-dark">Login as DBA</a>
                                        @if ($hub->readonly() == 0)
                                        <a href="/hubs/{{$hub->id}}/dba/tables/fill/photos,tags,likes,follows,comments,analytics,ads" class="btn btn-outline-dark">Fill all Tables</a>
                                        @endif
                                        @if ($hub->readonly() == 1)
                                            <a href="{{ url('/hubs/' . $hub->id . '/dba/readwrite') }}" class="btn btn-outline-dark">Run</a>
                                        @else
                                            <a href="{{ url('/hubs/' . $hub->id . '/dba/readonly') }}" class="btn btn-danger">Maintenance</a>
                                        @endif
                                        @if ($hub->activated() == 1)
                                            <a href="{{ url('/hubs/' . $hub->id . '/dba/deactivate') }}" class="btn btn-danger">Deactivate</a>
                                        @endif
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td>
                                        @if ($hub->readonly() == 0)
                                        <a href="{{ url('/hubs/' . $hub->id . '/dba/admin') }}" class="btn btn-primary">DB Admin</a>
                                        @endif
                                        <a href="#" class="btn btn-danger disabled">Login as DBA</a>
                                        @if ($hub->readonly() == 0)
                                        <a href="/hubs/{{$hub->id}}/dba/tables/fill/photos,tags,likes,follows,comments,analytics,ads" class="btn btn-outline-dark">Fill all Tables</a>
                                        @endif
                                        @if ($hub->readonly() == 1)
                                            <a href="{{ url('/hubs/' . $hub->id . '/dba/readwrite') }}" class="btn btn-outline-dark">Run</a>
                                        @else
                                            <a href="{{ url('/hubs/' . $hub->id . '/dba/readonly') }}" class="btn btn-danger">Maintenance</a>
                                        @endif
                                    @endif
                                    <form action="{{ url('../hubs/' .$hub->id) }}" method="post" style="display: inline;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" class="btn btn-danger" value="Delete" />
                                    </form>
                                    </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $hubs->links() }}
            </div>
        </div>
    </div>



@endsection