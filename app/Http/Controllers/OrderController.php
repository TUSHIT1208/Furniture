<?php

namespace App\Http\Controllers;

use App\Models\cartitem;
use App\Models\order;
use App\Models\orderitem;
use App\Models\product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = orderitem::with('order')->paginate(3);

        $products = $orders->pluck('product_id');
        $productImages = product::with('images')->whereIn('id', $products)->get();

        $orderIds = $orders->pluck('orderid');
        $orderData = order::whereIn('id', $orderIds)->get();
        return view('admin.order', compact('orders','productImages','orderData'));
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cartIds = $request->input('cartIds');

        $request->validate( [
            'country' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'pincode' => 'required|numeric|digits:6',
            'email' => 'required|email|max:255',
        ]);

        foreach ($cartIds as $cartId) {
            $cartItem = cartitem::find($cartId);

            if ($cartItem && $cartItem->cart) { 
                $cart = $cartItem->cart; 

                $order = order::create([
                    'cartitem_id' => $cartItem->id,
                    'country' => $request->input('country'),
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'address' => $request->input('address'),
                    'state' => $request->input('state'),
                    'pincode' => $request->input('pincode'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                ]);

                orderitem::create([
                    'orderid' => $order->id,
                    'product_id' => $cartItem->product_id, 
                    'quantity' => $cart->qty, 
                    'total' => $cart->total_amount,
                ]);
            }
        }
        return redirect('/thankyou');
    }
    public function show(order $order)
    {
        //
    }

    public function edit(order $order)
    {
        //
    }

    public function update(Request $request, order $order)
    {
        //
    }

    public function destroy(order $order)
    {
        //
    }
}
