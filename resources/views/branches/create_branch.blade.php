@extends('layouts.template')

@section('title')

    Create Branch
@endsection
<?php
use App\Image;
?>
@section('content')
    <div class="panel-body">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('branches.store')}}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="location" class="col-md-4 control-label">Address</label>
                <div class="col-md-6">
                    <input id="location" type="text" class="form-control" name="location"  required autofocus>

                    @if ($errors->has('location'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                    @endif
                </div>


            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Email</label>

                <div class="col-md-6">
                    <input id="email" type="text" class="form-control" name="Email" value="" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-md-4 control-label">Phone</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control" name="phone" value="" required>

                    @if ($errors->has('phone'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('manager_name') ? ' has-error' : '' }}">
                <label for="manager_name" class="col-md-4 control-label">Manager Name</label>

                <div class="col-md-6">
                    <input id="manager_name" type="text" class="form-control" name="manager_name" value="" required>

                    @if ($errors->has('manager_name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('manager_name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('manager_email') ? ' has-error' : '' }}">
                <label for="manager_email" class="col-md-4 control-label">Manager Email</label>

                <div class="col-md-6">
                    <input id="manager_email" type="text" class="form-control" name="manager_email" value="" required>

                    @if ($errors->has('manager_email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('manager_email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('manager_phone') ? ' has-error' : '' }}">
                <label for="manager_phone" class="col-md-4 control-label">Manager Phone</label>

                <div class="col-md-6">
                    <input id="manager_phone" type="text" class="form-control" name="manager_phone" value="" required>

                    @if ($errors->has('manager_phone'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('manager_phone') }}</strong>
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
                        Créer
                    </button>
                </div>
            </div>
        </form>
    </div>
    @endsection