@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @livewire('photo.show', ['photo' => $photo, 'ad' => $ad])
        </div>
    </div>
</div>
@endsection