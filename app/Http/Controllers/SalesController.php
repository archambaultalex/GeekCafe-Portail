<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\SaleItem;
use App\SaleSubitem;

class SalesController extends Controller
{
    //
    public function index()
    {
        $sales = Sales::all();
        $saleitems = SaleItem::all();
        $salesubitems = SaleSubitem::all();
        return view('Sales.show_sales',compact('sales'),compact('saleitems'),compact('salesubitems'));
    }
}
