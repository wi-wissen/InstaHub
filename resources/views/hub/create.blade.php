@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                    <div class="card-body">
                    <div class="alert alert-warning  alert-important" role="alert">Your Hub must activated by your Teacher! </div>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/hubs') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('hub') ? ' has-error' : '' }} row">
                            <label for="hub" class="col-md-4 col-form-label text-md-right"><b>Hub</b></label>

                            <div class="col-md-6">
                                <input id="hub" type="text" class="form-control" name="hub" value="{{ old('hub', $hub) }}" required readonly>

                                @if ($errors->has('hub'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hub') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('teacher') ? ' has-error' : '' }} row">
                            <label for="teacher" class="col-md-4 col-form-label text-md-right"><b>Your Teacher</b></label>

                            <div class="col-md-6">
                                <input id="teacher" type="text" class="form-control" name="teacher" value="{{ old('teacher') }}" required autofocus>

                                @if ($errors->has('teacher'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('teacher') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} row">
                            <label for="username" class="col-md-4 col-form-label text-md-right"><b>Username</b></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username', $username) }}" required readonly>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><b>Name</b></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><b>E-Mail Address</b></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><b>Password</b></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><b>Confirm Password</b></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }} row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>

                            <div class="col-md-6">
                                <textarea name="bio" id="bio" class="form-control" placeholder="Your Bio...."></textarea>

                                @if ($errors->has('bio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">
                                <select class="form-control" id="gender" name="gender">
                                    <option value=""></option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }} row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">Birthday</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control dateinput" name="birthday" value="{{ old('birthday') }}" autofocus>

                                @if ($errors->has('birthday'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" autofocus>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" autofocus>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('centimeters') ? ' has-error' : '' }} row">
                            <label for="centimeters" class="col-md-4 col-form-label text-md-right">Centimeters</label>

                            <div class="col-md-6">
                                <input id="centimeters" type="text" class="form-control" name="centimeters" value="{{ old('centimeters') }}" autofocus>

                                @if ($errors->has('centimeters'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('centimeters') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }} row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">Avatar</label>

                            <div class="col-md-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="avatar">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>

                                @if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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

@section('script')
<script src="/js/jquery-birthday-picker.min.js"></script>

<!--http://www.jqueryscript.net/time-clock/Customizable-Dropdown-Birthday-Picker-Plugin-with-jQuery.html -->
<script>
    $("#birthday").birthdayPicker({
	maxAge: 100,
	minAge: 14,
	maxYear: 'todayYear',
	dateFormat: "littleEndian",
	monthFormat: "number",
	placeholder: true,
	defaultDate: false,
	sizeClass: "span2"
	});
</script>
@endsection
