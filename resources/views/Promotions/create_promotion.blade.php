@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('profile.update',$profile->id) }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="PUT"/>
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="first-name" type="text" class="form-control" name="first_name" value="{{ $profile->first_name }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last-name" type="text" class="form-control" name="last_name" value="{{ $profile->last_name }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $profile->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="gender" class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    <select name="gender" id="gender" class="form-control" required>

                                        <option name="male" value="male"@if($profile->gender == 'male') {{" selected"}} @endif >Male</option>
                                        <option name="female" value="female"@if($profile->gender == 'female') {{" selected"}} @endif>Female</option>
                                        <option name="other" value="other"@if($profile->gender == 'other') {{" selected"}} @endif>Other</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                                <label for="birth-date" class="col-md-4 control-label">Birth Date</label>

                                <div class="col-md-6">
                                    <input id="birth-date" type="date" class="form-control" name="birth_date" value="{{ $profile->birth_date }}" required>

                                    @if ($errors->has('birth_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <label for="phone-number" class="col-md-4 control-label">Phone Number</label>

                                <div class="col-md-6">
                                    <input id="phone-number" type="text" class="form-control" name="phone_number" value="{{ $profile->phone }}" required>
                                    @if ($errors->has('phone_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-md-4 control-label">Image</label>

                                <div class="col-md-6">
                                    <input class="form-control" type="file" id="image" name="image" accept="image/jpeg, image/png">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
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
