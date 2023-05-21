@extends('layouts.main')
@section('content')
<!-- Breadcrumb Begin -->
{{-- <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="#">Women’s </a>
                    <span>Essential structured blazer</span>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<style>
.rating-box {
  padding: 25px 50px;
  border-radius: 25px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.08);
  text-align: center;
}
.rating-box h3 {
  font-size: 22px;
  font-weight: 600;
  margin-bottom: 20px;
}
.rating-box .stars {
  display: flex;
  align-items: center;
  gap: 25px;
}
.stars i {
  font-size: 35px;
  color: #b5b8b1;
  transition: all 0.2s;
  cursor: pointer;
}
.stars i.active {
  color: #ffb851;
  transform: scale(1.2);
}

.stars input {
    display: none;
}

.cart-btn-2 {
    display:flex;
    font-size: 14px;
    color: #ffffff;
    background: #ca1515;
    font-weight: 600;
    text-transform: uppercase;
    padding: 14px 30px 15px;
    border-radius: 50px;
    margin-right: 10px;
    margin-bottom: 10px;
}
</style>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-rmDr4LCmzdQ9MBuJg8Ab5lnugLnyRVy1D8VifOFsYiU1T+bW4PRaXLoquUJ1ZT39OkxLnCrhUUp7o9+QaNNffg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

<section class="product-details spad">
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
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">
                        <a class="pt active" href="#product-1">
                            <img src="{{asset($product->image)}}" alt="">
                        </a>
                        <a class="pt" href="#product-2">
                            <img src="{{asset($product->image)}}" alt="">
                        </a>
                        <a class="pt" href="#product-3">
                            <img src="{{asset($product->image)}}" alt="">
                        </a>
                    </div>
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-hash="product-1" class="product__big__img" src="{{asset($product->image)}}" alt="">
                            <img data-hash="product-2" class="product__big__img" src="{{asset($product->image)}}" alt="">
                            <img data-hash="product-3" class="product__big__img" src="{{asset($product->image)}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3>{{$product->name}} <span>BARCODE: {{$product->barcode}}</span></h3>

                   @php
                       $avgRating=round($product->reviews->avg('rating'));
                    //    dd(get_class_methods( $product->reviews));
                   @endphp

                    <div class="rating">
                        @for ($i = 0; $i < $avgRating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor

                        @for ($i = 0; $i < 5 - $avgRating; $i++)
                            <i class="fa fa-star" style="color: #888383" ></i>
                        @endfor

                        <span>( {{$product->reviews->count()}} reviews )</span>

                    </div>
                    <div class="product__details__price">$
                        {{$product->price}}
                        {{-- <span>$ 83.0</span> --}}
                    </div>
                    <p>
                        {{ strlen($product->description) > 140 ? substr($product->description, 0, 140) . '..' : $product->description}}
                    </p>
                    @if ($product->quantity)
                        <div class="product__details__button">
                            <form action="{{route('add-to-cart')}}" id="add-to-cart" method="POST">
                            @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="quantity">
                                    <span>Quantity:</span>
                                    <div class="pro-qty">
                                        <input type="text" name="quantity" id="quantity" value="1">
                                    </div>
                                </div>
                                <button type="submit" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</button>
                            </form>
                            {{-- <ul>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                            </ul> --}}
                        </div>
                        <div class="invalid-feedback text-danger text-start my-1 d-flex error-msg">
                            @error('quantity')
                                {{$message}}
                            @enderror
                        </div>
                    @endif
                    <div class="product__details__widget">
                        <ul>
                            <li>
                                <span>Availability:</span>
                                <div class="stock__checkbox">
                                    <label  class="pl-0" for="stockin">
                                        {{$product->quantity ? 'In Stock (' . $product->quantity .')'  : 'Out Of Stock'}}
                                    </label>
                                </div>
                            </li>
                            <li>
                                <span>Color:</span>
                                <div class="color__checkbox">
                                    <label for="red">
                                        {{-- <input type="radio" name="color__radio" id="" checked> --}}
                                        <span class="checkmark" style="background: {{$product->color->code}}"></span>
                                    </label>

                                </div>
                            </li>
                            <li>
                                <span>Size:</span>
                                <div class="size__btn">
                                    <label for="xs-btn" class="active">
                                        {{-- <input type="radio" id="xs-btn"> --}}
                                        {{$product->size->code}}
                                    </label>

                                </div>
                            </li>
                            <li>
                                <span>Promotions:</span>
                                <p>Free shipping</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


             @if(Session::get('loginId'))
                @php
                    $userId = Session::get('loginId'); // get the current user's ID
                    $review = $product->reviews()->where('user_id', $userId)->first();

                    $reviewExists = false;
                    if ($review && $review->id) {
                        $reviewExists = true;
                    };
                @endphp
                @if ($reviewExists)
                    <div class="col-12 mt-5">
                        <form action={{route('edit-review')}} id="edit-review"  method="POST">
                            @csrf
                            <div class="rating-box">
                                <input type="hidden" name="review_id" value={{$review->id}}>
                                <div class="d-flex justify-content-end">
                                    <div class="col-7 d-flex justify-content-between">
                                        <h3>Leave a review</h3>
                                        <a href="{{ route('destory-review', $review->id) }}"
                                            class="delete-review text-danger"
                                            onclick="event.preventDefault(); deleteReview(event)">
                                            Delete Review
                                         </a>
                                    </div>
                                </div>
                                <div class="stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <input type="radio" id="star{{$i}}" {{$review->rating == $i ? 'checked' : ''}} name="rating" id="rating" value="{{$i}}">
                                        <label for="star{{$i}}"><i class="fas fa-star {{$review->rating >= $i ? 'active' : ''}}"></i></label>
                                    @endfor
                                </div>
                                <span  id="rating-error" class="invalid-feedback text-danger text-start my-1 d-flex error-msg">
                                    @error('rating')
                                        {{$message}}
                                    @enderror
                                </span>
                                <div>
                                    <textarea class="w-100 my-3" name="comment" id="comment" cols="30" rows="4" placeholder="Leave a comment!">{{$review->comment}}</textarea>
                                    <div class="invalid-feedback text-danger text-start my-1 d-flex error-msg">
                                        @error('comment')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <button class="cart-btn-2" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="col-12 mt-5">
                        <form action={{route('add-review')}} id="add-review" method="POST">
                            @csrf
                            <div class="rating-box">
                                <input type="hidden" name="product_id" value={{$product->id}}>
                                <h3>Leave a review</h3>
                                <div class="stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <input type="radio" id="star{{$i}}" name="rating" id="rating" value="{{$i}}">
                                        <label for="star{{$i}}"><i class="fas fa-star"></i></label>
                                    @endfor
                                </div>
                                <span  id="rating-error" class="text-danger d-flex text-start my-1 error-msg">
                                    @error('rating')
                                        {{$message}}
                                    @enderror
                                </span>
                                <div>
                                    <textarea class="w-100 my-3" name="comment" id="comment" cols="30" rows="4" placeholder="Leave a comment!"></textarea>
                                    <div class="invalid-feedback text-danger text-start my-1 d-flex error-msg">
                                        @error('comment')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <button class="cart-btn-2" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                @endif
            @endif
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Reviews ( {{$product->reviews->count()}} )</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h6>Description</h6>
                            <p>
                                {{$product->description}}
                            </p>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <h6>Reviews ( {{$product->reviews->count()}})</h6>

                            @foreach ($product->reviews as $review)
                            <div class="d-flex">
                                <h5 style="font-weight:bolder" class="pr-2">{{$review->user->firstname}}:</h5>
                                <div class="review-stars">
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <i class="fa fa-star" style="color:#ffb851"></i>
                                    @endfor

                                    @for ($i = 0; $i < 5 - $review->rating; $i++)
                                        <i class="fa fa-star" style="color: #888383" ></i>
                                    @endfor
                                </div>
                            </div>
                            <p>
                                {{$review->comment}}
                            </p>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(!$relatedProducts->isEmpty())
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                @foreach ($relatedProducts as $relatedProduct)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset($relatedProduct->image)}}">
                            {{-- <div class="label new">New</div> --}}
                            <ul class="product__hover">
                                <li><a href="img/product/related/rp-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{route('product-details', $relatedProduct->id)}}">{{$relatedProduct->name}}</a></h6>
                            <div class="rating">
                                @php
                                    $avgRating=round($relatedProduct->reviews->avg('rating'));
                                @endphp
                                @for ($i = 0; $i < $avgRating; $i++)
                                    <i class="fa fa-star" style="color:#ffb851"></i>
                                @endfor

                                @for ($i = 0; $i < 5 - $avgRating; $i++)
                                    <i class="fa fa-star" style="color: #888383" ></i>
                                @endfor
                            </div>
                            <div class="product__price">{{$relatedProduct->price}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
<!-- Product Details Section End -->

<script>
// ---- ---- Const ---- ---- //
const stars = document.querySelectorAll('.stars i');
const starsNone = document.querySelector('.rating-box');

// ---- ---- Stars ---- ---- //
stars.forEach((star, index1) => {
  star.addEventListener('click', () => {
    stars.forEach((star, index2) => {
      // ---- ---- Active Star ---- ---- //
      index1 >= index2
        ? star.classList.add('active')
        : star.classList.remove('active');
    });
  });
});


function deleteReview(event) {
    event.preventDefault();

    // Get the delete URL from the link's href attribute
    const deleteUrl = event.target.getAttribute('href');

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

$(document).ready(function() {

    $("#add-review").validate({
    rules: {
        rating: {
            required: true
        },
        comment: {
            minlength: 5,
            maxlength: 150
        }
    },
    messages: {
        rating: {
            required: "Please provide a rating"
        },
        comment: {
            minlength: "The comment must be at least 5 characters long",
            maxlength: "The comment cannot exceed 150 characters"
        }
    },
    errorPlacement: function(error, element) {
        error.appendTo(element.siblings('.invalid-feedback'));
    },
    submitHandler: function(form) {
        // Form submission logic goes here
        form.submit(); // Submit the form
    }
});



$("#edit-review").validate({
    rules: {
        rating: {
            required: true
        },
        comment: {
            minlength: 5,
            maxlength: 150
        }
    },
    messages: {
        rating: {
            required: "Please provide a rating"
        },
        comment: {
            minlength: "The comment must be at least 5 characters long",
            maxlength: "The comment cannot exceed 150 characters"
        },
    },
    errorPlacement: function(error, element) {
        error.appendTo(element.siblings('.invalid-feedback'));
    }
});

$('#add-to-cart').validate({
    rules: {
        quantity: {
            required: true,
            digits: true,
            remote: {
                url: "{{ route('check-quantity') }}",
                type: "POST",
                data: {
                    quantity: function() {
                        return $('#quantity').val();
                    },
                    'product_id': '{{$product->id}}',
                }
            }
        }
    },
    messages: {
        quantity: {
            required: "Please enter a quantity",
            digits: "Please enter a valid quantity",
            remote: "Quantity exceeds the available quantity."
        }
    },
    errorPlacement: function(error, element) {
        error.appendTo(element.parent().parent().parent().parent().siblings('.invalid-feedback'));
    }
});


});

</script>
@endsection
