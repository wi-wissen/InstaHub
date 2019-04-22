@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" v-cloak id="ad-index">
                <flash :timeout="10000" :display-icons="true" transition="fade"></flash>
                <vue-progress-bar></vue-progress-bar>
                <div class="card-header">{{__('Ads')}}</div>
                <div class="card-body">
                    @include('flash::message')

                    <a v-bind:class="{ disabled: !!readonly }" href="/ads/create" style="color:#fff" class="btn btn-success float-right"><img src="/clarity/plus-line.svg" width="24" height="24" alt="Add"></a>
                    
                    <br/>
                    <br/>

                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th class="fit">{{__('Type')}}</th>
                                <th class="fit">{{__('URL')}}</th>
                                <th class="fit">{{__('Actions')}}</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(ad, index) in ads">
                                <td><a v-bind:href="'/ads/' + ad.id">@{{ad.name}}</a></td> 
                                <td class="fit">@{{ad.type}}</td>
                                <td class="fit"><code>@{{ad.url}}</code></td>    
                                <td class="fit">
                                    <a v-bind:class="{ disabled: !!readonly }" class="btn btn-sm btn-secondary" v-bind:href="'/ads/' + ad.id" ><img src="/clarity/pencil-line.svg" width="24" height="24" alt="Edit"></a>
                                    <button :disabled="!!readonly" style="color:#fff" class="btn btn-sm btn-danger" v-on:click.stop="deleteAd(index)"><img src="/clarity/trash-line.svg" width="24" height="24" alt="Delete"></button>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
	var data = {
		ads:{!! $ads !!}.data,
		readonly: {{Session::get('readonly')}},
    }
</script>

@endsection
