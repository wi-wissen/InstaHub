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

.jumbotron-heading {
    font-size: 3.25rem;
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
<div id="landing">
<nav class="navbar navbar-expand-sm navbar-light bg-light main-nav sticky-top" style="background-color: #fff;">
    <a v-on:click="active=''" class="navbar-brand w-50" href="#">
        <img src="/clarity/camera-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">
        &nbsp;
        <div>InstaHub</div>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
        <ul class="navbar-nav w-100 justify-content-center">
            <li class="nav-item">
                <a v-on:click="active='teacher'" class="nav-link" href="#teacher">{{ __('Teacher') }}</a>
            </li>
            <li class="nav-item">
                <a v-on:click="active='student'" class="nav-link" href="#student">{{ __('Student') }}</a>
            </li>
            <li class="nav-item">
                <a v-on:click="active='guest'" class="nav-link" href="#guest">{{ __('Guest') }}</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="{{ env('DOC_URL') }}">{{ __('Documentation') }}</a>
            </li>
        </ul>
    </div>
</nav>

<div v-if="active==''" class="container">
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">InstaHub</h1>
        <p class="lead text-muted">
            {{ __('messages.instahub') }}
        </p>
        <p class="lead text-muted">
            {!! __('messages.competitions') !!}
        </p>
        <p>
        <a v-on:click="active='teacher'" href="#teacher" class="btn btn-primary my-2">{{ __('Teacher') }}</a>
        <a v-on:click="active='student'" href="#student" class="btn btn-primary my-2">{{ __('Student') }}</a>
        <a v-on:click="active='guest'" href="#guest" class="btn btn-secondary my-2">{{ __('Guest') }}</a>
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
            <h3>{{ __('Data Protection') }}</h3>
            <p class="lead  lead-small mb-0">{{ __('messages.privacy') }}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"><img src="/clarity/storage-line.svg" width="90px" height="90px" class="d-inline-block align-middle" alt=""></i>
            </div>
            <h3>{{ __('Database') }}</h3>
            <p class="lead  lead-small mb-0">{{ __('messages.database') }}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"><img src="/clarity/savings-line.svg" width="90px" height="90px" class="d-inline-block align-middle" alt=""></i>
            </div>
            <h3>{{ __('Open') }}</h3>
            <p class="lead lead-small mb-0">{{ __('messages.openfree') }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div v-if="active=='student'" class="container-fluid">
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

                <a href="{{ url('/hubs/create') }}" class="btn btn-success btn-lg btn-block">
                {{ __('Create Hub') }}
                </a>
            </li>
            <li class="list-group-item">
                <h5 class="card-title">{{ __('Login') }}</h5>

                <form method="POST" v-bind:action="'https://' + hubname + '{{ env('SESSION_DOMAIN') }}/login'" aria-label="{{ __('Login') }}">
                    @csrf

                    <div class="form-group">
                        <input id="hubname" v-model="hubname" placeholder="{{ __('Hubname') }}" type="text" class="form-control{{ $errors->has('hubname') ? ' is-invalid' : '' }}" name="hubname" value="{{ old('hubname') }}" required autofocus>

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


<div v-if="active=='teacher'" class="container-fluid">
<div class="row justify-content-center">
    <div class="d-none d-sm-none d-md-block col-md-4">
        <div class="card float-right" style="max-width: 20rem; margin-top: 0.5em;">
            <div class="card-img-top embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/wCj3keNW-74?rel=0" allowfullscreen></iframe>
            </div>
            <div class="card-body text-left">
                <p class="card-text">
                    {{ __('messages.firstStepTeacher') }}
                </p>
                <a href="{{ env('DOC_URL') }}" class="btn btn-outline-dark btn-lg btn-block">{{ __('Documentation') }}</a>
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

                <a href="{{ url('/register') }}" class="btn btn-success btn-lg btn-block">
                    {{ __('Get Teacher Account') }}
                </a>
            </li>
            <li class="list-group-item">
                <h5 class="card-title">{{ __('Login') }}</h5>

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

<div v-if="active=='guest'" >
<div class="container">

<div class="row justify-content-center alert alert-primary">
    <div class="col-md-4">
        <table>
            <tbody><tr>
                <td style="vertical-align: top;"><b>Admin</b></td>
                <td>
                    {{ __('User') }}: <br>
                    {{ __('Password') }}:
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
                <td style="vertical-align: top;"><b>{{ __('Girl') }}</b></td>
                <td>
                    {{ __('User') }}: <br>
                    {{ __('Password') }}:
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
            <tbody>
                <tr>
                    <td style="vertical-align: top;"><b>{{ __('Boy') }}</b></td>
                    <td>
                        {{ __('User') }}: <br>
                        {{ __('Password') }}:
                    </td>
                    <td>
                        <code>adrian211</code> <br>
                        <code>adrian211</code>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</div>
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
                public
            </h2>
            </li>
            <li class="list-group-item">
                <h5 class="card-title">{{ __('Login') }}</h5>

                <form method="POST" action="https://public{{ env('SESSION_DOMAIN') }}/login" aria-label="{{ __('Login') }}">
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
</div>

    @include('layouts.footer')

</div>
@endsection
