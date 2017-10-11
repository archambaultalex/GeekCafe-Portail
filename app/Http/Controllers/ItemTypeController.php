<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\ItemType;

class ItemTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $data = ItemType::all();
        return view('show_data',compact('date'));

    }

    public function create()
    {
        return view('',compact('item'));
    }

    public function store(Request $request)
    {
        ItemType::create($request->all());
        return redirect('');
    }

    public function edit($id)
    {
        $item = ItemType::findOrFail($id);
        return view('',compact('item'));
    }

    public function update(Request $request, $id)
    {
        ItemType::findOrFail($id)->update($request->all());
        return redirect('');
    }

    public function delete($id)
    {
        ItemType::findOrFail($id)->delete();
        return redirect('');
    }
}
