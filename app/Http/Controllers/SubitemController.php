<?php

namespace App\Http\Controllers;

use App\Image;
use App\ItemSubItem;
use Illuminate\Http\Request;
Use App\SubItem;

class SubitemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $data = SubItem::all();
        return view('subitems.show_subitem',compact('data'));

    }

    public function create()
    {
        return view('subitems.create_subitem');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price'=>'required|numeric',
        ]);

        if(isset($request->image)) {
            $encoded = base64_encode(file_get_contents($request->image->getrealpath()));
            $uniquid = uniqid();
            Image::create(['id'=>$uniquid,'image'=>$encoded]);
        }
        if ($request->is_topping == "true") {
            SubItem::create([
                'name' => $request->name,
                'price' => $request->price,
                'image_id' => $uniquid,
                'is_topping' => "1",
            ]);
        }
        else
        {
            SubItem::create([
                'name' => $request->name,
                'price' => $request->price,
                'image_id' => $uniquid,
                'is_topping' => "0"
            ]);
        }

        return redirect('subitems');
    }

    public function edit($id)
    {
        $item = SubItem::findOrFail($id);
        return view('subitems.edit_subitem',compact('item'));
    }

    public function update(Request $request, $id)
    {
        if($request->is_topping == "true") {
            SubItem::findOrFail($id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'is_topping' => "1"
            ]);
        }
        else
        {
            SubItem::findOrFail($id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'is_topping' => "0"
            ]);
        }

        if(isset($request->image)) {
            $encoded = base64_encode(file_get_contents($request->image->getrealpath()));
            $uniquid = uniqid();
            Image::create(['id'=>$uniquid,'image'=>$encoded]);
        }

        $item = SubItem::findOrFail($id);

        if(isset($request->image)) {
            $item->update(['image_id' => $uniquid]);
        }

        return redirect('subitems');
    }

    public function destroy($id)
    {
        SubItem::findOrFail($id)->delete();
        return redirect('subitems');
    }

    public function addItem(Request $request)
    {
//        dd($request);
        ItemSubItem::firstOrCreate(['item_id'=> $request->itemselect, 'subitem_id'=> $request->otherid]);
        return redirect('subitems');
    }
}
