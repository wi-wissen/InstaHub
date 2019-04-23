<!-- https://stackoverflow.com/questions/33867603/center-an-element-in-bootstrap-4-navbar -->
<nav class="navbar navbar-expand-sm navbar-light bg-light main-nav sticky-top" style="background-color: #fff;" id="nav">
    <div class="container justify-content-center">
        <!-- Left Side Of Navbar -->
        <div class="nav navbar-nav flex-fill w-md-100 flex-nowrap">
            <!-- Branding Image -->
            
            @if (Auth::guest())
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/clarity/camera-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">
                @if(Session::get('hub', 'root') != 'root')
                    <div>{{Session::get('hub')}}</div>
                @else
                    <div>{{ env('APP_NAME') }}</div>
                @endif
            </a>
            @else
            <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="/clarity/camera-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">
                @if(Session::get('hub', 'root') != 'root')
                    <div>{{Session::get('hub')}}</div>
                @else
                    <div>{{ env('APP_NAME') }}</div>
                @endif
            </a>
            @endif
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if ((!Auth::guest() && Session::get('hub', 'root') != 'root') || (!Auth::guest() && Auth::user()->allowed('dba')))
        <div class="nav navbar-nav flex-fill justify-content-center d-none d-sm-block">
            <search-box style="width:200px;"/>  
        </div>
        @endif
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav flex-fill w-100 justify-content-end collapse navbar-collapse"  id="navbarSupportedContent">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
            @else
                @if (Session::get('hub', 'root') != 'root' || (!Auth::guest() && Auth::user()->allowed('dba')))
                <li class="d-inline d-sm-none" class="nav-item">
                    <search-box style="width:200px;"/>  
                </li>
                @endif
            
                @if (Schema::hasTable('ads') && Auth::user()->allowed('dba') && Session::get('hub', 'root') != 'root')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarBusinessDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/clarity/store-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">&nbsp<span class="d-inline d-sm-none">Busines</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarBusinessDropdown">
                        <a class="dropdown-item" href="{{ url('/business') }}">Overview</a>
                        <a class="dropdown-item" href="/ads">Campains</a>
                    </div>
                </li>
                @endif
                <li class="nav-item"><a class="nav-link"href="{{ url('/user') }}"><img src="/clarity/compass-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">&nbsp<span class="d-inline d-sm-none">Explore</span></a></li>    
                @if ((Auth::user()->allowed('dba') && Session::get('hub', 'root') != 'root') || Auth::user()->allowed('admin'))
                <li class="nav-item"><a class="nav-link"href="{{ url('/sql') }}"><img src="/clarity/storage-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">&nbsp<span class="d-inline d-sm-none">Database</span></a></li>
                @endif
                @if (!Auth::guest() && Session::get('hub', 'root') == 'root' && Auth::user()->allowed('teacher'))
                <li class="nav-item"><a class="nav-link"href="{{ env('DOC_URL') }}"><img src="/clarity/help-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">&nbsp<span class="d-inline d-sm-none">Help</span></a></li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/clarity/user-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">&nbsp<span class="d-inline d-sm-none">User</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarUserDropdown">
                        <a class="dropdown-item" href="/user/{{ Auth::user()->username }}">{{ Auth::user()->name }}</a>
                        @if (Schema::hasTable('photos') && !Session::get('readonly'))
                            <a class="dropdown-item" href="{{ url('/upload') }}">Upload</a>
                        @endif
                        <div>
                            <a class="dropdown-item" href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div> 
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>

