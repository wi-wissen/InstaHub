@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            @include('flash::message') 
            <div class="row">
                <div class="col-md-12">
                    <h1>SQL</h1>
                    <div class="card">
                        <div class="card-body">     
                        
                            <form id="sqlform" action="sql" method="post">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="editor" id="editor"><?php if ($_POST) echo $_POST['editor'] ?></textarea>
                                    <p id="run"><button type="submit" class="btn btn-primary btn-block">{{ __('Run') }}</button></p>
                                </div>
                            </form>

                            <div id="sql-editor">

                            @if($message)
                            <div role="alert" class="alert alert-{{ $type }} alert-important" style="margin-top: 1rem;">
                                <button v-on:click="removeResult()" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ $message }}
                            </div>
                            @endif

                            @if ($result)
                            <scroll-bar for-id="table"></scroll-bar>
                            <div v-if="table" id="table" style="overflow: auto;">
                                {!! $result !!}
                            </div>
                            @endif

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <p>{{ __('The following tables may be queried') }}:</p>
                            {!! $tables !!}
                        </div>
                    </div>

                    @if(config('app.allow_public_db_access'))
                    <div class="card">
                        <div class="card-body">
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
                            <b>{{ __('Database') }}: </b>{{ $connection['database'] }}<br />
                            <b>{{ __('Username') }}: </b>{{ $connection['username'] }}<br />
                            <b>{{ __('Password') }}: </b>{{ $connection['password'] }}<br />
                            <b>{{ __('Charset') }}: </b>{{ $connection['charset'] }}<br />
                            <b>{{ __('Collation') }}: </b>{{ $connection['collation'] }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
	
@endsection

@section('css')
<style>
#run {
    margin:5px 0 0;
}

.card {
    margin: 1rem 0;
}

.form-group {
    margin-bottom: 0;
}
</style>
@endsection