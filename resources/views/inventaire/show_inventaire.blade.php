@extends('layouts.app')

@section('content')
    <?php
            use App\Image;
            use App\ItemType;
            ?>
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Image</th>
                <th>Item</th>
                <th>Description</th>
                <th>Type</th>
                <th>Quantité</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $row)
            <tr>
                <td><img style="max-width: 40%;" src="{{Image::findOrFail($row['image_id'])->image}}"/></td>
                <td>{{$row['name']}}</td>
                <td>{{$row['description']}}</td>
                <td>{{ItemType::findOrFail($row['type_id'])->name}}</td>
                <td>{{$row['quantity']}}</td>

            </tr>

                @endforeach

            </tbody>
        </table>
    </div>
@endsection