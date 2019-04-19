@extends('layouts.base')

@section('css')
<style>
h1{
  font-family: 'Satisfy';
    margin-top: 0px;
    margin-bottom: 0px;
}

h2{
  font-family: 'Satisfy';
  margin-bottom: 0.7em;
  font-size: 1em;
  color: gray;    
}

@media (min-width: 768px) {
.jumbotron {
    padding-top: 8rem;
    padding-bottom: 8rem;
}
}
.jumbotron {
    padding-top: 4rem;
    padding-bottom: 4rem;
    background-color: #fff;
}

.lead-small {
    font-size: 1.05rem;
}

td {
    padding: 0 5px;
}
</style>
@endsection

@section('website')
<nav class="navbar navbar-expand-sm navbar-light bg-light main-nav sticky-top" style="background-color: #fff;">
    <a class="navbar-brand w-50" href="{{ url('/') }}">
        <img src="/clarity/camera-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">
        &nbsp;
        <div>InstaHub</div>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
        <ul class="navbar-nav w-100 justify-content-center">
            <li class="nav-item active">
                <a class="nav-link" href="#">Teacher</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="//codeply.com">Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Guest</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="#">Documentation</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">InstaHub</h1>
        <p class="lead text-muted">
            InstaHub ist ein soziales Netzwerk, welches im Unterricht eingesetzt wird, um die Themen Informatik und Medien zu lehren.
        </p>
        <p class="lead text-muted">
            Ausgezeichnet mit dem <a href="Unterrichtspreis der Gesellschaft für Informatik">Unterrichtspreis der Gesellschaft für Informatik</a> (2017) 
            und den <a href="https://www.mnu.de/blog/535-preis-fuer-innovative-mint-unterrichtsideen-2019">1. Platz im Wettbewerb Innovative MINT-Unterrichtsideen</a> der MNU mit dem Klett-Verlag (2019).
        </p>
        <p>
        <a href="#" class="btn btn-primary my-2">LehrerInnen</a>
        <a href="#" class="btn btn-primary my-2">SchülerInnen</a>
        <a href="#" class="btn btn-secondary my-2">Gäste</a>
        </p>
    </div>
</section>

<section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"><img src="/clarity/users-line.svg" width="90px" height="90px" class="d-inline-block align-middle" alt=""></i>
            </div>
            <h3>Datenschutz</h3>
            <p class="lead  lead-small mb-0">Ähnlich Instagram können SchülerInnen zu Lernzwecken in einem geschützten Umfeld agieren.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"><img src="/clarity/storage-line.svg" width="90px" height="90px" class="d-inline-block align-middle" alt=""></i>
            </div>
            <h3>Datenbank</h3>
            <p class="lead  lead-small mb-0">Voller Zugriff auf die gesammte Datenbank und das Backend mit allen Einstellungen für Administratoren und "Werbetreibende".</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"><img src="/clarity/savings-line.svg" width="90px" height="90px" class="d-inline-block align-middle" alt=""></i>
            </div>
            <h3>Frei</h3>
            <p class="lead lead-small mb-0">Kostenfrei und Open Source für den Einsatz zu Lehrzwecken. Schulungen und Support auf Anfrage auch bei Ihnen vor Ort möglich.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<div class="container-fluid">
