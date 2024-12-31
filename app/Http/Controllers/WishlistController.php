<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\cartitem;
use App\Models\product;
use Session;

class WishlistController extends Controller
{
    public function remove_wishlist(string $id)
    {
        $user_id = Session::get("cid");

        if ($user_id) {
            $remove_wishlist = cartitem::where('product_id', $id)
                                    ->whereHas('cart', function($query) use ($user_id) {
                                        $query->where('cust_id', $user_id) 
                                                ->where('is_whishlist', true);
                                    })->first();

            if ($remove_wishlist) {
                $cart = $remove_wishlist->cart;

                $remove_wishlist->delete();

                $remainingItems = cartitem::where('cart_id', $cart->id)->count();

                if ($remainingItems == 0) {
                    $cart->delete();
                }

                return redirect()->route('addwishlist.index')->with('message', 'Product removed from your wishlist.');
            }

            return redirect()->route('addwishlist.index')->with('message', 'Product not found in your wishlist.');
        } else {
            return redirect("/login")->with('errorWishlist', 'You need to be logged in to remove items from your wishlist.');
        }

    }

    public function index()
    {
        $user_id = Session::get("cid"); 
        if (Session::has("cid")) {
            $wishlistData = cart::where('cust_id', $user_id)
                                ->where('is_whishlist', true) 
                                ->get(); 

            if ($wishlistData->isNotEmpty()) {
                $productIds = collect();
                foreach ($wishlistData as $cart) {
                    $cartItems = cartitem::where('cart_id', $cart->id)->get();   
                    $productIds = $productIds->merge($cartItems->pluck('product_id'));
                }

                $productData = product::whereIn('id', $productIds->unique())->get(); // Get unique products only   
                return view('wishlist', compact('wishlistData', 'productData'));
            }

            return view('wishlist', ['wishlistData' => null, 'productData' => []]);
        } else {
            
            return redirect('/login')->with('errorWishlist', 'Login and Check your wishlist products.');
        }
    }

    public function create()
    {
        //
    }

    public function store(string $id){
        if(Session::has('cid')) {
            $customerId = Session::get("cid");
    
            $existingWishlistItem = cartitem::whereHas('cart', function($query) use ($customerId) {
                $query->where('cust_id', $customerId)
                      ->where('is_whishlist', true); // Ensure we are checking only the wishlist
            })->where('product_id', $id)->first();
            
            if($existingWishlistItem) {
                return redirect()->back()->with('message', 'Product already exists in your wishlist.');
            } else {
                $cartData = cart::create([
                    'cust_id' => $customerId,
                    'total_amount' => "0.00",
                    'qty' => "1",
                    'is_whishlist' => true, // Indicate this cart is for the wishlist
                ]);
        
                cartitem::create([
                    'cart_id' => $cartData->id,
                    'product_id' => $id,
                ]);
        
                return redirect()->back()->with('message', 'Product added to your wishlist successfully.');
            }
        } else {
            return redirect("/login");
        }        
    }

    
    public function show(wishlist $wishlist)
    {
        //
    }


    public function edit(wishlist $wishlist)
    {
        //
    }


    public function update(Request $request, wishlist $wishlist)
    {
        //
    }


    public function destroy(wishlist $wishlist)
    {
        //
    }
}
