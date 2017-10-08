@extends('layouts.geek')

@section('content')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/dashboard.widgets.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
{{--<div class="container">--}}
{{--<div class="">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
            {{--<div class="wrapper">--}}
                {{--<div class="panel-heading">Login</div>--}}

                {{--<div class="panel-body panel-default">--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('login') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6 ">--}}
                                {{--<input id="email" type="email" style="border-radius:0 !important" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input style="border-radius:0 !important" id="password" type="password" class="" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-8 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Login--}}
                                {{--</button>--}}

                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--Forgot Your Password?--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}




    <body class="fixed-header ">
    <!-- START PAGE-CONTAINER -->
    <div class="lock-container full-height">
        <!-- START PAGE CONTENT WRAPPER -->
        <div class="full-height sm-p-t-50 align-items-center d-md-flex">
            <div class="row full-width-alex">
                <div class="col-md-6">
                    <!-- START Lock Screen User Info -->
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="">
                            <div class="thumbnail-wrapper circular d48 m-r-10 ">
                                <img width="43" height="43" data-src-retina="assets/img/profiles/avatar_small2x.jpg" data-src="assets/img/profiles/avatar.jpg" alt="" src="assets/img/profiles/avatar_small2x.jpg">
                            </div>
                        </div>
                        <div class="">
                            <h5 class="logged hint-text no-margin">
                                Login as
                            </h5>
                            <h2 class="name no-margin">Administrator</h2>
                        </div>
                    </div>
                    <!-- END Lock Screen User Info -->
                </div>
                <div class="col-md-6">
                    <!-- START Lock Screen Form -->
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <!-- START Form Control -->
                                <div class="form-group form-group-default sm-m-t-30 {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label>Username</label>
                                    <div class="controls">
                                        <input id="email" type="email" style="border-radius:0 !important" class="form-control " name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group form-group-default sm-m-t-30 {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label>Password</label>
                                    <div class="controls">
                                        <input style="border-radius:0 !important" id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary-geek">
                                            Login
                                        </button>
                                        <a href="{{route('register')}}" class="btn btn-primary-geek">
                                            Register
                                        </a>

                                    </div>
                                </div>
                                <!-- END Form Control -->
                            </div>
                        </div>
                        <!-- START Lock Screen Notification Icons-->
                        <!-- END Lock Screen Notification Icons-->
                    </form>
                    <!-- END Lock Screen Form -->
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>


@endsection
