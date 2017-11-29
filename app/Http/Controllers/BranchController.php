<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
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
            'name' => 'required',
            'city' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'fax' => 'required',
            'phone_no_fee' => 'required',
        ]);

        $client = new \GuzzleHttp\Client();

        $res = $client->get('http://maps.google.com/maps/api/geocode/json?address='.$request->address.'&sensor=false');
        $location = json_decode($res->getBody(), true)['results'][0]['geometry']['location'];

        if(isset($request->image)) {
            $encoded = base64_encode(file_get_contents($request->image->getrealpath()));
            $uniquid = uniqid();
            Image::create(['id'=>$uniquid,'image'=>$encoded]);
        }

        Branch::create([
            'name' => $request->name,
            'city' => $request->city,
            'address' => $request->address,
            'email' => $request->email,
            'coordinates' => $location['lat'].','.$location['lng'],
            'phone' => $request->phone,
            'fax' => $request->fax,
            'phone_no_fee' => $request->phone_no_fee,
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
