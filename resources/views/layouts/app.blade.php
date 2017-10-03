<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
    <link rel="stylesheet" href="/css/homepage.css">
    @yield('css')
    <!-- Will refactor while working on frontend -->
    <style>

        @import 'https://fonts.googleapis.com/css?family=Satisfy';
        .navbar-brand {
            font-family: 'Satisfy', cursive;
            font-size: 30px;
        }

    </style>

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
                    <li><a href="{{ url('/user') }}">Member</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                    @if (Auth::user()->allowed('teacher') && Session::get('hub', 'root') != 'root')
                    <li><a href="{{ url('/dba/admin') }}">DB Admin</a></li>
                    @endif
                    @if (Auth::user()->allowed('dba') && Session::get('hub', 'root') != 'root')
                    <li><a href="{{ url('/sql') }}">Database</a></li>
                    @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="/user/{{ Auth::user()->username }}">Profile</a>
                                </li>
                                @if (Schema::hasTable('photos') && Session::get('hub', 'root') != 'root')
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

    @yield('content')

    <footer class="footer">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
                <p class="text-muted">(c) {{env('APP_COPYRIGHT')}}</p>
            </div>
            <div class="col-md-6 text-right">
                <p class="text-muted"><a href="/about">About</a> - <a href="https://wi-wissen.de/contact.php">Contact</a> - <a href="https://wi-wissen.de/impress.html">Impress</a></p>
            </div>
        </div>  
       </div>
    </footer>

    <!-- Scripts -->
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
    @yield('script')
</body>
</html>
