@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit <b>{{$user->username}}</b></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ '/user/' . $user->username . '/update' }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <label for="bio" class="col-md-4 control-label">Bio</label>

                            <div class="col-md-6">
                                <textarea name="bio" id="bio" class="form-control" placeholder="Your Bio....">{{ old('bio', $user->bio) }}</textarea>

                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <select class="form-control" id="gender" name="gender">
                                    @if (old('gender', $user->gender) == 'male')
                                        <option value="male" selected>male</option>
                                        <option value="female">female</option>
                                        <option value=""></option>
                                    @elseif (old('gender', $user->gender) == 'female')
                                        <option value="female" selected>female</option>
                                        <option value="male">male</option>
                                        <option value=""></option>
                                    @else
                                        <option value="female">female</option>
                                        <option value="male">male</option>
                                        <option value="" selected></option>
                                    @endif
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label for="birthday" class="col-md-4 control-label">Birthday</label>

                            <div class="col-md-6">
                                <div id="birthday"></div>

                                @if ($errors->has('birthday_birthDay'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday_birthDay') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $user->city) }}" autofocus>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label">Country</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{ old('country', $user->country) }}" autofocus>

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('centimeters') ? ' has-error' : '' }}">
                            <label for="centimeters" class="col-md-4 control-label">Centimeters</label>

                            <div class="col-md-6">
                                <input id="centimeters" type="text" class="form-control" name="centimeters" value="{{ old('centimeters', $user->centimeters) }}" autofocus>

                                @if ($errors->has('centimeters'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('centimeters') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">Avatar</label>

                            <div class="col-md-6">
                                <input type="file" name="avatar" id="avatar">

                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @if (Auth::user()->allowed('dba'))
                        <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                        <label for="is_active" class="col-md-4 control-label">Active</label>

                        <div class="col-md-6">
                            @if (old('is_active', $user->is_active) == true)
                            <div class="checkbox">
                                <label><input type="checkbox" name="is_active" id="is_active" value="1" checked></label>
                            </div>
                            @else
                            <div class="checkbox">
                                <label><input type="checkbox" name="is_active" id="is_active" value="1"></label>
                            </div>
                            @endif

                            @if ($errors->has('is_active'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('is_active') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
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
	defaultDate: '{{old('false', $user->birthday)}}',
	sizeClass: "span2"
	});
</script>
@endsection
