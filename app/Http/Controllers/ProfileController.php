<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 9/26/2017
 * Time: 10:51 AM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Image;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            //testdsadsadadsa
    }

    public function edit($id)
    {
        $profile = User::findOrFail($id);
        return view('profile.edit_profile',compact('profile'));
    }

    public function update(Request $request, $id)
    {
        if(isset($request->image)) {
            $encoded = base64_encode(file_get_contents($request->image->getrealpath()));
            $uniquid = uniqid();
            Image::create(['id'=>$uniquid,'image'=>$encoded]);
        }

        $user = User::findOrFail($id);
        $user->update($request->all());
        if(isset($request->image)) {
            $user->update(['image_id' => $uniquid]);
        }
        return redirect('/home');
    }
}