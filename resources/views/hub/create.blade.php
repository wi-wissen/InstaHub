@extends('layouts.app')

@section('content')
<div class="container" id="component-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @auth
                <div class="card-header">{{ __('Create Hub') }}</div>
                @endauth
                @guest
                <div class="card-header">{{ __('Register') }}</div>
                @endguest
                    <div class="card-body">

                    @guest
                    <div class="alert alert-warning  alert-important" role="alert">{{ __('messages.activateByTeacher') }}</div>
                    @endguest
                    
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/hubs') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('hub') ? ' has-error' : '' }} row">
                            <label for="hub" class="col-md-4 col-form-label text-md-right"><b>{{ __('Hub') }}</b></label>

                            <div class="col-md-6">
                                <input id="hub" type="text" class="form-control @error('hub') is-invalid @enderror" name="hub" value="{{ old('hub', $hub) }}" required readonly>

                                @error('hub')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('teacher') ? ' has-error' : '' }} row">
                            <label for="teacher" class="col-md-4 col-form-label text-md-right"><b>{{ __('Your Teacher') }}</b></label>

                            <div class="col-md-6">
                                @auth
                                <input id="teacher" type="text" class="form-control @error('teacher') is-invalid @enderror" name="teacher" value="{{ old('teacher', Auth::user()->username) }}" required autofocus>
                                @endauth
                                @guest
                                <input id="teacher" type="text" class="form-control @error('teacher') is-invalid @enderror" name="teacher" value="{{ old('teacher') }}" required autofocus>

                                @endguest
        
                                @error('teacher')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} row">
                            <label for="username" class="col-md-4 col-form-label text-md-right"><b>{{ __('Username') }}</b></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{ old('username', $username) }}" required readonly>
                                <small id="usernameHelpBlock" class="form-text text-muted">
                                    {{ __('messages.username') }}
                                </small>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><b>{{ __('Name') }}</b></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><b>{{ __('Email') }}</b></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email', $hub . '@instahub.test') }}" required>
                                <small id="usernameHelpBlock" class="form-text text-muted">
                                    {{ __('messages.dummyMail') }}
                                </small>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><b>{{ __('Password') }}</b></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><b>{{ __('Confirm Password') }}</b></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }} row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

                            <div class="col-md-6">
                                <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" placeholder="Your Bio...."></textarea>

                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                    <option value=""></option>
                                    <option value="male">{{ __('male') }}</option>
                                    <option value="female">{{ __('female') }}</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }} row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                            <div class="col-md-6">
                                <date-input id="birthday" value="{{ old('birthday') }}" class="@error('birthday') is-invalid @enderror" name="birthday" autofocus>
                                
                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" autofocus>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('centimeters') ? ' has-error' : '' }} row">
                            <label for="centimeters" class="col-md-4 col-form-label text-md-right">{{ __('Centimeters') }}</label>

                            <div class="col-md-6">
                                <input id="centimeters" type="text" class="form-control @error('centimeters') is-invalid @enderror" name="centimeters" value="{{ old('centimeters') }}" autofocus>

                                @error('centimeters')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }} row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="avatar" id="avatar" accept="image/png, image/jpeg, image/jpg, image/gif">
                                <label class="custom-file-label" for="customFile">{{ __('Choose file') }}</label>
                            </div>

                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary float-right">
                                    @auth
                                    {{ __('Create Hub') }}
                                    @endauth
                                    @guest
                                    {{ __('Register') }}
                                    @endguest
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
