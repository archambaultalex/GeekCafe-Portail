<?php

namespace App\Http\Controllers;

use App\Image;
use App\ItemPrice;
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
        if($request->typeid == 2)
        {
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'typeid' => 'required',
                'prixpet' => 'required|numeric',
            ]);
        }
        else {
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'typeid' => 'required',
                'prixpet' => 'required|numeric',
                'prixmoy' => 'required|numeric',
                'prixgrd' => 'required|numeric',
            ]);
        }

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
        ]);

        $itemid = Item::all()->where('name','==',$request->name)->first()->id;

        if($request->typeid == 3)
        {
            ItemPrice::create([
                'price' => $request->prixpet,
                'item_id' => $itemid,
                'size_id' => 4
            ]);

            ItemPrice::create([
                'price' => $request->prixmoy,
                'item_id' => $itemid,
            'size_id' => 5
            ]);

            ItemPrice::create([
                'price' => $request->prixgrd,
                'item_id' => $itemid,
            'size_id' => 6
            ]);
        }
        else if($request->typeid == 4)
        {
            ItemPrice::create([
                'price' => $request->prixpet,
                'item_id' => $itemid,
                'size_id' => 6
            ]);

            ItemPrice::create([
                'price' => $request->prixmoy,
                'item_id' => $itemid,
                'size_id' => 7
            ]);

            ItemPrice::create([
                'price' => $request->prixgrd,
                'item_id' => $itemid,
                'size_id' => 8
            ]);
        }
        else if ($request->typeid == 2) {
            ItemPrice::create([
                'price' => $request->prixpet,
                'item_id' => $itemid,
                'size_id' => 1
            ]);
        }
        else {
            ItemPrice::create([
                'price' => $request->prixpet,
                'item_id' => $itemid,
            'size_id' => 1
            ]);

            ItemPrice::create([
                'price' => $request->prixmoy,
                'item_id' => $itemid,
            'size_id' => 2
            ]);

            ItemPrice::create([
                'price' => $request->prixgrd,
                'item_id' => $itemid,
            'size_id' => 3
            ]);
        }
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
