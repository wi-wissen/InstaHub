@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('bb') }}Edit <b>{{$user->username}}</b></div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ '/user/' . $user->username . '/update' }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }} row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

                            <div class="col-md-6">
                                <textarea name="bio" id="bio" class="form-control" placeholder="Your Bio....">{{ old('bio', $user->bio) }}</textarea>

                                @if ($errors->has('bio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="gender" name="gender">
                                    @if (old('gender', $user->gender) == 'male')
                                        <option value="male" selected>{{ __('male') }}</option>
                                        <option value="female">{{ __('female') }}</option>
                                        <option value=""></option>
                                    @elseif (old('gender', $user->gender) == 'female')
                                        <option value="female" selected>{{ __('female') }}</option>
                                        <option value="male">{{ __('male') }}</option>
                                        <option value=""></option>
                                    @else
                                        <option value="female">{{ __('female') }}</option>
                                        <option value="male">{{ __('malebb') }}</option>
                                        <option value="" selected></option>
                                    @endif
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }} row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control dateinput" name="birthday" value="{{ old('birthday', ($user->birthday) ? $user->birthday->format('Y-m-d') : null) }}" autofocus>

                                @if ($errors->has('birthday'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $user->city) }}" autofocus>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{ old('country', $user->country) }}" autofocus>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('centimeters') ? ' has-error' : '' }} row">
                            <label for="centimeters" class="col-md-4 col-form-label text-md-right">{{ __('Centimeters') }}</label>

                            <div class="col-md-6">
                                <input id="centimeters" type="text" class="form-control" name="centimeters" value="{{ old('centimeters', $user->centimeters) }}" autofocus>

                                @if ($errors->has('centimeters'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('centimeters') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }} row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="avatar">
                                <label class="custom-file-label" for="customFile">{{ __('Choose file') }}</label>
                            </div>

                                @if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                @if (Auth::user()->allowed('dba'))
                        <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} row">
                        <label for="is_active" class="col-md-4 col-form-label text-md-right"></label>

                        <div class="col-md-6">
                            @if (old('is_active', $user->is_active) == true)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="is_active" id="is_active" value="1" checked>
                                <label class="custom-control-label" for="is_active">{{ __('Account ist active') }}</label>
                            </div>
                            @else
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="is_active" id="is_active" value="1">
                                <label class="custom-control-label" for="is_active">{{ __('Account ist active') }}</label>
                            </div>
                            @endif

                            @if ($errors->has('is_active'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('is_active') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
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


@section('css')

@endsection
