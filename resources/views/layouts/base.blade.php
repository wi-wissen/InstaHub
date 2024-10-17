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
        'resources/js/app.js'
    ])
    @yield('script')
    @yield('style')
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="flex-shrink-0">
        @yield('content')
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