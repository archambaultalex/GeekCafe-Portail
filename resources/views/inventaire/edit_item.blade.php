@extends('layouts.template')

@section('title')
    <?php
    use App\Image;
    use App\ItemType;
    ?>
    Edit Items
    @endsection

@section('content')
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('items.update',$item->id)}}">
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

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description"  value="{{$item->description}}"  required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                                <label for="quantity" class="col-md-4 control-label">Quantité</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="text" class="form-control" name="quantity" value="{{$item->quantity}}" required>

                                    @if ($errors->has('quantity'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('typeid') ? ' has-error' : '' }}">
                                <label for="typeid" class="col-md-4 control-label">Type</label>

                                <div class="col-md-6">
                                    <select name="typeid" id="gender" class="form-control" required>

                                        <?php $itemTypes = ItemType::all(); ?>

                                            @foreach ($itemTypes as $row)
                                                @if($item->type_id == $row->id)
                                                    <option name="{{$row->id}}" value="{{$row->id}}" selected >{{$row->name}}</option>"
                                                @else
                                                    <option name="{{$row->id}}" value="{{$row->id}}" >{{$row->name}}</option>"
                                                @endif
                                            @endforeach



                                    </select>
                                    @if ($errors->has('typeid'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('typeid') }}</strong>
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
