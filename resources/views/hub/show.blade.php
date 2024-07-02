@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $hub->name }}</h1>
        @livewire('hub.show', ['hub' => $hub])
    </div>
@endsection