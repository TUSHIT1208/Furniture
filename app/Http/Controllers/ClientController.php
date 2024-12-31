<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function logout(){
        if(Session::has("cid")){
            Session::forget("cid");
            return view("login");
        }else{
            return view("login");
        }
    }

    public function index()
    {
        $clients = Client::all();
        return view("admin.user", compact("clients"));
    }


    public function create()
    {
        return view("login");
    }

    public function store(Request $request)
    {
        $request->validate( [
            'username'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required|alpha_num',
            'phone'=> ['required', 'regex:/^\+?[1-9]\d{1,14}$/'],
            'house'=> 'required',
        ]);

        Client::create([
            "name"=>$request->username,
            "password"=>$request->password,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "address"=>$request->house,
        ]);
        return redirect()->route('client.create')->with('success','Register Successfully');
    }


    public function show(Client $client)
    {
        //
    }
    public function edit(Client $client)
    {
        //
    }


    public function update(Request $request, Client $client)
    {
        //
    }


    public function destroy(Client $client)
    {
        //
    }
}