<div class="row justify-content-center">
    <div class="d-none d-sm-none d-md-block col-md-4 text-right">
    <img src="/img/pixel3+hub.png" class="img-fluid" Style="max-width: 250px;" alt="Smartphone">
    </div>
    <div class="col-10 col-md-4 text-left">
    <div class="card" style="max-width: 20rem; margin-top: 0.5em;">
        <div class="card-body text-center">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">

            <h1>
                {{ env('APP_NAME') }}
            </h1>
            <h2>
                {{Session::get('hub')}}
            </h2>

                <a href="{{ url('/hubs/create') }}" type="button" class="btn btn-success btn-lg btn-block">
                    Create Hub
                </a>
            </li>
            <li class="list-group-item">
                <h5 class="card-title">Login</h5>

                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf

                    <div class="form-group">
                        <input id="hubname" placeholder="{{ __('Hubname') }}" type="text" class="form-control{{ $errors->has('hubname') ? ' is-invalid' : '' }}" name="hubname" value="{{ old('hubname') }}" required autofocus>

                            @if ($errors->has('hubname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('hubname') }}</strong>
                                </span>
                            @endif
                    </div>
                    
                    <div class="form-group">
                        <input id="username" placeholder="{{ __('Username') }}" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <input id="password" placeholder="{{ __('Password') }}"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                {{ __('Login') }}
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</div>
        
    </div>
  </div>
</div>


<div class="container-fluid">
<div class="row justify-content-center">
    <div class="d-none d-sm-none d-md-block col-md-4 text-right">
        <div class="card" style="max-width: 20rem; margin-top: 0.5em;">
            <div class="card-img-top embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/wCj3keNW-74?rel=0" allowfullscreen></iframe>
            </div>
            <div class="card-body text-left">
                <p class="card-text">Beantrage zuerst einen Lehrer-Account. Anschließend kannst du dir als SchülerIn einen Hub anlegen, dich in 
                    deiner LehrerInnenrolle freischalten und alle Funktionen erkunden. Schau auch in der Hilfe nach fertigen Aufgaben und Stundenentwürfen.</p>
                <a href="#" class="btn btn-outline-dark btn-lg btn-block">Documentation</a>
            </div>
        </div>
    </div>
    <div class="col-10 col-md-4 text-left">
    <div class="card" style="max-width: 20rem; margin-top: 0.5em;">
        <div class="card-body text-center">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">

            <h1>
                {{ env('APP_NAME') }}
            </h1>

            <h2>
                
            </h2>

                <a href="{{ url('/register') }}" type="button" class="btn btn-success btn-lg btn-block">
                    Get Teacher Account
                </a>
            </li>
            <li class="list-group-item">
                <h5 class="card-title">Login</h5>

                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    
                    <div class="form-group">
                        <input id="username" placeholder="{{ __('Username') }}" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <input id="password" placeholder="{{ __('Password') }}"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                {{ __('Login') }}
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</div>
        
    </div>
  </div>
</div>


<div class="container-fluid">

<div class="row justify-content-center alert alert-primary">
    <div class="col-md-4">
        <table>
            <tbody><tr>
                <td style="vertical-align: top;"><b>Admin</b></td>
                <td>
                    Benutzer: <br>
                    Passwort:
                </td>
                <td>
                    <code>admin</code> <br>
                    <code>admin123</code>
                </td>
            </tr>
        </tbody></table>
    </div>
    <div class="col-md-4">
        <table>
            <tbody><tr>
                <td style="vertical-align: top;"><b>Mädchen</b></td>
                <td>
                    Benutzer: <br>
                    Passwort:
                </td>
                <td>
                    <code>eva125</code> <br>
                    <code>eva125</code>
                </td>
            </tr>
        </tbody></table>
    </div>
    <div class="col-md-4">
        <table>
            <tbody><tr>
                <td style="vertical-align: top;"><b>Junge</b></td>
                <td>
                    Benutzer: <br>
                    Passwort:
                </td>
                <td>
                    <code>adrian211</code> <br>
                    <code>adrian211</code>
                </td>
            </tr>
        </tbody></table>
    </div>
</div>

<div class="row justify-content-center">
    <div class="d-none d-sm-none d-md-block col-md-4 text-right">
    <img src="/img/pixel3+hub.png" class="img-fluid" Style="max-width: 250px;" alt="Smartphone">
    </div>
    <div class="col-10 col-md-4 text-left">
    <div class="card" style="max-width: 20rem; margin-top: 0.5em;">
        <div class="card-body text-center">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">

            <h1>
                {{ env('APP_NAME') }}
            </h1>
            <h2>
                public
            </h2>
            </li>
            <li class="list-group-item">
                <h5 class="card-title">Login</h5>

                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf

                    <div class="form-group">
                        <input id="hubname" type="text" class="form-control{{ $errors->has('hubname') ? ' is-invalid' : '' }}" name="hubname" value="public" disabled>

                            @if ($errors->has('hubname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('hubname') }}</strong>
                                </span>
                            @endif
                    </div>
                    
                    <div class="form-group">
                        <input id="username" placeholder="{{ __('Username') }}" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <input id="password" placeholder="{{ __('Password') }}"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                {{ __('Login') }}
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</div>
        
    </div>
  </div>
</div>

    @include('layouts.footer')
@endsection
