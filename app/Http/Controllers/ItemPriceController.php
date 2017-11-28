<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\ItemPrice;

class ItemPriceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $data = ItemPrice::all();
        return view('show_data',compact('date'));

    }

    public function create()
    {
        return view('',compact('item'));
    }

    public function store(Request $request)
    {
        ItemPrice::create($request->all());
        return redirect('');
    }

    public function edit($id)
    {
        $item = ItemPrice::findOrFail($id);
        return view('',compact('item'));
    }

    public function update(Request $request, $id)
    {
        ItemPrice::findOrFail($id)->update($request->all());
        return redirect('');
    }

    public function delete($id)
    {
        ItemPrice::findOrFail($id)->delete();
        return redirect('');
    }
}
