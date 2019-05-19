@extends('layouts.app')

@section('content')
<div class="container" id="sql-select">
    <div class="row justify-content-center">
        <div class="col">
            @include('flash::message') 
            <div class="row">
                <div class="col-md-12">
                    <h1>{{__('Search')}}</h1>
                    <div class="card">
                        <div class="card-body">

                            <sql-select-gui v-model="query"></sql-select-gui>

                            <button :disabled="!query" v-on:click="getResult()" class="btn btn-primary btn-block">{{ __('Run') }}</button>

                            <div v-if="message.text" role="alert" v-bind:class="'alert alert-' + message.type + ' alert-important'" style="margin-top: 1rem;">
                                <button v-on:click.stop.prevent="removeResult()" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                @{{ message.text }}
                            </div>

                            <div v-if="table" style="overflow: auto;" v-html="table">
                            </div>

                            </div>
                        </div>
                    </div>
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