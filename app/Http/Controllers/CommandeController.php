<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CommandeController extends Controller
{
    //
    public function index()
    {
        $user = User::all();
        return view('commandes.commandes_live',compact('user'));
    }
}
