@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Numero Commande</th>
                <th>Nombre d'articles commander</th>
                <th>Montant total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $users)
                <tr>
            <td>{{$users->first_name}}</td>
            <td>{{$users->last_name}}</td>
            <td>{{$users->email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection