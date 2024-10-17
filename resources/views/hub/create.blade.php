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
                    <div class="alert alert-warning" role="alert">{{ __('messages.activateByTeacher') }}</div>
                    @endguest
                    
                    <form class="needs-validation" novalidate role="form" method="POST" action="{{ url('/hubs') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="hub" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Hub') }}</strong></label>
                            <div class="col-md-6">
                                <input id="hub" type="text" class="form-control @error('hub') is-invalid @enderror" name="hub" value="{{ (Auth::guest()) ? session('register_hub_name') : old('hub', session('register_hub_name', '')) }}" required @guest readonly @endguest>
                                @error('hub')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="teacher" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Your Teacher') }}</strong></label>
                            <div class="col-md-6">
                                @auth
                                <input id="teacher" type="text" class="form-control @error('teacher') is-invalid @enderror" name="teacher" value="{{ old('teacher', Auth::user()->username) }}" required autofocus>
                                @endauth
                                @guest
                                <input id="teacher" type="text" class="form-control @error('teacher') is-invalid @enderror" name="teacher" value="{{ old('teacher') }}" required autofocus>
                                @endguest
                                @error('teacher')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="username" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Username') }}</strong></label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="admin" required readonly>
                                <div class="form-text">{{ __('messages.username') }}</div>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Name') }}</strong></label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Email') }}</strong></label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', session('register_hub_name', 'email') . '@instahub.test') }}" required>
                                <div class="form-text">{{ __('messages.dummyMail') }}</div>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Password') }}</strong></label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Confirm Password') }}</strong></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="bio" class="col-md-4 col-form-label text-md-end">{{ __('Bio') }}</label>
                            <div class="col-md-6">
                                <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" placeholder="Your Bio...."></textarea>
                                @error('bio')
                                    <div class="invalid-feedback">{{ $message }}</div>
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
                                    <div class="invalid-feedback">{{ $message }}</div>
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
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
						
                        <div class="mb-3 row">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" autofocus>
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
						
                        <div class="mb-3 row">
                            <label for="centimeters" class="col-md-4 col-form-label text-md-end">{{ __('Centimeters') }}</label>
                            <div class="col-md-6">
                                <input id="centimeters" type="text" class="form-control @error('centimeters') is-invalid @enderror" name="centimeters" value="{{ old('centimeters') }}" autofocus>
                                @error('centimeters')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" id="avatar" accept="image/png, image/jpeg, image/jpg, image/gif">
                                @error('avatar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary float-end">
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