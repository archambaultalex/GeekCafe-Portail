<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 9/26/2017
 * Time: 10:51 AM
 */

namespace App\Http\Controllers;
use App\User;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id)
    {
        $profile = User::findOrFail($id);
        return view('profile.edit_profile',compact('profile'));
    }
}