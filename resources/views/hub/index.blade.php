@extends('layouts.app')

@section('content')
    <div class="container">

        @if(! RequestHub::hasTokens()) 
            <div class="alert alert-warning alert-important" role="alert">
                {{ __('messages.noTokens') }}
            </div>
        @endif

        <h1>{{ __('Hubs') }}</h1>

        <div class="mb-3">
            @livewire('user-hub-settings')
        </div>

        <hr>
        
        @livewire('hub.index')
    </div>
@endsection

@push('styles')
<style>
    .table {
        background-color: white;
    }
   
    .spinner-border {
        width: 1rem;
        height: 1rem;
    }
</style>
@endpush