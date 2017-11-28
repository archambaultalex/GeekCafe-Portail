@extends('layouts.template')

<?php
    use App\User;
?>

@section('title')
    Acceuil
    @endsection


@section('content')

    <h1>Bienvenue @if(User::findOrFail(Auth::id())->gender == "male") {{"Mr. "}} @elseif(User::findOrFail(Auth::id())->gender == "female") {{"Mme. "}} @else {{" "}} @endif{{User::findOrFail(Auth::id())->last_name}}</h1>

    @endsection
