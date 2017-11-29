<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Image;
class BranchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Branch::all();
        return view ('branches.show_branch',compact('data'));
    }


    public function create()
    {
        return view('Branches.create_branch');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'location' => 'required',

        ]);
        if(isset($request->image)) {
            $encoded = base64_encode(file_get_contents($request->image->getrealpath()));
            $uniquid = uniqid();
            Image::create(['id'=>$uniquid,'image'=>$encoded]);
        }
        Branch::create([
            'location' => $request->location,
            'email' => $request->email,
            'phone' => $request->phone,
            'manager_name' => $request->manager_name,
            'manager_email' => $request->manager_email,
            'manager_phone' => $request->manager_phone,
            'image_id' => $uniquid,
        ]);


        return redirect ('branches');
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        return view('Branches.edit_branch',compact('branch'));
    }

    public function update(Request $request, $id)
    {
        return redirect('branches');
    }

    public function destroy($id)
    {
        Branch::findOrFail($id)->delete();
        return redirect('branches');
    }

}
