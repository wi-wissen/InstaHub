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
            @verbatim
                <table v-if="hubs.length" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Hub</td>
                            <td>Admin</td>
                            <td>Created at</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(hub, index) in hubs">
                            <td>
                                <a v-bind:href="'https://' + hub.name + session_domain">{{hub.name}}</a>
                            </td>
                            <td>
                                {{hub.admin}}
                            </td>
                            <td>
                                {{new Date(hub.created_at).toLocaleDateString()}}
                            </td>
                            <td>
                                <hub-buttons v-bind:hub="hub" style="display: inline-block;"></hub-buttons>
                                <button v-on:click="deleteHub()" class="btn btn-danger"><div v-if="deleteLoading[index]" class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div v-else class="alert alert-primary alert-important" role="alert">
                    There are no Hubs. You may create one if you use an other browser or log out.
                </div>

                <pagination-links v-if="pagination.last_page > 1" :pagination="pagination" :offset="10" @paginate="fetchHubs()"></pagination-links>
            @endverbatim
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    var session_domain = "{{env('SESSION_DOMAIN')}}";
</script>
@endsection