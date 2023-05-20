@extends('layouts.main')
@section('content')
   <!-- Shop Cart Section Begin -->
   <section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    @if (!$products->count())
                    <div class="container-fluid  mt-100">
                        <div class="row">
                           <div class="col-md-12">
                             <div class="card">
                               <div class="card-body cart">
                                 <div class="col-sm-12 empty-cart-cls text-center">
                                    <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                                    <h3><strong>Your Cart is Empty</strong></h3>
                                    <h4>Add something to make me happy :)</h4>
                                    <a href="/shop" class="btn  btn-danger cart-btn-transform m-5" data-abc="true">Continue Shopping</a>
                                 </div>
                               </div>
                            </div>
                           </div>
                        </div>
                     </div>
                    @else
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="img/shop-cart/cp-1.jpg" alt="">
                                        <div class="cart__product__item__title">
                                            <h6>{{$product->name}}</h6>
                                            @php
                                                $avgRating=round($product->reviews->avg('rating'));
                                            @endphp
                                            <div class="rating">
                                                @for ($i = 0; $i < $avgRating; $i++)
                                                    <i class="fa fa-star" style="color:#ffb851"></i>
                                                @endfor
                                                @for ($i = 0; $i < 5 - $avgRating; $i++)
                                                    <i class="fa fa-star" style="color: #858883" ></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">{{$product->price}}</td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                            <input type="text" value={{$user->cart->cartItems()->Where('product_id',$product->id)->first()->quantity}}>
                                        </div>
                                    </td>
                                    @php
                                        $quantity = $user->cart->cartItems()->Where('product_id',$product->id)->first()->quantity;
                                        $price = $product->price;
                                        $total = $quantity * $price;
                                    @endphp
                                    <td class="cart__total">$ {{$total}}</td>
                                    <td class="cart__close">
                                        <a href="{{route('cart.delete.item', ['product_id' => $product->id])}}">
                                            <span class="icon_close"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="/shop">Continue Shopping</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                    <a href="#"><span class="icon_loading"></span> Update cart</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">Apply</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>$ 750.0</span></li>
                        <li>Total <span>$ 750.0</span></li>
                    </ul>
                    <a href="#" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
        @endif
    </div>

</section>
<!-- Shop Cart Section End -->



@endsection
