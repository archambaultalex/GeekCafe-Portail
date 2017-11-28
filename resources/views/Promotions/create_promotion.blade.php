@extends('layouts.template')

@section('title')
    Create Promotions
    @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('promotions.store') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="item_id" value="{{$item->id}}"/>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('NB/utlisateur') ? ' has-error' : '' }}">
                                <label for="parUser" class="col-md-4 control-label">NB/Utilisateur</label>

                                <div class="col-md-6">
                                    <input id="parUser" type="text" class="form-control" name="ParUtilisateur" value="{{ old('available_per_user') }}" required autofocus>
                                    @if ($errors->has('ParUtilisateur'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('ParUtilisateur') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                                <label for="discount" class="col-md-4 control-label">Réduction</label>

                                <div class="col-md-6">
                                    <input id="discount" type="text" class="form-control" name="discount" value="{{ old('discount') }}" required autofocus>
                                    @if ($errors->has('discount'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="start_date" class="col-md-4 control-label">Start Date</label>

                                <div class="col-md-6">
                                    <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required autofocus>
                                    @if ($errors->has('start_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label for="end_date" class="col-md-4 control-label">End Date</label>

                                <div class="col-md-6">
                                    <input id="end_date" type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required autofocus>
                                    @if ($errors->has('end_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
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
