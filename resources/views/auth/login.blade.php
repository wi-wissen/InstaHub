@extends('layouts.base')

@section('content')
<div class="container-fluid mt-3 mt-md-4">
    @if(RequestHub::isHub() && RequestHub::name() == 'public')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container-xl mt-0">
                <div class="row justify-content-center alert alert-primary">
                    <div class="col-md-4">
                        <table class="table table-borderless mb-0">
                            <tr>
                                <td class="fw-bold bg-transparent">Admin</td>
                                <td class="bg-transparent">
                                    {{ __('User') }}: <br>
                                    {{ __('Password') }}:
                                </td>
                                <td class="bg-transparent">
                                    <code>admin</code> <br>
                                    <code>admin123</code>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-borderless mb-0">
                            <tr>
                                <td class="bg-transparent fw-bold">{{ __('Girl') }}</td>
                                <td class="bg-transparent">
                                    {{ __('User') }}: <br>
                                    {{ __('Password') }}:
                                </td>
                                <td class="bg-transparent">
                                    <code>eva125</code> <br>
                                    <code>eva125</code>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-borderless mb-0">
                            <tr>
                                <td class="bg-transparent fw-bold">{{ __('Boy') }}</td>
                                <td class="bg-transparent">
                                    {{ __('User') }}: <br>
                                    {{ __('Password') }}:
                                </td>
                                <td class="bg-transparent">
                                    <code>adrian211</code> <br>
                                    <code>adrian211</code>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <div class="row justify-content-center mt-5">
        @if(RequestHub::isHub())
        <div class="d-none d-md-block col-md-4 text-end">
            <img src="/img/pixel3-hub.png" class="img-fluid" style="max-width: 250px;" alt="Smartphone">
        </div>
        @else
        <div class="d-none d-md-block col-md-4">
            <div class="card float-end" style="max-width: 20rem; margin-top: 0.5em;">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube-nocookie.com/embed/J3WAaPNjANE?rel=0" allowfullscreen></iframe>
                </div>
                <div class="card-body text-start">
                    <p class="card-text">
                        {{ __('messages.firstStepTeacher') }}
                    </p>
                    <a href="{{ route('documentation.redirect', ['generation' => config('hub.default_generation')]) }}" class="btn btn-outline-dark btn-lg w-100">{{ __('Documentation') }}</a>
                </div>
            </div>
        </div>
        @endif

        <div class="col-12 col-md-4">
            <div class="card" style="max-width: 20rem; margin-top: 0.5em;">
                <div class="card-body text-center">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item pb-3">
                            <h1 class="font-brand">{{ config('app.name') }}</h1>
                            @if(RequestHub::name())
                            <h2 class="font-brand fs-3 text-muted">{{RequestHub::name()}}</h2>
                            @endif
                            <a {{ RequestHub::isReadOnly() ? "disabled" : "" }} href="{{ url('/register') }}" class="btn btn-success btn-lg w-100">
                                {{ __('Create Account') }}
                            </a>
                        </li>
                        <li class="list-group-item pt-3">
                            <h5 class="card-title">{{ __('Login') }}</h5>
                            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label sr-only">{{ __('Username') }}</label>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="{{ __('Username') }}" required autofocus>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label sr-only">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
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
@endsection