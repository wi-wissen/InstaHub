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
                            @livewire('admin.sql-builder')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection