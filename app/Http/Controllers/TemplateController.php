<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\product;
use App\Models\client;

class TemplateController extends Controller
{
    public function index(){
        if(Session::has("cid")){
            $profileId = Session::get("cid");
            $clientProfile = client::find($profileId);
            return view("home",compact('clientProfile','profileId'));
        }else{
            return view("home");
        }
    }

    public function shop(){
        $shop = product::with('images')->get();
        return view('shop',compact('shop'));
    }

    public function about(){
        return view("about");
    }

    public function blog(){
        return view("blog");
    }

    public function cart(){
        if(Session::has("cid")){
            return view("cart");
        }else{
            return redirect("/login")->with("cartError","Want To Login For Your Cart Icon");
        }
    }

    public function checkout(){
        return view("checkout");
    }

    public function thanks(){
        return view("thanks");
    }

    public function login(){
        return view("login");
    }

    public function check_login(Request $request)
    {
        $request->validate([
            "username"=> "required",
            "password"=> "required",
        ]);

        $admin = DB::table('admins')->where('username', $request->username)->first();
        $client = DB::table('clients')->where('email', $request->username)->first();

        if ($admin && $admin->password === $request->password) {
            return redirect('/dash');
        }else{
            if($client && $client->password == $request->password){
                Session::put('cid', $client->id);
                return redirect('/shop');
            }else{
                return redirect('/login')->with('error', 'Invalid email or password.');
            }
        }
    }

    public function dash(){
        return view("admin.dashboard");
    }
    public function addproduct(){
        return view("admin.addproduct");
    }
    
    public function category(){
        return view("admin.addcategory");
    }

    public function ckeckout_verify(){
        $userId = Session::get("cid");
        $productData = client::select('email')->where("id",$userId)->first();


    }
}
