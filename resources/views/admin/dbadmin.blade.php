@extends('layouts.app')

@section('content')
<div class="container">
	@include('flash::message')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="pull-right"><a href="/hubs/{{$hub->id}}/dba/resetpw" type="button" class="btn btn-default btn-block">Reset Admin-Password</a></div>
			<h1 >Hub: {{$hub->name}}</h3>
			<div class="panel panel-default">
				<div class="panel-body">
					{!! $state !!}
				</div>
			</div>	
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Tables</h3>
				</div>
				<div class="panel-body">
					<div class="row" style="padding-bottom:10px;">
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/create/comments" type="button" class="btn btn-success btn-block">(Re)Create Comments</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/fill/comments" type="button" class="btn btn-primary btn-block">(Re)Fill Comments</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/drop/comments" type="button" class="btn btn-danger btn-block">Drop Comments</a></div>
					</div>
					<div class="row" style="padding-bottom:10px;">
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/create/follows" type="button" class="btn btn-success btn-block">(Re)Create Follows</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/fill/follows" type="button" class="btn btn-primary btn-block">(Re)Fill Follows</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/drop/follows" type="button" class="btn btn-danger btn-block">Drop Follows</a></div>
					</div>
					<div class="row" style="padding-bottom:10px;">
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/create/likes" type="button" class="btn btn-success btn-block">(Re)Create Likes</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/fill/likes" type="button" class="btn btn-primary btn-block">(Re)Fill Likes</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/drop/likes" type="button" class="btn btn-danger btn-block">Drop Likes</a></div>
					</div>
					<div class="row" style="padding-bottom:10px;">
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/create/tags" type="button" class="btn btn-success btn-block">(Re)Create Tags</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/fill/tags" type="button" class="btn btn-primary btn-block">(Re)Fill Tags</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/drop/tags" type="button" class="btn btn-danger btn-block">Drop Tags</a></div>
					</div>
					<div class="row" style="padding-bottom:10px;">
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/create/ads" type="button" class="btn btn-success btn-block">(Re)Create Ads</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/fill/ads" type="button" class="btn btn-primary btn-block">(Re)Fill Ads</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/drop/ads" type="button" class="btn btn-danger btn-block">Drop Ads</a></div>
					</div>
					<div class="row">
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/create/analytics" type="button" class="btn btn-success btn-block">(Re)Create Analytics</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/fill/analytics" type="button" class="btn btn-primary btn-block">(Re)Fill Analytics</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/drop/analytics" type="button" class="btn btn-danger btn-block">Drop Analytics</a></div>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Table Photos</h3>
				</div>
				<div class="panel-body">
				<div class="alert alert-warning  alert-important" role="alert">This table is neccesary for all tables above!</div>
					<div class="row">
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/create/photos" type="button" class="btn btn-success btn-block">(Re)Create Photos</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/fill/photos" type="button" class="btn btn-primary btn-block">(Re)Fill Photos</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/drop/photos" type="button" class="btn btn-danger btn-block">Drop Photos</a></div>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Table Users</h3>
				</div>
				<div class="panel-body">
				<div class="alert alert-warning  alert-important" role="alert">This table is neccesary for all tables above!</div>
					<div class="row">
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/create/users" type="button" class="btn btn-success btn-block">(Re)Create Users</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/fill/users" type="button" class="btn btn-primary btn-block">(Re)Fill Users</a></div>
						<div class="col-md-4"><a href="/hubs/{{$hub->id}}/dba/table/drop/users" type="button" class="btn btn-danger btn-block">Drop Users</a></div>
					</div>
				</div>
			</div>

    </div>
	</div>
</div>
@endsection