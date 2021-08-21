@extends('layouts.base')

@section('website')
    @include('layouts.nav')

    @if (RequestHub::hasTable('ads') && RequestHub::isHub())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="adblockerwarning" class="alert alert-warning alert-important" role="alert" style="display:none;text-align:center;">{{ __('messages.adblocker') }}</div>
            </div>
        </div>
    </div>
    @endif

    @yield('content')

    @include('layouts.footer')
@endsection