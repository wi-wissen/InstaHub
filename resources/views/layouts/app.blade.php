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
    <div id="app" class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-md navbar-light sticky-top border-bottom">
            <div class="container">
                <a class="d-flex navbar-brand font-brand" href="{{ url('/') }}">
                    <svg class="camera-line align-self-center me-2" width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M32 8h-7.3l-1.06-2.72A2 2 0 0 0 21.78 4h-7.56a2 2 0 0 0-1.87 1.28L11.3 8H4a2 2 0 0 0-2 2v20a2 2 0 0 0 2 2h28a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2m0 22H4V10h8.67l1.55-4h7.56l1.55 4H32Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M9 19a9 9 0 1 0 9-9a9 9 0 0 0-9 9m16.4 0a7.4 7.4 0 1 1-7.4-7.4a7.41 7.41 0 0 1 7.4 7.4" class="clr-i-outline clr-i-outline-path-2"/><path fill="currentColor" d="M9.37 12.83a.8.8 0 0 0-.8-.8h-2.4a.8.8 0 0 0 0 1.6h2.4a.8.8 0 0 0 .8-.8" class="clr-i-outline clr-i-outline-path-3"/><path fill="currentColor" d="M12.34 19a5.57 5.57 0 0 0 3.24 5l.85-1.37a4 4 0 1 1 4.11-6.61l.86-1.38A5.56 5.56 0 0 0 12.34 19" class="clr-i-outline clr-i-outline-path-4"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                    {{ RequestHub::name() ?? config('app.name') }}
                    @if (RequestHub::isHub() && RequestHub::isReadOnly())
                        <svg width="30" height="30" class="align-self-center ms-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M18.09 20.59A2.41 2.41 0 0 0 17 25.14V28h2v-2.77a2.41 2.41 0 0 0-.91-4.64" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M26 15v-4.28a8.2 8.2 0 0 0-8-8.36a8.2 8.2 0 0 0-8 8.36V15H7v17a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V15Zm-14-4.28a6.2 6.2 0 0 1 6-6.36a6.2 6.2 0 0 1 6 6.36V15H12ZM9 32V17h18v15Z" class="clr-i-outline clr-i-outline-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Center Of Navbar -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <livewire:user-search />
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if (RequestHub::hasTable('ads') && Auth::user()->allowed('dba') && RequestHub::isHub())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarBusinessDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="store-line store-line d-inline-block align-middle" width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M28 30H16v-8h-2v8H8v-8H6v8a2 2 0 0 0 2 2h20a2 2 0 0 0 2-2v-8h-2Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="m33.79 13.27l-4.08-8.16A2 2 0 0 0 27.92 4H8.08a2 2 0 0 0-1.79 1.11l-4.08 8.16a2 2 0 0 0-.21.9v3.08a2 2 0 0 0 .46 1.28A4.67 4.67 0 0 0 6 20.13a4.72 4.72 0 0 0 3-1.07a4.73 4.73 0 0 0 6 0a4.73 4.73 0 0 0 6 0a4.73 4.73 0 0 0 6 0a4.72 4.72 0 0 0 6.53-.52a2 2 0 0 0 .47-1.28v-3.09a2 2 0 0 0-.21-.9M30 18.13A2.68 2.68 0 0 1 27.82 17L27 15.88L26.19 17a2.71 2.71 0 0 1-4.37 0L21 15.88L20.19 17a2.71 2.71 0 0 1-4.37 0L15 15.88L14.19 17a2.71 2.71 0 0 1-4.37 0L9 15.88L8.18 17A2.68 2.68 0 0 1 6 18.13a2.64 2.64 0 0 1-2-.88v-3.08L8.08 6h19.84L32 14.16v3.06a2.67 2.67 0 0 1-2 .91" class="clr-i-outline clr-i-outline-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                    <span class="d-inline d-md-none">{{ __('Business') }}</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarBusinessDropdown">
                                    <li><a class="dropdown-item" href="{{ url('/business') }}">{{ __('Overview') }}</a></li>
                                    <li><a class="dropdown-item" href="/ads">{{ __('Campaigns') }}</a></li>
                                </ul>
                            </li>
                            @endif

                            @if (RequestHub::isHub() || (!Auth::guest() && Auth::user()->allowed('admin')))
                                @if (RequestHub::hasTable('follows'))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarExploreDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg width="30" height="30" class="compass-line d-inline-block align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M20.82 15.31L10.46 9c-.46-.26-1.11.37-.86.84l6.15 10.56l10.56 6.15a.66.66 0 0 0 .84-.86Zm-4 4l3-3l4.55 7.44Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M18 2a16 16 0 1 0 16 16A16 16 0 0 0 18 2m1 29.95v-2.42h-2v2.42A14 14 0 0 1 4.05 19h2.42v-2H4.05A14 14 0 0 1 17 4.05v2.42h2V4.05A14 14 0 0 1 31.95 17h-2.42v2h2.42A14 14 0 0 1 19 31.95" class="clr-i-outline clr-i-outline-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                        <span class="d-inline d-md-none">{{ __('Explore') }}</span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarExploreDropdown">
                                        <li><a class="dropdown-item" href="{{ url('/explore/users') }}">{{ __('All') }}</a></li>
                                        <li><a class="dropdown-item" href="/explore/users/suggested">{{ __('Suggested') }}</a></li>
                                    </ul>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/explore/users') }}">
                                        <svg width="30" height="30" class="compass-line d-inline-block align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M20.82 15.31L10.46 9c-.46-.26-1.11.37-.86.84l6.15 10.56l10.56 6.15a.66.66 0 0 0 .84-.86Zm-4 4l3-3l4.55 7.44Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M18 2a16 16 0 1 0 16 16A16 16 0 0 0 18 2m1 29.95v-2.42h-2v2.42A14 14 0 0 1 4.05 19h2.42v-2H4.05A14 14 0 0 1 17 4.05v2.42h2V4.05A14 14 0 0 1 31.95 17h-2.42v2h2.42A14 14 0 0 1 19 31.95" class="clr-i-outline clr-i-outline-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                        <span class="d-inline d-md-none">{{ __('Explore') }}</span>
                                    </a>
                                </li>
                                @endif
                            @endif

                            @if ((Auth::user()->allowed('dba') && RequestHub::isHub()) || Auth::user()->allowed('admin'))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDatabaseDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg width="30" height="30" class="storage-line d-inline-block align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M33 6.69c-.18-3.41-9.47-4.33-15-4.33S3 3.29 3 6.78v22.59c0 3.49 9.43 4.43 15 4.43s15-.93 15-4.43zm-2 7.56c-.33.86-5.06 2.45-13 2.45a37.5 37.5 0 0 1-11-1.36v2.08a43.3 43.3 0 0 0 11 1.28c4 0 9.93-.48 13-2v5.17c-.33.86-5.06 2.45-13 2.45a37.5 37.5 0 0 1-11-1.4V25a43.3 43.3 0 0 0 11 1.28c4 0 9.93-.48 13-2v5.1c-.35.86-5.08 2.45-13 2.45S5.3 30.2 5 29.37V6.82c.3-.82 5-2.46 13-2.46c7.77 0 12.46 1.53 13 2.37c-.52.87-5.21 2.39-13 2.39A37.6 37.6 0 0 1 7 7.76v2.09a43.5 43.5 0 0 0 11 1.27c4 0 9.93-.48 13-2Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                    <span class="d-inline d-md-none">{{ __('Database') }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDatabaseDropdown">
                                    @if (RequestHub::query_level() == 'ai')
                                        <li><a class="dropdown-item" href="{{ url('/sql/ai') }}">{{ __('Ask') }}</a></li>
                                    @endif
                                    @if (RequestHub::query_level() == 'ai' || RequestHub::query_level() == 'gui')
                                        <li><a class="dropdown-item" href="{{ url('/sql/select') }}">{{ __('Search') }}</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ url('/sql') }}">SQL</a></li>
                                </ul>
                            </li>
                            @endif

                            @if (!Auth::guest() && ! RequestHub::isHub() && Auth::user()->allowed('teacher'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('documentation.redirect', ['generation' => Auth::user()->hub_default_generation]) }}">
                                    <svg width="30" height="30" class="help-line d-inline-block align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M18 2a16 16 0 1 0 16 16A16 16 0 0 0 18 2m0 30a14 14 0 1 1 14-14a14 14 0 0 1-14 14" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M18.29 8.92a7.38 7.38 0 0 0-5.72 2.57a1 1 0 0 0-.32.71a.92.92 0 0 0 .95.92a1.08 1.08 0 0 0 .71-.29a5.7 5.7 0 0 1 4.33-2c2.36 0 3.83 1.52 3.83 3.41v.05c0 2.21-1.76 3.44-4.54 3.65a.8.8 0 0 0-.76.92s0 2.32 0 2.75a1 1 0 0 0 1 .9h.11a1 1 0 0 0 .9-1v-2.06c3-.42 5.43-2 5.43-5.28v-.05c-.03-3-2.37-5.2-5.92-5.2" class="clr-i-outline clr-i-outline-path-2"/><circle cx="17.78" cy="26.2" r="1.25" fill="currentColor" class="clr-i-outline clr-i-outline-path-3"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                    <span class="d-inline d-md-none">{{ __('Help') }}</span>
                                </a>
                            </li>
                            @endif
                        @endif

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <svg width="30" height="30" class="user-line d-inline-block align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M18 17a7 7 0 1 0-7-7a7 7 0 0 0 7 7m0-12a5 5 0 1 1-5 5a5 5 0 0 1 5-5" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M30.47 24.37a17.16 17.16 0 0 0-24.93 0A2 2 0 0 0 5 25.74V31a2 2 0 0 0 2 2h22a2 2 0 0 0 2-2v-5.26a2 2 0 0 0-.53-1.37M29 31H7v-5.27a15.17 15.17 0 0 1 22 0Z" class="clr-i-outline clr-i-outline-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                    <span class="d-inline d-sm-none">{{ Auth::user()->name }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/{{ Auth::user()->username }}">{{ Auth::user()->name }}</a>

                                    @if (RequestHub::hasTable('photos') && !RequestHub::isReadOnly())
                                        <a class="dropdown-item" href="{{ url('/upload') }}">{{ __('Upload') }}</a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
