<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\ItemSize;

class ItemSizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $data = ItemSize::all();
        return view('show_data',compact('date'));

    }

    public function create()
    {
        return view('',compact('item'));
    }

    public function store(Request $request)
    {
        ItemSize::create($request->all());
        return redirect('');
    }

    public function edit($id)
    {
        $item = ItemSize::findOrFail($id);
        return view('',compact('item'));
    }

    public function update(Request $request, $id)
    {
        ItemSize::findOrFail($id)->update($request->all());
        return redirect('');
    }

    public function delete($id)
    {
        ItemSize::findOrFail($id)->delete();
        return redirect('');
    }

}
