@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            @include('flash::message')
            <div class="row">
                <div class="col-md-12">
                    @livewire('admin.sql')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection