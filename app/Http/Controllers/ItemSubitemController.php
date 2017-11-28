<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\ItemSubItem;

class ItemSubitemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $data = ItemSubItem::all();
        return view('show_data',compact('date'));

    }

    public function create()
    {
        return view('',compact('item'));
    }

    public function store(Request $request)
    {
        ItemSubItem::create($request->all());
        return redirect('');
    }

    public function edit($id)
    {
        $item = ItemSubItem::findOrFail($id);
        return view('',compact('item'));
    }

    public function update(Request $request, $id)
    {
        ItemSubItem::findOrFail($id)->update($request->all());
        return redirect('');
    }

    public function delete($id)
    {
        ItemSubItem::findOrFail($id)->delete();
        return redirect('');
    }

}
