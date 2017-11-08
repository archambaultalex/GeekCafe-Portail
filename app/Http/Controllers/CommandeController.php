<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;

class CommandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sales = Sales::all();

        return view('Commandes.show_commandes',compact('sales'));
    }

    public function deactivate($id)
    {
        Sales::findOrFail($id)->update(['is_active' => 0]);
        return redirect('test2');
    }

}
