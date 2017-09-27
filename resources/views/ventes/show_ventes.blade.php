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
            <tr>
                <td>1</td>
                <td>4</td>
                <td>2017-09-20</td>
                <td>12.50$</td>
            </tr>
            <tr>
                <td>2</td>
                <td>1</td>
                <td>2017-09-20</td>
                <td>4.50$</td>
            </tr>
            <tr>
                <td>3</td>
                <td>2</td>
                <td>2017-09-21</td>
                <td>9.00$</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection