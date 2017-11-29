<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Sales;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $datestart = Carbon::now()->subMonth(1)->toDateString();
        $dateend = Carbon::now()->AddDay(1)->toDateString();
        $sales = Sales::orderBy('created_at','DESC')->get()->where('is_active',0)->where('created_at','>=',$datestart)->where('created_at','<=',$dateend);
        return view('Sales.tableau_sales',compact('sales','datestart','dateend'));
    }

    public function filtrer(Request $request)
    {
        $datestart = $request->datestart;
        $dateend = $request->dateend;
        $sales = Sales::orderBy('created_at','DESC')->get()->where('is_active',0)->where('created_at','>=',$request->datestart)->where('created_at','<=',$request->dateend);
        return view('Sales.tableau_sales',compact('sales','datestart','dateend'));
    }
}
