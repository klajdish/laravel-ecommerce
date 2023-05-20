@extends('layouts.main')
<style>
    .cart__product__item  img{
        width: 95px;
        height: 100px;
    }
    .icon_close {
        font-size: 22px;
        background-color: #c3c3c3;
        padding: 7px;
        border-radius: 50%;
        justify-content: center;
        align-items: center;
        justify-content: flex;
        color: white;
    }
    .icon_close:focus,  .icon_close:hover{
        color: white;
    }
    .old-price {
        font-size: 16px;
        color: #b1b0b0;
        text-decoration: line-through;
        margin-left: 10px;
        display: inline-block;
    }
</style>

@section('content')
   <!-- Shop Cart Section Begin -->
   <section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="my-4">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <div class="my-4">
                          <div class="nochanges">

                          </div>
                    </div>
                    @if(Session::has('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                    @endif
                </div>
            </div>
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
                            @php
                                $totalCartPrice = 0;
                            @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="{{asset($product->image)}}" alt="">
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
                                    @php
                                        $productPrice = session('coupon') ? $product->price - ($product->price / 100 * session('coupon')->discount) : $product->price;
                                        $productPrice =  number_format($productPrice, 2);
                                    @endphp
                                    <td class="cart__price">
                                        {{$productPrice}}
                                        @if(session('coupon'))
                                            <span class="old-price">{{$product->price}}</span>
                                        @endif
                                    </td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                            <input type="text" class="quantity-input" data-product-id="{{ $product->id }}" value="{{$user->cart->cartItems()->where('product_id',$product->id)->first()->quantity}}">
                                        </div>
                                    </td>
                                    @php
                                        $quantity = $user->cart->cartItems()->Where('product_id',$product->id)->first()->quantity;
                                        $total = $quantity * $productPrice;
                                        $totalCartPrice += $total;
                                    @endphp
                                    <td class="cart__total">$ {{$total}}</td>
                                    <td class="cart__close">
                                        <a class="icon_close" href="{{route('cart.delete.item', $product->id)}}" onclick="event.preventDefault(); deleteReview(event)">
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
                    <a style="cursor: pointer;" id="update-all-quantities"><span class="icon_loading"></span> Update cart</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">
                    <h6>Discount codes</h6>
                    <form action="{{route('coupon')}}" method="POST">
                        @csrf
                        <input type="text" name='code' value="{{(session('coupon')) ? session('coupon')->code : ''}}" placeholder="Enter your coupon code">
                        <span id="code-error" class="text-danger error-msg my-2 ml-3">
                            @error('code')
                                {{$message}}
                            @enderror
                        </span>
                        <button type="submit" class="site-btn">Apply</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>$ {{$totalCartPrice}}</span></li>
                        <li>Total <span>$ {{$totalCartPrice}}</span></li>
                    </ul>
                    <a href="#" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
        @endif
    </div>

</section>
<!-- Shop Cart Section End -->

<script>
    function deleteReview(event) {
        event.preventDefault();

        // Get the delete URL from the link's href attribute
        const deleteUrl = event.target.getAttribute('href');
        console.log(event);

        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: 'Once deleted, you will not be able to recover this review!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the delete form
                const form = document.createElement('form');
                form.action = deleteUrl;
                form.method = 'POST';
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();
            }
        });
    }


        $('#update-all-quantities').click(function() {
            var productIds = [];
            var quantities = [];

            $('.quantity-input').each(function() {
                var productId = $(this).data('product-id');
                var quantity = $(this).val();
                productIds.push(productId);
                quantities.push(quantity);
            });

            updateQuantities(productIds, quantities);
        });

        function updateQuantities(productIds, quantities) {
            $.ajax({
                method: 'POST',
                url: "{{route('update-cart')}}",
                data: {
                    product_ids: productIds,
                    quantities: quantities,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle the error, if any
                }
            });
        }




</script>

@endsection
