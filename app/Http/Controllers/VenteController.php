<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VenteController extends Controller
{
    //
    public function index()
    {
        return view('ventes.show_ventes');
    }
}