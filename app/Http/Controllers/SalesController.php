<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;

class SalesController extends Controller
{
    //
    public function index()
    {
        $sales = Sales::all();
        return view('Sales.show_sales',compact('sales'));
    }
}
