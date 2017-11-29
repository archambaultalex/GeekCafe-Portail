<?php

namespace App\Http\Controllers;

use App\Image;
use GuzzleHttp\Client;
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

        return view('branches.create_branch');
    }

    public function store(Request $request)
    {
        $uniquid = 1;
        $client = new Client();

        $res = $client->get('http://maps.google.com/maps/api/geocode/json?address='.$request->location.'&sensor=false');
        $location = json_decode($res->getBody(), true)['results'][0]['geometry']['location'];

        if(isset($request->image)) {
            $encoded = base64_encode(file_get_contents($request->image->getrealpath()));
            $uniquid = uniqid();
            Image::create(['id'=>$uniquid,'image'=>$encoded]);
        }

        Branch::create([
            'location' => $request->location,
            'coordinates' => $location['lat'].','.$location['lng'],
            'email' => $request->email,
            'phone' => $request->phone,
            'manager_name' => $request->manager_name,
            'manager_email' => $request->manager_email,
            'manager_phone' => $request->manager_phone,
            'num_tax1' => "0",
            'num_tax2' => "0",
            'image_id' => $uniquid,
        ]);

        return redirect ('branches');
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        return view('branches.edit_branch',compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $uniquid = 1;
        $brench = Branch::findOrFail($id);
        $this->validate($request, [
            'location' => 'required',
            'email' => 'required',
            'phone' => 'required|phone:US,CA|',
            'manager_name' => 'required',
            'manager_email' => 'required',
            'manager_phone' => 'required|phone:US,CA|',
        ]);

        $client = new Client();

        $res = $client->get('http://maps.google.com/maps/api/geocode/json?address='.$request->location.'&sensor=false');
        $location = json_decode($res->getBody(), true)['results'][0]['geometry']['location'];

        if(isset($request->image)) {
            $encoded = base64_encode(file_get_contents($request->image->getrealpath()));
            $uniquid = uniqid();
            Image::create(['id'=>$uniquid,'image'=>$encoded]);
        }

        $brench->update([
            'location' => $request->location,
            'coordinates' => $location['lat'].','.$location['lng'],
            'email' => $request->email,
            'phone' => $request->phone,
            'manager_name' => $request->manager_name,
            'manager_email' => $request->manager_email,
            'manager_phone' => $request->manager_phone,
            'num_tax1' => "0",
            'num_tax2' => "0",
        ]);

        if(isset($request->image)) {
            $brench->update(['image_id' => $uniquid]);
        }
        return redirect('branches');
    }

    public function destroy($id)
    {
        Branch::findOrFail($id)->delete();
        return redirect('branches');
    }

}
