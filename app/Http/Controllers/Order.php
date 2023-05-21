<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order as OrderModel;
use App\Models\Coupon;
use App\Models\OrderItem;
use App\Models\OrderAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Order extends Controller
{
    
    public function checkout(Request $request){

        $user = User::find(Session::get('loginId'));

        if ($user) {
            $cartItems = $user->cart->cartItems()->with('product')->get();

            $products = $cartItems->map(function ($cartItem) {
                return $cartItem->product;
            });

            if($request->coupon){
                $couponId = $request->coupon;
                $coupon = Coupon::where('id', $couponId)->first();
                   
                // $coupon = json_decode($coupon);

                return view('checkout',compact('coupon','products','user'));         
            }else{
                return view('checkout',compact('products','user'));            
            }     
        } else {
            return back()->with('fail', 'Login to proceed');
        }  
    }

    public function addOrder(Request $request)
    {
        $user = User::where('id', Session::get('loginId'))->first();

        if($user){
            $validatedData = $request->validate([
                'state' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'street' => 'required|string|max:255',
                'zip_code' => 'required|string|max:10',
                'payment_method' => 'required'
            ], [
                'state.required' => 'The state field is required.',
                'city.required' => 'The city field is required.',
                'street.required' => 'The street field is required.',
                'zip_code.required' => 'The ZIP code field is required.',
                'payment_method.required' => 'The Payment method is required' 
            ]);
    
            $addressData = $validatedData;
            unset($addressData['payment_method']);
            $orderTotal = 0;

    
            $orderAddress = OrderAddress::create($addressData); 
    
            $order = new OrderModel;
            $order->user_id = Session::get('loginId');
            $order->address_id =  $orderAddress->id;
            $order->status_id = 1;
            $order->total = $orderTotal;
            $order->payment_method = $validatedData['payment_method'];
            $order->save();

            $cartItems = $user->cart->cartItems;

            $coupon = null;
            if($request->coupon){
                $coupon = Coupon::where('id', $request->coupon)->first();
            }

            foreach ($cartItems as $cartItem){
                $product = $cartItem->product;

                $orderItem = new OrderItem;
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $cartItem->quantity;
                $orderItem->price = $coupon ? $product->price - (($product->price / 100) * $coupon->discount) : $product->price;
                $orderItem->save();

                $orderTotal = $orderTotal + ($orderItem->price * $cartItem->quantity);

                $product->quantity -= $cartItem->quantity;
                $product->save();

                $cartItem->delete();
            }

            $order->total = $orderTotal;
            $order->save();


            return redirect('/cart')->with('success', 'Your order was placed succesfully! Please wait to be verifed and completed!');
        }
        return redirect('/cart')>with('fail', 'Something went wrong');
    }
}
