@extends('layouts.main')
@section('content')
<style>
    .checkout__form select {
        height: 50px;
        width: 100%;
        border: 1px solid #e1e1e1;
        border-radius: 2px;
        margin-bottom: 25px;
        font-size: 14px;
        padding-left: 20px;
        color: #666666;
        background-color: white;
    }
</style>
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="coupon__link"><span class="icon_tag_alt1"></span>
                    <a href="#">
                        {{-- Have a coupon?</a> Click here to enter your code. --}}
                    </a>
                </h6>
            </div>
        </div>
        <form action="{{route('add-order')}}" method="POST" class="checkout__form" id="checkout-form">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <h5>Billing detail</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Country/State <span>*</span></p>
                                <select name="state" id="state" class="mb-1">
                                    <option value="">Select State</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                                <span  class="invalid-feedback text-danger text-start my-1 d-flex error-msg pb-2">
                                    @error('state')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="checkout__form__input">
                                <p>Town/City <span>*</span></p>
                                <select name="city" id="city" class="mb-1">
                                </select>
                                <span class="invalid-feedback text-danger text-start my-1 d-flex error-msg pb-2">
                                    @error('city')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="checkout__form__input">
                                <p>Street</p>
                                <input type="text" class="mb-1" name="street" id="street">
                                <span  class="invalid-feedback text-danger text-start my-1 d-flex error-msg pb-2">
                                    @error('street')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="checkout__form__input">
                                <p>Postcode/Zip <span>*</span></p>
                                <input type="text" class="mb-1" name="zip_code" id="zip_code">
                                <span  class="invalid-feedback text-danger text-start my-1 d-flex error-msg pb-2">
                                    @error('zip_code')
                                        {{$message}}
                                    @enderror
                                </span>
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
                                <input type="checkbox" name="payment_method" id="paypal" value="PayPal">
                                <span class="checkmark"></span>
                                <span  class="invalid-feedback text-danger text-start my-1 d-flex error-msg pb-2">
                                    @error('payment_method')
                                        {{$message}}
                                    @enderror
                                </span>
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
    <script>
        $(document).ready(function() {
            $('#state').change(function() {
                var country = $(this).val();
                if (country) {
                    $.ajax({
                        url: '/get-cities',
                        type: 'POST',
                        data: { country: country },
                        dataType: 'json',
                        success: function(data) {
                            var cityOptions = '<option value="">Select a city</option>';
                            $.each(data, function(key, city) {
                                cityOptions += '<option value="' + city + '">' + city + '</option>';
                            });
                            $('#city').html(cityOptions);
                        }
                    });
                } else {
                    $('#city').html('<option value="">Select a city</option>');
                }
            });

            $("#checkout-form").validate({
                rules: {
                    state: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    street: {
                        required: true,
                        maxlength: 255
                    },
                    zip_code: {
                        required: true,
                        maxlength: 10
                    },
                    paypal: {
                        required: true
                    }
                },
                messages: {
                    state: {
                        required: "The state field is required.",
                    },
                    city: {
                        required: "The city field is required.",
                    },
                    street: {
                        required: "The street field is required.",
                        maxlength: "The street field cannot exceed 255 characters."
                    },
                    zip_code: {
                        required: "The ZIP code field is required.",
                        maxlength: "The ZIP code field cannot exceed 10 characters."
                    },
                    paypal: {
                        required: "Please choose a payment method."
                    }
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.siblings('.invalid-feedback'));
                }
            });
        });


    </script>
@endsection
