@extends('layouts.base')

@section('content')
<nav class="navbar navbar-expand-md navbar-light sticky-top border-bottom">
    <div class="container">
        <a class="d-flex navbar-brand font-brand" href="{{ url('/') }}">
            <svg class="camera-line align-self-center me-2" width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M32 8h-7.3l-1.06-2.72A2 2 0 0 0 21.78 4h-7.56a2 2 0 0 0-1.87 1.28L11.3 8H4a2 2 0 0 0-2 2v20a2 2 0 0 0 2 2h28a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2m0 22H4V10h8.67l1.55-4h7.56l1.55 4H32Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M9 19a9 9 0 1 0 9-9a9 9 0 0 0-9 9m16.4 0a7.4 7.4 0 1 1-7.4-7.4a7.41 7.41 0 0 1 7.4 7.4" class="clr-i-outline clr-i-outline-path-2"/><path fill="currentColor" d="M9.37 12.83a.8.8 0 0 0-.8-.8h-2.4a.8.8 0 0 0 0 1.6h2.4a.8.8 0 0 0 .8-.8" class="clr-i-outline clr-i-outline-path-3"/><path fill="currentColor" d="M12.34 19a5.57 5.57 0 0 0 3.24 5l.85-1.37a4 4 0 1 1 4.11-6.61l.86-1.38A5.56 5.56 0 0 0 12.34 19" class="clr-i-outline clr-i-outline-path-4"/><path fill="none" d="M0 0h36v36H0z"/></svg>
            {{ config('app.name') }}
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
            <ul class="navbar-nav w-100 justify-content-center">
                <!-- empty -->
            </ul>
            <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="{{ route('documentation.redirect', ['generation' => config('hub.default_generation')]) }}">{{ __('Documentation') }}</a>
                </li>
                <a href="{{ config('app.url_admin') }}/hubs/create" target="_blank" class="btn btn-success ml-2">{{ __('Create Hub') }}</a>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    @include('flash::message')
    <div class="row justify-content-center">
        <div class="col-10">           
            <h2 class="font-brand">InstaHub</h2>
            <p>{!! __('messages.aboutInstaHub') !!}</p>
            <p>{{ __('messages.targetInstaHub') }}</p>
            <p>{{ __('Read more (only in German)') }}: <a href='https://blog.wi-wissen.de/tag/instahub' target='_blank' >blog.wi-wissen.de/tag/instahub</a></p>
            
            <h3>{{ __('Development') }}</h3>
            <p>{{ __('InstaHub is develped by') }} <a href="https://wi-wissen.de/">WIssen</a></p>
            
                <h3>{{ __('Supporter') }}</h3>
            <p>
                {{ __('InstaHub is supported by') }} <a href="https://www.mitmachfonds-sachsen.de/">Sächsische Mitmach-Fonds</a>, 
                <a href="https://schulki.de/">schulKI</a> und
                <a href="https://fg-bil.gi.de/">Gesellschaft für Informatik - Fachgruppe Bayerische Informatiklehrkräfte (BIL)</a>
            </p>

            <h3>{{ __('Standing on the shoulders of giants') }}</h3>
            <p>{{ __('Many thanks and respect to') }}:</p>
            <ul>
                <li><a href="https://mariadb.org/" target="_blank">mariaDB</a></li>
                <li><a href="http://php.net/" target="_blank">php</a></li>
                <li><a href="https://laravel.com/" target="_blank">Laravel</a>
                    <ul>
                    <li><a href="https://github.com/hisorange/browser-detect" target="_blank">hisorange/browser-detect</a></li>
                    <li><a href="https://github.com/laracasts/flash" target="_blank">laracasts/flash</a></li>
                    <li><a href="https://github.com/livewire/livewire" target="_blank">livewire/livewire</a></li>
                    <li><a href="https://github.com/orangehill/iseed" target="_blank">orangehill/iseed</a></li>
                    </ul>
                </li>
                <li><a href="https://getbootstrap.com/" target="_blank">Bootstrap</a></li>
                <li><a href="https://fontsource.org/fonts/grand-hotel" target="_blank">Grand Hotel Font</a></li>
                <li><a href="https://github.com/vmware-archive/clarity" target="_blank">Clarity Icons</a></li>
                <li>Photos by <a href="https://pixabay.com/" target="_blank">pixabay</a> (CC0)</li>
                <li>Face images by <a href="https://unsplash.com/" target="_blank">unsplash.com</a> (CC0)</li>
                <li>Fake Ad images based on <a href="https://unsplash.com/" target="_blank">unsplash.com</a> (CC0)</li>
            </ul>

            <h3>{{ __('Contributing') }}</h3>
            <p>{!! __('messages.contributing') !!}</p>

            <h3>{{ __('Contributers') }}</h3>
            <p>{!! __('messages.contributers') !!}</p>

            <h3>{{ __('License') }}</h3>
            <p><a href='https://www.mozilla.org/en-US/MPL/2.0/'>Mozilla Public License (MPL)</a></p>
        </div>
    </div>
</div>
@endsection
