<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Item;

class ItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $data = Item::all();
        return view('show_data',compact('date'));

    }

    public function create()
    {
        return view('',compact('item'));
    }

    public function store(Request $request)
    {
        Item::create($request->all());
        return redirect('');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('',compact('item'));
    }

    public function update(Request $request, $id)
    {
        Item::findOrFail($id)->update($request->all());
        return redirect('');
    }

    public function delete($id)
    {
        Item::findOrFail($id)->delete();
        return redirect('');
    }

}
