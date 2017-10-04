@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Numero Commande</th>
                <th>Nombre d'articles commander</th>
                <th>Date</th>
                <th>Montant total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{$sale->id}}</td>
                    <td>{{$sale->user_id}}</td>
                    <td>{{$sale->is_active}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection