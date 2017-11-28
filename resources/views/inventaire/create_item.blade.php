@extends('layouts.template')

@section('title')
    <?php
    use App\Image;
    use App\ItemType;
    ?>
    Create Items
    @endsection

@section('content')
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('items.store')}}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nom</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"  required autofocus>

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
                                    <input id="description" type="text" class="form-control" name="description" required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('typeid') ? ' has-error' : '' }}">
                                <label for="typeid" class="col-md-4 control-label">Type</label>

                                <div class="col-md-6">
                                    <select name="typeid" id="gender" class="form-control" required>

                                        <?php
                                            $itemTypes = ItemType::all();
                                            foreach ($itemTypes as $row)
                                                {
                                                    echo "<option name=\"".$row->id."\" value=\"".$row->id."\">" . $row->name . "</option>";
                                                }
                                        ?>
                                    </select>
                                    @if ($errors->has('typeid'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('typeid') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('prixpet') ? ' has-error' : '' }}">
                                <label for="prixpet" class="col-md-4 control-label">Prix petit</label>

                                <div class="col-md-6">
                                    <input id="prixpet" type="text" class="form-control" name="prixpet" required autofocus>

                                    @if ($errors->has('prixpet'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('prixpet') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('prixmoy') ? ' has-error' : '' }}">
                                <label for="prixmoy" class="col-md-4 control-label">Prix Moyen</label>

                                <div class="col-md-6">
                                    <input id="prixmoy" type="text" class="form-control" name="prixmoy" required autofocus>

                                    @if ($errors->has('prixmoy'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('prixmoy') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('prixgrd') ? ' has-error' : '' }}">
                                <label for="prixgrd" class="col-md-4 control-label">Prix Grand</label>

                                <div class="col-md-6">
                                    <input id="prixgrd" type="text" class="form-control" name="prixgrd" required autofocus>

                                    @if ($errors->has('prixgrd'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('prixgrd') }}</strong>
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
