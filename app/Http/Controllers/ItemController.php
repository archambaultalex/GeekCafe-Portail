<?php

namespace App\Http\Controllers;

use App\Image;
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
        return view('inventaire.create_item');
    }

    public function store(Request $request)
    {
        $uniquid = 1;
        $this->validate($request, [
            'name' => 'required',
            'description'=>'required',
            'typeid' => 'required',
            'quantity'=>'required|numeric'
        ]);

        if(isset($request->image)) {
            $encoded = base64_encode(file_get_contents($request->image->getrealpath()));
            $uniquid = uniqid();
            Image::create(['id'=>$uniquid,'image'=>$encoded]);
        }


        Item::create([
            'name' => $request->name,
            'description'=>$request->description,
            'type_id'=>$request->typeid,
            'image_id'=>$uniquid,
            'quantity'=>$request->quantity,
        ]);
        return redirect('/inventaire');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('inventaire.edit_item',compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description'=>'required',
            'typeid' => 'required',
            'quantity'=>'required|numeric'
        ]);

        if(isset($request->image)) {
            $encoded = base64_encode(file_get_contents($request->image->getrealpath()));
            $uniquid = uniqid();
            Image::create(['id'=>$uniquid,'image'=>$encoded]);
        }

        $item = Item::findOrFail($id);
        $item->update($request->all());
        if(isset($request->image)) {
            $item->update(['image_id' => $uniquid]);
        }

        return redirect('inventaire');
    }

    public function destroy($id)
    {
        Item::findOrFail($id)->delete();
        return redirect('inventaire');
    }

}
