<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\cartitem;
use App\Models\product;
use Illuminate\Http\Request;
use Session;

class checkout extends Controller
{
    public function index()
    {
        $userId = Session::get("cid");
        $cartData = cart::with('cartitem')->where('cust_id', $userId)
                                ->where('is_whishlist', false) 
                                ->get();
        $productIds = collect();
        foreach ($cartData as $cart) {
            $cartItems = cartitem::where('cart_id', $cart->id)->get();   
            $productIds = $productIds->merge($cartItems->pluck('product_id'));
        }

        $productData = product::whereIn('id', $productIds->unique())->get();
        return view('checkout', compact('cartData','productData'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
