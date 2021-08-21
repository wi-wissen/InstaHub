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
</style>
@endsection

@section('website')

<div class="container-fluid">
@if(RequestHub::isHub() && RequestHub::name() == 'public')
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
@endif
<div class="row justify-content-center">

    @if(RequestHub::isHub())
    <div class="d-none d-sm-none d-md-block col-md-4 text-right">
        <img src="/img/pixel3+hub.png" class="img-fluid" Style="max-width: 250px;" alt="Smartphone">
    </div>
    @else
    <div class="d-none d-sm-none d-md-block col-md-4">
        <div class="card float-right" style="max-width: 20rem; margin-top: 0.5em;">
            <div class="card-img-top embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/J3WAaPNjANE?rel=0" allowfullscreen></iframe>
            </div>
            <div class="card-body text-left">
                <p class="card-text">
                    {{ __('messages.firstStepTeacher') }}
                </p>
                <a href="{{ env('DOC_URL') }}" class="btn btn-outline-dark btn-lg btn-block">{{ __('Documentation') }}</a>
            </div>
        </div>
    </div>
    @endif

    <div class="col-10 col-md-4 text-left">
    <div class="card" style="max-width: 20rem; margin-top: 0.5em;">
        <div class="card-body text-center">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">

            <h1>
                {{ env('APP_NAME') }}
            </h1>
            <h2>
                {{RequestHub::name()}}
            </h2>

                <a {{ RequestHub::isReadOnly() ? "disabled" : "" }} href="{{ url('/register') }}" class="btn btn-success btn-lg btn-block">
                {{ __('Create Account') }}
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

    @include('layouts.footer')
@endsection
