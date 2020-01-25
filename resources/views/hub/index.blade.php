@extends('layouts.app')

@section('css')
<style>
	.table {
		background-color: white;
    }
    
    .spinner-border {
        width: 1rem;
        height: 1rem;
    }
</style>
@endsection

@section('content')
    <div class="container" v-cloak id="hub-index">
        @include('flash::message')
        <vue-progress-bar></vue-progress-bar>
        <div class="row  justify-content-center">
            <div class="col-md-12">

                <div class="row mb-2">
                    <div class="col-sm">
                        <label class="sr-only" id="searchDesc" for="search">{{ __('Search') }}</label>
                        <input v-on:input="searchHubs" v-model="search" type="text" class="form-control" id="search" placeholder="{{ __('Search Hub') }}">
                    </div>
                    <div class="col-sm"></div>
                    <div class="col-sm">
                        <a href="/hubs/create" type="button" class="btn btn-success float-right">{{ __('Create Hub') }}</a>
                    </div>
                </div>

                <table v-if="hubs.length" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>{{ __('Hub') }}</td>
                            <td>{{ __('Admin') }}</td>
                            <td>{{ __('Created at') }}</td>
                            <td>{{ __('Action') }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(hub, index) in hubs">
                            <td>
                                <a v-bind:href="'https://' + hub.name + session_domain">@{{hub.name}}</a>
                            </td>
                            <td>
                                @{{hub.admin}}
                            </td>
                            <td>
                                @{{new Date(hub.created_at).toLocaleDateString()}}
                            </td>
                            <td>
                                <hub-buttons v-bind:hub="hub" style="display: inline-block;"></hub-buttons>
                                <button v-on:click="deleteHub(index)" class="btn btn-danger"><div v-if="deleteLoading[index]" class="spinner-border" role="status"><span class="sr-only">{{ __('Loading') }}...</span></div>{{ __('Delete') }}</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div v-else-if="search.length" class="alert alert-primary alert-important" role="alert">
                    {{ __('messages.noHubsFound') }}
                </div>

                <div v-else class="alert alert-primary alert-important" role="alert">
                {{ __('messages.noHubs') }}
                </div>

                <pagination-links v-if="pagination.last_page > 1" :pagination="pagination" :offset="10" @paginate="fetchHubs()"></pagination-links>

            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    var session_domain = "{{env('SESSION_DOMAIN')}}";
</script>
@endsection