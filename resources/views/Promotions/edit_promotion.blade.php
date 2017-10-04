@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('promotions.update',$promotion->id) }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="PUT"/>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" value="{{ $promotion->description }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('available_per_user') ? ' has-error' : '' }}">
                                <label for="parUser" class="col-md-4 control-label">NB/Utilisateur</label>

                                <div class="col-md-6">
                                    <input id="parUser" type="text" class="form-control" name="parUser" value="{{ $promotion->available_per_user }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('reduction') ? ' has-error' : '' }}">
                                <label for="reduction" class="col-md-4 control-label">Réduction</label>

                                <div class="col-md-6">
                                    <input id="reduction" type="text" class="form-control" name="reduction" value="{{ $promotion->reduction }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="start_date" class="col-md-4 control-label">Start Date</label>

                                <div class="col-md-6">
                                    <input id="start_date" type="date" class="form-control" name="start_date" value="{{ $promotion->start_date }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label for="end_date" class="col-md-4 control-label">End Date</label>

                                <div class="col-md-6">
                                    <input id="end_date" type="date" class="form-control" name="end_date" value="{{ $promotion->end_date }}" required autofocus>
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
