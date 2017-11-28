<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class InventaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $items = Item::all();
        return view('inventaire.show_inventaire', compact('items'));
    }
}
