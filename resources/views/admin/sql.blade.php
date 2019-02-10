@extends('layouts.app')

@section('content')
<div class="container">
	@include('flash::message')
	<div class="row">
		<div class="col-md-12 col-md-offset-0">       
            <h1>SQL-Editor</h1>
            <p>In diesem Formular können SQL-Befehle direkt an die Datenbank gerichtet werden.</p>
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
	
@endsection

@section('css')
<link rel="stylesheet" href="codemirror/lib/codemirror.css">
<style>
    .CodeMirror {
        height: auto;
        /* Bootstrap Settings */
        box-sizing: border-box;
        margin: 0;
        font: inherit;
        overflow: auto;
        font-family: inherit;
        display: block;
        width: 100%;
        /*padding: 6px 12px;*/
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        /* Code Mirror Settings */
        font-family: monospace;
        position: relative;
        overflow: hidden;
    }

    .CodeMirror-focused {
        /* Bootstrap Settings */
        border-color: #66afe9;
        outline: 0;
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }

    #run {
        margin:5px 0 0;
    }

</style>
@endsection

@section('script')
<script src="codemirror/lib/codemirror.js"></script>
<script src="codemirror/mode/sql/sql.js"></script>
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
        lineNumbers: true,
        mode: "text/x-sql",
        matchBrackets: true,
    });
</script>
@endsection