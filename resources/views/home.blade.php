@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

            	@foreach ($photos as $photo)
                    <div class="well">
				        {{ $photo->description }} <br>
                    </div>
            	@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
