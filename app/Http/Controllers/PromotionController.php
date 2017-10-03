<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;
use App\Item;

class PromotionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        $promotion = Promotion::all();
        return view('promotions.show_promotion',compact('promotion'));
    }

    public function create($id)
    {
        $item = Item::findOrFail($id);
        return view('promotions.create_promotion',compact('item'));
    }

    public function store(Request $request)
    {
        Promotion::created($request->all());
        return redirect('/promotions');
    }

    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('promotions.edit_promotion',compact('promotion'));
    }

    public function update(Request $request,$id)
    {

        Promotion::findOrFail($id)->update($request->all());
        return redirect('/promotions');
    }

    public function destroy($id)
    {
        Promotion::findOrFail($id)->delete();
        return redirect('/promotions');
    }


}
