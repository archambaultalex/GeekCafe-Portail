<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //
    public function index()
    {
        return view('commandes.commandes_live');
    }
}
