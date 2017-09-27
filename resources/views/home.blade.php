@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="">Inventaire</a>
                </div>

                <div class="panel-body">
                    <a href="{{route('ventes')}}">Ventes</a>
                </div>

                <div class="panel-body">
                    <a href="">Utilisateurs</a>
                </div>

                <div class="panel-body">
                    <a href="">Employés</a>
                </div>

                <div class="panel-body">
                    <a href="">Promotions</a>
                </div>

                <div class="panel-body">
                    <a href="{{'commandes'}}">Commandes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
