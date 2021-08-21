<!-- https://stackoverflow.com/questions/33867603/center-an-element-in-bootstrap-4-navbar -->
<nav class="navbar navbar-expand-sm navbar-light bg-light main-nav sticky-top" style="background-color: #fff;" id="nav">
    <div class="container justify-content-center">
        <!-- Left Side Of Navbar -->
        <div class="nav navbar-nav flex-fill w-md-100 flex-nowrap">
            <!-- Branding Image -->
            
            @if (Auth::guest())
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/clarity/camera-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">
                @if(RequestHub::isHub())
                    <div>{{RequestHub::name()}}</div>
                @else
                    <div>{{ env('APP_NAME') }}</div>
                @endif
            </a>
            @else
            <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="/clarity/camera-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">
                @if(RequestHub::isHub())
                    <div>{{RequestHub::name()}}</div>
                @else
                    <div>{{ env('APP_NAME') }}</div>
                @endif
            </a>
            @endif

            @if (RequestHub::isHub() && RequestHub::isReadOnly())
                <img src="/clarity/lock-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="" data-toggle="tooltip" data-placement="bottom" title="{{ __('messages.maintenance') }}">
            @endif

        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if ((!Auth::guest() && RequestHub::isHub()) || (!Auth::guest() && Auth::user()->allowed('admin')))
        <div class="nav navbar-nav flex-fill justify-content-center d-none d-sm-block">
            <search-box style="width:200px;"></search-box>  
        </div>
        @endif
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav flex-fill w-100 justify-content-end collapse navbar-collapse"  id="navbarSupportedContent">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">{{ __('Login') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">{{ __('Register') }}</a></li>
            @else
                @if (RequestHub::isHub() || (!Auth::guest() && Auth::user()->allowed('admin')))
                <li class="d-inline d-sm-none nav-item">
                    <search-box style="width:200px;"></search-box>  
                </li>
                @endif
            
                @if (RequestHub::hasTable('ads') && Auth::user()->allowed('dba') && RequestHub::isHub())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarBusinessDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/clarity/store-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">&nbsp;<span class="d-inline d-sm-none">{{ __('Busines') }}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarBusinessDropdown">
                        <a class="dropdown-item" href="{{ url('/business') }}">{{ __('Overview') }}</a>
                        <a class="dropdown-item" href="/ads">{{ __('Campains') }}</a>
                    </div>
                </li>
                @endif
                @if (RequestHub::isHub() || (!Auth::guest() && Auth::user()->allowed('admin')))
                    @if (RequestHub::hasTable('follows'))
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarBusinessDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/clarity/compass-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">&nbsp<span class="d-inline d-sm-none">{{ __('Explore') }}</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarBusinessDropdown">
                            <a class="dropdown-item" href="{{ url('/explore/users') }}">{{ __('All') }}</a>
                            <a class="dropdown-item" href="/explore/users/suggested">{{ __('Suggested') }}</a>
                        </div>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ url('/explore/users') }}"><img src="/clarity/compass-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">&nbsp<span class="d-inline d-sm-none">{{ __('Explore') }}</span></a></li>
                    @endif
                </li> 
                @endif
                @if ((Auth::user()->allowed('dba') && RequestHub::isHub()) || Auth::user()->allowed('admin'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDatabaseDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/clarity/storage-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">&nbsp;<span class="d-inline d-sm-none">{{ __('Database') }}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDatabaseDropdown">
                        <a class="dropdown-item" href="{{ url('/sql/select') }}">{{ __('Search') }}</a>
                        <a class="dropdown-item" href="{{ url('/sql') }}">SQL</a>
                    </div>
                </li>
                @endif
                @if (!Auth::guest() && ! RequestHub::isHub() && Auth::user()->allowed('teacher'))
                <li class="nav-item"><a class="nav-link" href="{{ env('DOC_URL') }}"><img src="/clarity/help-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">&nbsp;<span class="d-inline d-sm-none">{{ __('Help') }}</span></a></li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/clarity/user-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">&nbsp;<span class="d-inline d-sm-none">{{ __('User') }}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarUserDropdown">
                        <a class="dropdown-item" href="/{{ Auth::user()->username }}">{{ Auth::user()->name }}</a>
                        @if (RequestHub::hasTable('photos') && !RequestHub::isReadOnly())
                            <a class="dropdown-item" href="{{ url('/upload') }}">{{ __('Upload') }}</a>
                        @endif
                        <div>
                            <a class="dropdown-item" href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
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

