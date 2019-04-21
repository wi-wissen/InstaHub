@extends('layouts.base')

@section('website')
    @include('layouts.nav')

    @if (Schema::hasTable('ads') && Session::get('hub', 'root') != 'root')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="adblockerwarning" class="alert alert-warning alert-important" role="alert" style="display:none;text-align:center;">Adblocker detected! Please deactivate your Adblocker!</div>
            </div>
        </div>
    </div>
    @endif

    @if (Session::get('readonly'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-info alert-important" role="alert" style="text-align:center;">Hub is in Maintenance Mode. Read Only.</div>
            </div>
        </div>
    </div>
    @endif

    @yield('content')

    @include('layouts.footer')
@endsection