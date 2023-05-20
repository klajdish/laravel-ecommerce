<?php

namespace App\Http\Controllers;

use App\Models\Cart as CartModel;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class Cart extends Controller
{
    public function cart()
    {
               
        $user = User::find(Session::get('loginId'));

        if ($user) {
            $cartItems = $user->cart->cartItems()->with('product')->get();  
            
            $products = $cartItems->map(function ($cartItem) {
                return $cartItem->product;
            });

            return view('cart', compact('products','user')); 

        } else {
            return back()->with('fail', 'Login to proceed');
        } 
    }

    public function cartDeleteItem($product_id)
    {
        $user = User::find(Session::get('loginId'));
        $cartItem = $user->cart->cartItems()->where('product_id',$product_id);

        $result =  $cartItem->delete();

        if($result) {
            return redirect('cart')->with('success', 'You removed a product from you cart successfully');
        }else {
            return redirect('cart')->with('fail', 'Something went wrong');
        }
        
    }

    public function addToCart(Request $request)
    {
       
        if(Session::get('loginId')){

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

        }else{
            return back()->with('fail', 'Log in to proceed');
        }
    }
}
