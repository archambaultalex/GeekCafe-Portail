<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $client = Client::all()->where('device_token','iphone');
        return view('client.show_clients_ios',compact('client'));
    }
}
