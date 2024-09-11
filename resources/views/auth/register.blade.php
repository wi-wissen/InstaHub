@extends('layouts.base')

@section('content')
<div class="container" id="component-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    @if(config('app.env') != 'local')
                        <div class="alert alert-warning" role="alert">
                            {{ __('You can register here as a teacher free of charge. Your user account will be activated manually after successful verification. You will then receive an activation email.') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/register') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="mb-3 row">
                            <label for="username" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Username') }}</strong></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
                                @if (! RequestHub::isHub())
                                <div id="usernameHelpBlock" class="form-text">
                                    {{ __('messages.teachername') }}
                                </div>
                                @endif

                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Name') }}</strong></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Email') }}</strong></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Password') }}</strong></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Confirm Password') }}</strong></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">

                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        @if (RequestHub::isHub())

                        <div class="mb-3 row">
                            <label for="bio" class="col-md-4 col-form-label text-md-end">{{ __('Bio') }}</label>

                            <div class="col-md-6">
                                <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror"></textarea>

                                @error('bio')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                    <option value=""></option>
                                    <option value="diverse">{{ __('diverse') }}</option>
                                    <option value="male">{{ __('male') }}</option>
                                    <option value="female">{{ __('female') }}</option>
                                </select>

                                @error('gender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
						
                        <div class="mb-3 row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-end">{{ __('Birthday') }}</label>

                            <div class="col-md-6">
                                <input type="date" id="birthday" name="birthday" 
                                    class="form-control @error('birthday') is-invalid @enderror"
                                    value="{{ old('birthday') }}" required>

                                @error('birthday')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
						
                        <div class="mb-3 row">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autofocus>

                                @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
						
                        <div class="mb-3 row">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" autofocus>

                                @error('country')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
						
                        <div class="mb-3 row">
                            <label for="centimeters" class="col-md-4 col-form-label text-md-end">{{ __('Centimeters') }}</label>

                            <div class="col-md-6">
                                <input id="centimeters" type="text" class="form-control @error('centimeters') is-invalid @enderror" name="centimeters" value="{{ old('centimeters') }}" autofocus>

                                @error('centimeters')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" id="avatar" accept="image/png, image/jpeg, image/jpg, image/gif">
                                @error('avatar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        @else
                        <div class="mb-3 row">
                            <label for="messageToAdmin" class="col-md-4 col-form-label text-md-end">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                <textarea name="messageToAdmin" id="messageToAdmin" class="form-control @error('messageToAdmin') is-invalid @enderror" placeholder="{{ __('messages.provideProof') }}"></textarea>

                                @error('messageToAdmin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        @endif

                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection