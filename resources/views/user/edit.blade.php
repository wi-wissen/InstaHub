@extends('layouts.app')

@section('content')
<div class="container" id="component-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }} <b>{{$user->username}}</b></div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ '/' . $user->username . '/update' }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="bio" class="col-md-4 col-form-label text-md-end">{{ __('Bio') }}</label>
                            <div class="col-md-6">
                                <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" placeholder="Your Bio....">{{ old('bio', $user->bio) }}</textarea>
                                @error('bio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                            <div class="col-md-6">
                                <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                    <option value="" @if(old('gender', $user->gender) == '') selected @endif></option>
                                    <option value="male" @if(old('gender', $user->gender) == 'male') selected @endif>{{ __('male') }}</option>
                                    <option value="female" @if(old('gender', $user->gender) == 'female') selected @endif>{{ __('female') }}</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-end">{{ __('Birthday') }}</label>
                            <div class="col-md-6">
                                <input type="date" id="birthday" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday', ($user->birthday) ? $user->birthday->format('Y-m-d') : null) }}">
                                @error('birthday')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city', $user->city) }}">
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country', $user->country) }}">
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="centimeters" class="col-md-4 col-form-label text-md-end">{{ __('Centimeters') }}</label>
                            <div class="col-md-6">
                                <input id="centimeters" type="text" class="form-control @error('centimeters') is-invalid @enderror" name="centimeters" value="{{ old('centimeters', $user->centimeters) }}">
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

                        @if (Auth::user()->allowed('dba'))
                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input @error('is_active') is-invalid @enderror" type="checkbox" name="is_active" id="is_active" value="1" @if(old('is_active', $user->is_active)) checked @endif>
                                    <label class="form-check-label" for="is_active">
                                        {{ __('Account is active') }}
                                    </label>
                                    @error('is_active')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary float-end">
                                    {{ __('Save') }}
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