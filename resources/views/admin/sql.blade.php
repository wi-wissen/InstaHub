@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">

    {{-- @include('flash::message') - otherwise this will be used for showing sql result infos--}}
	<div class="row">
		<div class="col-md-12">       
            <h1>Database</h1>
            <form action="sql" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="comment">SQL-Befehl:</label>
                    <textarea class="form-control" rows="5" name="editor" id="editor"><?php if ($_POST) echo $_POST['editor'] ?></textarea>
                    <p id="run"><button type="submit" class="btn btn-primary btn-block">Ausführen</button></p>
                </div>
            </form>
            @include('flash::message')
            @if ($result)
            <div style="overflow: auto;">
                {!! $result !!}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-body">
                    <p> Folgende einzelne Tabellen können abgefragt werden:</p>
                    {!! $tables !!}
                </div>
            </div>

            @if(env('ALLOW_PUBLIC_DB_ACCESS'))
            <div class="panel panel-default">
                <div class="panel-body">
                @php
                    $connection = config('database.connections');
                    $connection = end($connection);
                @endphp
                <b>Database Server:</b>
                @if (env('DB_HOST') == '127.0.0.1' || env('DB_HOST') == 'localhost')
                    {{ env('APP_URL') . ':' . env('DB_PORT') }}
                @else
                    {{ $connection['host'] . ':' . env('DB_PORT') }}
                @endif
                <br />
                <b>Database: </b>{{ $connection['database'] }}<br />
                <b>Username: </b>{{ $connection['username'] }}<br />
                <b>Password: </b>{{ $connection['password'] }}<br />
                <b>Charset: </b>{{ $connection['charset'] }}<br />
                <b>Collation: </b>{{ $connection['collation'] }}
                
                </div>
            </div>
            @endif
		</div>
	</div>
</div>

        </div>
    </div>
</div>
	
@endsection

@section('css')
<style>
.CodeMirror {
    width: 100%;
    height: auto;
    color: #495057;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    margin-bottom: 0.5rem;
}
.CodeMirror:focus-within {
    color: #495057;
    background-color: #fff;
    border-color: #a1cbef;
    outline: 0;
    -webkit-box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
    box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
}
    #run {
        margin:5px 0 0;
    }

</style>
@endsection