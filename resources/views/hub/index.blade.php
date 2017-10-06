@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Hub</td>
                            <td>Created at</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($hubs as $hub)
                        <tr id="{{ $hub->id }}">
                                    <td><a href="https://{{ $hub->name . env('SESSION_DOMAIN')  . '/'}}">{{ $hub->name }}</a></td>
                                    <td>{{ $hub->created_at }}</td>
                                    <td>
                                    <a href="{{ url('/hubs/' . $hub->id . '/activate') }}" class="btn btn-default">Activate</a>
                                    <a href="{{ url('/hubs/' . $hub->id . '/dba/admin') }}" class="btn btn-primary">DB Admin</a>
                                    <a href="{{ url('/hubs/' . $hub->id) }}" class="btn btn-default">Login as DBA</a>
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