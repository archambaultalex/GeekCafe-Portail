<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 9/26/2017
 * Time: 10:51 AM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation;
use App\User;
use App\Image;
use Illuminate\Validation\Rule;



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
        $this->validate($request,[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'gender' => 'required|string|max:255',
            'birth_date' => 'required|date|max:255',
            'phone_number' => 'required|string|phone:US,CA|',
        ]);

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