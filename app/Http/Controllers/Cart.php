<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Cart as CartModel;
use Illuminate\Support\Facades\Session;

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

    public function updateCart(Request $request)
    {
        $productIds = $request->input('product_ids');
        $quantities = $request->input('quantities');

        for ($i = 0; $i < count($productIds); $i++) {
            $productId = $productIds[$i];
            $newQuantity = $quantities[$i];

            // Retrieve the cart item using $productId
            $cartItem = CartItem::where('product_id', $productId)->first();

            if ($cartItem) {
                // Update the quantity in the cart_items table
                $cartItem->quantity = $newQuantity;
                $cartItem->save();
            }
        }

        session()->flash('success', 'Success! You updated your cart.');
        return response()->json(['success' => true]);
    }

    public function applyDiscount(Request $request)
    {
        $validatedData = $request->validate([
            'code' => [
                'required',
                Rule::exists('coupons')->where(function ($query) {
                    $query->where('expiration_date', '>', now());
                }),
            ],
            // Other validation rules for your request data
        ]);


        // Process the coupon code
        $couponCode = $validatedData['code'];
        $coupon = null;

        if (!empty($couponCode)) {
            // Retrieve the coupon from the database
            $coupon = Coupon::where('code', $couponCode)
                ->where('expiration_date', '>', now())
                ->first();

            if ($coupon) {
                return redirect('cart')->with(compact('coupon'))->with('success', 'Your "' . $coupon->code . '" coupon was applied successfully!');
            }
        }
        return redirect('cart')->with('fail', 'This coupon has expired or does not exist');


    }
}
