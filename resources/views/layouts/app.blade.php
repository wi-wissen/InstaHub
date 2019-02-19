<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>

    
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#ffffff">


    <!-- Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">    
    <link rel="stylesheet" href="/css/homepage.css">
    @yield('css')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                @if (Auth::guest())
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{env('APP_NAME') . " " . Session::get('hub')}}
                </a>
                @else
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{env('APP_NAME') . " " . Session::get('hub')}}
                </a>
                @endif

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                    @if (!Auth::guest() && (Session::get('hub', 'root') != 'root' || Auth::user()->allowed('admin')))
                    <li><a href="{{ url('/user') }}">Members</a></li>
                    @endif
                    @if (!Auth::guest() && Session::get('hub', 'root') == 'root' && Auth::user()->allowed('teacher'))
                    <li><a href="{{ url('/hubs') }}">Hubs</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else

                    @if ((Auth::user()->allowed('dba') && Session::get('hub', 'root') != 'root') || Auth::user()->allowed('admin'))
                    <li><a href="{{ url('/follower') }}">Graph</a></li>
                    @endif
                    @if (Schema::hasTable('ads'))
                    <li><a href="{{ url('/business') }}">Business</a></li>
                    @endif
                    @if ((Auth::user()->allowed('dba') && Session::get('hub', 'root') != 'root') || Auth::user()->allowed('admin'))
                    <li><a href="{{ url('/sql') }}">Database</a></li>
                    @endif
                    @if (!Auth::guest() && Session::get('hub', 'root') == 'root' && Auth::user()->allowed('teacher'))
                    <li><a href="{{ env('DOC_URL') }}">Documentation</a></li>
                    @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="/user/{{ Auth::user()->username }}">Profile</a>
                                </li>
                                @if (Schema::hasTable('photos') && !Session::get('readonly'))
                                <li>
                                    <a href="{{ url('/upload') }}">Upload</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>       
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if (Schema::hasTable('ads') && Session::get('hub', 'root') != 'root')
    <div class="container">
        <div class="row"  style="margin-top: -10px;">
            <div class="col-md-8 col-md-offset-2">
                <div id="adblockerwarning" class="alert alert-warning alert-important" role="alert" style="display:none;text-align:center;">Adblocker detected! Please deactivate your Adblocker!</div>
            </div>
        </div>
    </div>
    @endif

    @if (Session::get('readonly'))
    <div class="container">
        <div class="row"  style="margin-top: -10px;">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-info alert-important" role="alert" style="text-align:center;">Hub is in Maintenance Mode. Read Only.</div>
            </div>
        </div>
    </div>
    @endif

    @yield('content')

    <footer class="footer">
      <div class="container">
         <div class="row">
            <div class="col-md-6 hidden-xs">
                <p class="text-muted">(c) {{env('APP_COPYRIGHT')}}</p>
            </div>
            <div class="col-md-6 text-right">
                <p class="text-muted"><a href="/about">About</a> - <a href="https://wi-wissen.de/contact.php">Contact</a> - <a href="https://wi-wissen.de/agb.html">AGB</a> - <a href="https://wi-wissen.de/datenschutz.html">Privacy</a> - <a href="https://wi-wissen.de/impressum.html">Impress</a></p>
            </div>
        </div>  
       </div>
    </footer>

    <!-- Scripts -->
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/ads.js"></script>
    <script src="/js/app.js"></script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
    @yield('script')
</body>
</html>
