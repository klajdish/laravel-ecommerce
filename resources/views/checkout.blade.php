@extends('layouts.main')
@section('content')
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                here to enter your code.</h6>
            </div>
        </div>
        <form action="{{route('add-order')}}" method="POST" class="checkout__form">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <h5>Billing detail</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Country/State <span>*</span></p>
                                <input type="text" name="state">
                            </div>
                            <div class="checkout__form__input">
                                <p>Town/City <span>*</span></p>
                                <input type="text" name="city">
                            </div>
                            <div class="checkout__form__input">
                                <p>Street</p>
                                <input type="text" name="street">
                            </div>
                            <div class="checkout__form__input">
                                <p>Postcode/Zip <span>*</span></p>
                                <input type="text" name="zip_code">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout__order">
                        <h5>Your order</h5>
                        <div class="checkout__order__product">
                            <ul>
                                <li>
                                    <span class="top__text">Product</span>
                                    <span class="top__text__right">Total</span>
                                </li>

                                @php
                                 $totalCartPrice = 0;
                                @endphp

                                @foreach($products as $product)
                                @php
                            
                                    $productPrice = $product->price;
                                    if(isset($coupon)){
                                        $productPrice = $product->price - ($product->price / 100 * $coupon->discount);
                                    }

                                    $quantity = $user->cart->cartItems()->where('product_id',$product->id)->first()->quantity;
                                    $total = $quantity * $productPrice;
                                    $totalCartPrice += $total;
                                @endphp

                                    <li> {{$product->name}} ({{ $quantity}})  <span> {{$total}}</span></li>

                                @endforeach
                               
                            </ul>
                        </div>
                        <div class="checkout__order__total">
                            <ul>
                                <li>Subtotal <span>${{$totalCartPrice}}</span></li>
                                <li>Total <span>${{$totalCartPrice}}</span></li>
                            </ul>
                        </div>
                        <div class="checkout__order__widget">
                            <label for="paypal">
                                PayPal
                                <input type="checkbox" name="payment_method" value="PayPal" checked id="paypal">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    
                        @if(isset($coupon))
                        <input type="hidden" name="coupon" value="{{$coupon->id}}">
                        @endif    
                        <button type="submit" class="site-btn">Place order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </section>




@endsection