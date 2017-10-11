@extends('layouts.template')
@section('title')
    Promotions live
@endsection

@section('content')
    <?php
    use Carbon\Carbon;
    use App\Image;
    use App\ItemType;
    use App\Item;
    ?>

    <div class="container">
        <table class="table table-striped" id="myTable">
            <thead>
            <tr>
                <th>Description</th>
                <th>Item associé</th>
                <th>NB/Utilisateurs</th>
                <th>Réduction</th>
                <th>Début</th>
                <th>Fin</th>
            </tr>
            </thead>
            <tbody>
            @foreach($promotion as $row)
                @if($row->start_date < \Carbon\Carbon::now() && $row->end_date > \Carbon\Carbon::now())
                <tr>
                    <td>{{$row['description']}}</td>
                    <td>{{Item::findOrFail($row['item_id'])->name}}</td>
                    <td>{{$row['available_per_user']}}</td>
                    <td>{{$row['reduction']}}</td>
                    <td>{{$row['start_date']}}</td>
                    <td>{{$row['end_date']}}</td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

@endsection