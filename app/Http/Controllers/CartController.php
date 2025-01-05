<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\cartitem;
use App\Models\product;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function remove_cart(string $id)
    {
        $user_id = Session::get("cid");

        if ($user_id) {
            $remove_cart = cartitem::where('product_id', $id)
                                    ->whereHas('cart', function($query) use ($user_id) {
                                        $query->where('cust_id', $user_id) 
                                                ->where('is_whishlist', false);
                                    })->first();

            if ($remove_cart) {
                $cart = $remove_cart->cart;

                $remove_cart->delete();

                $remainingItems = cartitem::where('cart_id', $cart->id)->count();

                if ($remainingItems == 0) {
                    $cart->delete();
                }

                return redirect()->route('addcart.index')->with('message', 'Product removed from your cart.');
            }

            return redirect()->route('addcart.index')->with('message', 'Product not found in your cart.');
        } else {
            return redirect("/login")->with('errorWishlist', 'You need to be logged in to remove items from your wishlist.');
        }

    }
    public function index()
    {
        $user_id = Session::get("cid"); 
        if (Session::has("cid")) {
            $cartData = cart::where('cust_id', $user_id)
                                ->where('is_whishlist', false) 
                                ->get(); 
            if ($cartData->isNotEmpty()) {
                $productIds = collect();
                foreach ($cartData as $cart) {
                    $cartItems = cartitem::where('cart_id', $cart->id)->get();   
                    $productIds = $productIds->merge($cartItems->pluck('product_id'));
                }

                $productData = product::whereIn('id', $productIds->unique())->get(); 
                return view('cart', compact('cartData', 'productData'));
            }
            return view('cart', ['cartData' => null, 'productData' => []]);
        } else {
            return redirect('/login')->with('errorWishlist', 'Login and Check your Cart products.');
        } 
    }


    
    public function create()
    {
        //
    }


    public function store(string $id)
    {
        $price = product::find($id);

        if (Session::has('cid')) {
            $customerId = Session::get("cid");

            $existingWishlistItem = cartitem::whereHas('cart', function ($query) use ($customerId) {
                $query->where('cust_id', $customerId)
                    ->where('is_whishlist', false);
            })->where('product_id', $id)->first();
            
            if ($existingWishlistItem) {
                return redirect()->back()->with('message', 'Product already exists in your cart.');
            } else {
                $cartData = cart::create([
                    'cust_id' => $customerId,
                    'total_amount' => $price->price,
                    'qty' => "1",
                    'is_whishlist' => false,
                ]);
        
                cartitem::create([
                    'cart_id' => $cartData->id,
                    'product_id' => $id,
                ]);
                return redirect()->back()->with('message', 'Product added to your Cart.');
            }
        } else {
            return redirect("/login");
        }
    }



    public function show(cart $cart)
    {
        //
    }

    
    public function edit(cart $cart)
    {
        //
    }

    
    public function update(Request $request,string $id)
    {
        $cart_id = cart::find($request->cartId);
        $product = product::find($id);
  
        $cart_id->qty = $request->quantity;
        $cart_id->total_amount = $product->price * $request->quantity;
        $cart_id->save();

        return redirect()->route('addcart.index');
    }


    public function destroy(cart $cart,string $id)
    {
        //
    }
}
