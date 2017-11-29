@extends('layouts.template')

@section('title')
    <?php
    use App\Image;
    use App\ItemType;
    ?>
    Edit Subitems
    @endsection

@section('content')
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('subitems.update',$item->id)}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT"/>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nom</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$item->name}}"  required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">Prix</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control" name="price" value="{{$item->price}}" required>

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('is_topping') ? ' has-error' : '' }}">
                                <label for="is_topping" class="col-md-4 control-label">Garniture</label>

                                <div class="col-md-6">
                                    @if($item->is_topping == "1")
                                        <input id="is_topping" type="checkbox" style="margin-left: 1px;" class="" name="is_topping" value="true" checked>
                                    @else
                                        <input id="is_topping" type="checkbox" style="margin-left: 1px;" class="" name="is_topping" value="true" >
                                    @endif
                                    @if ($errors->has('is_topping'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('is_topping') }}</strong>
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
