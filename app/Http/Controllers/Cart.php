<?php

namespace App\Http\Controllers;

use App\Models\Cart as CartModel;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Cart extends Controller
{
    public function cart()
    {


        return view('cart');
    }

    public function addToCart(Request $request)
    {
        $cart = CartModel::where('user_id',Session::get('loginId'))->first();

        if(!$cart) {
            $cart = new CartModel();
            $cart->user_id = Session::get('loginId');
            $cart->save();
        }


        $cartItem = $cart->cartItems()->where('product_id', $request->product_id)->first();
        $result = false;

        if($cartItem) {
            $cartItem->quantity += $request->quantity;
            $result = $cartItem->save();
        }else {
            $cartItem = new CartItem();
            $cartItem->cart_id = $cart->id;
            $cartItem->product_id = $request->product_id;
            $cartItem->quantity = $request->quantity;
            $result = $cartItem->save();
        }

        if($result) {
            return back()->with('success', 'Success! You added a product in cart.');
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }
}
