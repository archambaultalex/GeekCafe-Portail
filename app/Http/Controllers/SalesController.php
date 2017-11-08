<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $sales = Sales::all()->where('is_active',0);



        return view('Sales.show_sales',compact('sales'));
    }
    public function tableau()
    {
        $sales = Sales::all()->where('is_active',0);
        return view('Sales.tableau_sales',compact('sales'));
    }
}
