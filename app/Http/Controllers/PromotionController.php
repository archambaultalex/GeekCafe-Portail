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

    public function index(){
        $promotion = Promotion::all();
        return view('promotions.show_promotion',compact('promotion'));
    }

    public function test($id)
    {
        $item = Item::findOrFail($id);
        return view('promotions.create_promotion',compact('item'));
    }

    public function create($id)
    {
        $item = Item::findOrFail($id);
        return view('promotions.create_promotion',compact('item'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'NB/utlisateur' => 'numeric',
            'start_date' => 'required',
            'end_date'=>'required|after:start_date'
        ]);

        Promotion::create($request->all());
        return redirect('/promotions');
    }

    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('promotions.edit_promotion',compact('promotion'));
    }

    public function update(Request $request,$id)
    {

        $this->validate($request, [
            'Nb/utilisateur' => 'numeric',
            'start_date' => 'required',
            'end_date'=>'required|after:start_date'
        ]);

        Promotion::findOrFail($id)->update([
            'description'=>$request->description,
            'available_per_user'=>$request->parUser,
            'reduction'=>$request->reduction,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date
        ]);



        return redirect('/promotions');
    }

    public function destroy($id)
    {
        Promotion::findOrFail($id)->delete();
        return redirect('/promotions');
    }


}
