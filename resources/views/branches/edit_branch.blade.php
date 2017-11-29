@extends('layouts.template')

@section('title')

    Edit Surccursale
@endsection
<?php
use App\Image;
?>
@section('content')
    <div class="panel-body">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('branches.update',$branch->id)}}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT"/>
            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                <label for="location" class="col-md-4 control-label">Address</label>
                <div class="col-md-6">
                    <input id="location" type="text" class="form-control" name="location" value="{{$branch->location}}"  required autofocus>

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
                    <input id="email" type="text" class="form-control" name="email" value="{{$branch->email}}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-md-4 control-label">Téléphone</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control" name="phone" value="{{$branch->phone}}" required>

                    @if ($errors->has('phone'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('manager_name') ? ' has-error' : '' }}">
                <label for="manager_name" class="col-md-4 control-label">Nom du gérant</label>

                <div class="col-md-6">
                    <input id="manager_name" type="text" class="form-control" name="manager_name" value="{{$branch->manager_name}}" required>

                    @if ($errors->has('manager_name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('manager_name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('manager_email') ? ' has-error' : '' }}">
                <label for="manager_email" class="col-md-4 control-label">Couriel du gérant</label>

                <div class="col-md-6">
                    <input id="manager_email" type="text" class="form-control" name="manager_email" value="{{$branch->manager_email}}" required>

                    @if ($errors->has('manager_email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('manager_email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('manager_phone') ? ' has-error' : '' }}">
                <label for="manager_phone" class="col-md-4 control-label">Téléphone du gérant</label>

                <div class="col-md-6">
                    <input id="manager_phone" type="text" class="form-control" name="manager_phone" value="{{$branch->manager_phone}}" required>

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
                        Modifier
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection