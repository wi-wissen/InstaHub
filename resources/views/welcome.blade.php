<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="min-vh-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>
        @hasSection('title')
            @yield('title') - {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Scripts -->
    @vite([
        'resources/sass/app.scss',
    ])
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const studentBtn = document.getElementById('studentBtn');
            const hubUrlPattern = document.getElementById('hubUrlPattern');

            console.log(studentBtn);

            studentBtn.addEventListener('click', function() {
                hubUrlPattern.classList.toggle('d-none');
            });
        });
    </script>
</head>
    <body class="d-flex flex-column min-vh-100 bg-light">
        <div class="flex-shrink-0">
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

            <div class="container mb-5">

                <section class="jumbotron text-center bg-white my-5">
                    <div class="container">
                        <h1 class="jumbotron-heading font-brand">InstaHub</h1>
                        <p class="fs-5 text-muted">
                            {{ __('messages.instahub') }}
                        </p>
                        <p class="fs-5 text-muted">
                            {!! __('messages.competitions') !!}
                        </p>
                        <p>
                        <a href="{{ config('app.url_admin') }}" target="_blank" class="btn btn-primary my-2">{{ __('Teacher') }}</a>
                        <button id="studentBtn" class="btn btn-primary my-2 mx-2">{{ __('Student') }}</button>
                        <a href="{{ str_replace('{subdomain}', 'public', config('app.url_hub')) }}" target="_blank" class="btn btn-secondary my-2">{{ __('Guest') }}</a>
                        </p>

                        <div id="hubUrlPattern" class="row justify-content-center d-none">
                            <div class="col-md-10">
                                <div class="alert alert-info alert-important" role="alert" style="text-align:center;">{!! __('messages.hubdomain') !!}</div>
                            </div>
                        </div>
                        
                    </div>
                </section>
                <section class="features-icons text-center py-5">
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-layers m-auto text-primary">
                                    <svg width="90px" height="90px" class="users-line d-inline-block align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M17.9 17.3c2.7 0 4.8-2.2 4.8-4.9s-2.2-4.8-4.9-4.8S13 9.8 13 12.4c0 2.7 2.2 4.9 4.9 4.9m-.1-7.7q.15 0 0 0c1.6 0 2.9 1.3 2.9 2.9s-1.3 2.8-2.9 2.8S15 14 15 12.5c0-1.6 1.3-2.9 2.8-2.9" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M32.7 16.7c-1.9-1.7-4.4-2.6-7-2.5h-.8q-.3 1.2-.9 2.1c.6-.1 1.1-.1 1.7-.1c1.9-.1 3.8.5 5.3 1.6V25h2v-8z" class="clr-i-outline clr-i-outline-path-2"/><path fill="currentColor" d="M23.4 7.8c.5-1.2 1.9-1.8 3.2-1.3c1.2.5 1.8 1.9 1.3 3.2c-.4.9-1.3 1.5-2.2 1.5c-.2 0-.5 0-.7-.1c.1.5.1 1 .1 1.4v.6c.2 0 .4.1.6.1c2.5 0 4.5-2 4.5-4.4c0-2.5-2-4.5-4.4-4.5c-1.6 0-3 .8-3.8 2.2c.5.3 1 .7 1.4 1.3" class="clr-i-outline clr-i-outline-path-3"/><path fill="currentColor" d="M12 16.4q-.6-.9-.9-2.1h-.8c-2.6-.1-5.1.8-7 2.4L3 17v8h2v-7.2c1.6-1.1 3.4-1.7 5.3-1.6c.6 0 1.2.1 1.7.2" class="clr-i-outline clr-i-outline-path-4"/><path fill="currentColor" d="M10.3 13.1c.2 0 .4 0 .6-.1v-.6c0-.5 0-1 .1-1.4c-.2.1-.5.1-.7.1c-1.3 0-2.4-1.1-2.4-2.4S9 6.3 10.3 6.3c1 0 1.9.6 2.3 1.5c.4-.5 1-1 1.5-1.4c-1.3-2.1-4-2.8-6.1-1.5s-2.8 4-1.5 6.1c.8 1.3 2.2 2.1 3.8 2.1" class="clr-i-outline clr-i-outline-path-5"/><path fill="currentColor" d="m26.1 22.7l-.2-.3c-2-2.2-4.8-3.5-7.8-3.4c-3-.1-5.9 1.2-7.9 3.4l-.2.3v7.6c0 .9.7 1.7 1.7 1.7h12.8c.9 0 1.7-.8 1.7-1.7v-7.6zm-2 7.3H12v-6.6c1.6-1.6 3.8-2.4 6.1-2.4c2.2-.1 4.4.8 6 2.4z" class="clr-i-outline clr-i-outline-path-6"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                </i>
                            </div>
                            <h3>{{ __('Data Protection') }}</h3>
                            <p class="fs-6 mb-0">{{ __('messages.privacy') }}</p>
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-layers m-auto text-primary">
                                    <svg  width="90px" height="90px" class="storage-line d-inline-block align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M33 6.69c-.18-3.41-9.47-4.33-15-4.33S3 3.29 3 6.78v22.59c0 3.49 9.43 4.43 15 4.43s15-.93 15-4.43zm-2 7.56c-.33.86-5.06 2.45-13 2.45a37.5 37.5 0 0 1-11-1.36v2.08a43.3 43.3 0 0 0 11 1.28c4 0 9.93-.48 13-2v5.17c-.33.86-5.06 2.45-13 2.45a37.5 37.5 0 0 1-11-1.4V25a43.3 43.3 0 0 0 11 1.28c4 0 9.93-.48 13-2v5.1c-.35.86-5.08 2.45-13 2.45S5.3 30.2 5 29.37V6.82c.3-.82 5-2.46 13-2.46c7.77 0 12.46 1.53 13 2.37c-.52.87-5.21 2.39-13 2.39A37.6 37.6 0 0 1 7 7.76v2.09a43.5 43.5 0 0 0 11 1.27c4 0 9.93-.48 13-2Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                </i>
                            </div>
                            <h3>{{ __('Database') }}</h3>
                            <p class="fs-6 mb-0">{{ __('messages.database') }}</p>
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-layers m-auto text-primary">
                                <svg width="90px" height="90px" class="savings-line d-inline-block align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M19.72 10.47a11.65 11.65 0 0 0-6.31.52a.8.8 0 1 0 .59 1.49a10.1 10.1 0 0 1 5.44-.48a.8.8 0 1 0 .28-1.57Z" class="clr-i-outline clr-i-outline-path-1"/><circle cx="25.38" cy="16.71" r="1.36" fill="currentColor" class="clr-i-outline clr-i-outline-path-2"/><path fill="currentColor" d="M35.51 18.63a1 1 0 0 0-.84-.44a3.42 3.42 0 0 1-2.09-1.12a17.4 17.4 0 0 1-2.63-3.78l2.88-4.5A1.89 1.89 0 0 0 33 7a1.77 1.77 0 0 0-1.33-1a10.1 10.1 0 0 0-5.39.75a12.7 12.7 0 0 0-2.72 1.63a17 17 0 0 0-5.16-1.39C11.31 6.3 4.83 10.9 4 17a2.56 2.56 0 0 1-1.38-1.53a1.8 1.8 0 0 1 .14-1.4a1.2 1.2 0 0 1 .43-.43a1.08 1.08 0 0 0-1.12-1.85A3.3 3.3 0 0 0 .91 13a4 4 0 0 0-.33 3.08A4.76 4.76 0 0 0 3 18.95l.92.46a17.6 17.6 0 0 0 1.82 7l.17.38a23 23 0 0 0 3.29 5.09a1 1 0 0 0 .75.34h4.52a1 1 0 0 0 .92-1.38l-.39-.9l1.18.13a20.3 20.3 0 0 0 4 0c.37.6.77 1.2 1.21 1.79a1 1 0 0 0 .8.41h4.34a1 1 0 0 0 .92-1.39c-.17-.4-.34-.83-.47-1.2c-.18-.53-.32-1-.43-1.45A13.2 13.2 0 0 0 29.56 26a12.5 12.5 0 0 0 3 0a1 1 0 0 0 .78-.62l2.26-5.81a1 1 0 0 0-.09-.94m-3.78 5.44a11.4 11.4 0 0 1-2.35-.11a8.2 8.2 0 0 1-2.53-.87a1 1 0 0 0-.93 1.77a12 12 0 0 0 1.29.58a8 8 0 0 1-1.8 1.16l-1.06.48s.49 2.19.82 3.16h-2.38c-.24-.34-1.45-2.36-1.45-2.36l-.67.09a18.5 18.5 0 0 1-4.25.12c-.66-.06-1.76-.2-2.62-.35l-1.55-.27s.63 2.43.75 2.74h-2.58A20.6 20.6 0 0 1 7.76 26l-.18-.39A14.6 14.6 0 0 1 6 17.48c.54-5.19 6.12-9.11 12.19-8.54a15.5 15.5 0 0 1 5.08 1.48l.62.29l.5-.47A10.3 10.3 0 0 1 27 8.54a8.25 8.25 0 0 1 4-.65l-3.38 5.29l.25.5a21.2 21.2 0 0 0 3.31 4.84a6.5 6.5 0 0 0 2.14 1.39Z" class="clr-i-outline clr-i-outline-path-3"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                            </i>
                            </div>
                            <h3>{{ __('Open') }}</h3>
                            <p class="fs-6 mb-0">{{ __('messages.openfree') }}</p>
                        </div>
                        </div>
                    </div>
                    </div>
                </section>
            </div>
        </div>

        <footer class="footer mt-auto py-3">
            <div class="container text-center">
                <span class="text-muted">
                    <a href="{{config('app.url')}}/about" class="text-muted text-decoration-none">{{__('About')}}</a> -
                    <a href="https://wi-wissen.de/contact.php" class="text-muted text-decoration-none">{{__('Contact')}}</a> -
                    <a href="https://wi-wissen.de/contact.php" class="text-muted text-decoration-none">{{__('Report')}}</a> -
                    <a href="https://wi-wissen.de/agb.html" class="text-muted text-decoration-none">{{__('Terms of Use')}}</a> -
                    <a href="https://wi-wissen.de/datenschutz.html" class="text-muted text-decoration-none">{{__('Privacy')}}</a> -
                    <a href="https://wi-wissen.de/impressum.html" class="text-muted text-decoration-none">{{__('Legal Notice')}}</a>
                </span>
            </div>
        </footer>
    </body>
</html>
