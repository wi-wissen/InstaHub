@extends('layouts.app')

@section('css')
<style>
	.card {
		margin-bottom: 2em;
	}
</style>
@endsection

@section('content')
<div class="container" v-cloak id="dba-admin">
	@include('flash::message')
	<vue-progress-bar></vue-progress-bar>
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card">
			<div class="card-header">
				{{$hub->name}}
				<a href="#" v-on:click.stop.prevent="getStatus()" class="float-right text-muted"><img src="/clarity/refresh-line.svg" width="16" height="16" alt="Refresh"></a>
			</div>
				<div class="card-body">
					<button v-on:click.stop.prevent="resetPw()" class="float-right btn btn-outline-dark">Reset Admin-Passwort</button>
					<div v-html="state"></div>
					<br />
					<b>Admin-Passwort</b>: <code>@{{pw}}</code>
				</div>		
			</div>	
			
			<div class="card">
				<div class="card-header"> 
					Tables
				</div>
				<div class="card-body">
					
					<div class="row" style="padding-bottom:10px;">
						<div class="col-md-4"><sql-button type="btn-success btn-block" hub="{{$hub->name}}" tables="comments" action="create">(Re)Create Comments</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-primary btn-block" hub="{{$hub->name}}" tables="comments" action="fill">(Re)Fill Comments</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-danger btn-block" hub="{{$hub->name}}" tables="comments" action="drop">Drop Comments</sql-button></div>
					</div>

					<div class="row" style="padding-bottom:10px;">
						<div class="col-md-4"><sql-button type="btn-success btn-block" hub="{{$hub->name}}" tables="follows" action="create">(Re)Create Comments</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-primary btn-block" hub="{{$hub->name}}" tables="follows" action="fill">(Re)Fill Comments</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-danger btn-block" hub="{{$hub->name}}" tables="follows" action="drop">Drop Comments</sql-button></div>
					</div>

					<div class="row" style="padding-bottom:10px;">
						<div class="col-md-4"><sql-button type="btn-success btn-block" hub="{{$hub->name}}" tables="comments" action="create">(Re)Create Follows</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-primary btn-block" hub="{{$hub->name}}" tables="comments" action="fill">(Re)Fill Follows</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-danger btn-block" hub="{{$hub->name}}" tables="comments" action="drop">Drop Follows</sql-button></div>
					</div>

					<div class="row" style="padding-bottom:10px;">
						<div class="col-md-4"><sql-button type="btn-success btn-block" hub="{{$hub->name}}" tables="likes" action="create">(Re)Create Likes</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-primary btn-block" hub="{{$hub->name}}" tables="likes" action="fill">(Re)Fill Likes</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-danger btn-block" hub="{{$hub->name}}" tables="likes" action="drop">Drop Likes</sql-button></div>
					</div>

					<div class="row" style="padding-bottom:10px;">
						<div class="col-md-4"><sql-button type="btn-success btn-block" hub="{{$hub->name}}" tables="tags" action="create">(Re)Create Tags</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-primary btn-block" hub="{{$hub->name}}" tables="tags" action="fill">(Re)Fill Tags</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-danger btn-block" hub="{{$hub->name}}" tables="tags" action="drop">Drop Tags</sql-button></div>
					</div>

					<div class="row" style="padding-bottom:10px;">
						<div class="col-md-4"><sql-button type="btn-success btn-block" hub="{{$hub->name}}" tables="ads" action="create">(Re)Create Ads</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-primary btn-block" hub="{{$hub->name}}" tables="ads" action="fill">(Re)Fill Ads</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-danger btn-block" hub="{{$hub->name}}" tables="ads" action="drop">Drop Ads</sql-button></div>
					</div>

					<div class="row" style="padding-bottom:10px;">
						<div class="col-md-4"><sql-button type="btn-success btn-block" hub="{{$hub->name}}" tables="analytics" action="create">(Re)Create Analytics</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-primary btn-block" hub="{{$hub->name}}" tables="analytics" action="fill">(Re)Fill Analytics</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-danger btn-block" hub="{{$hub->name}}" tables="analytics" action="drop">Drop Analytics</sql-button></div>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					Table Photos
				</div>
				<div class="card-body">
				<div class="alert alert-warning  alert-important" role="alert">This table is neccesary for all tables above!</div>
					<div class="row">
						<div class="col-md-4"><sql-button type="btn-success btn-block" hub="{{$hub->name}}" tables="photos" action="create">(Re)Create Photos</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-primary btn-block" hub="{{$hub->name}}" tables="photos" action="fill">(Re)Fill Photos</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-danger btn-block" hub="{{$hub->name}}" tables="photos" action="drop">Drop Photos</sql-button></div>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					Table Users
				</div>
				<div class="card-body">
				<div class="alert alert-warning  alert-important" role="alert">This table is neccesary for all tables above!</div>
					<div class="row">
						<div class="col-md-4"><sql-button type="btn-success btn-block" hub="{{$hub->name}}" tables="users" action="create">(Re)Create Users</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-primary btn-block" hub="{{$hub->name}}" tables="users" action="fill">(Re)Fill Users</sql-button></div>
						<div class="col-md-4"><sql-button type="btn-danger btn-block" hub="{{$hub->name}}" tables="users" action="drop">Drop Users</sql-button></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
	var hub = {{$hub->id}}
</script>
@endsection