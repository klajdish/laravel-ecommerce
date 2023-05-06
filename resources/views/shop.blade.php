@extends('layouts.main')
@section('content')
<!-- Breadcrumb Begin -->
{{-- @dd(old('size[]')) --}}
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Categories</h4>
                        </div>
                        <ul class="list-group">
                            @foreach ($categories as $category)
                                <li class="list-group-item">
                                    <a class="text-decoration-none h6" href="{{ route('shop', ['category' => $category->name, 'category_id' => $category->id]) }}">{{ $category->name }}</a>
                                    @if (count($category->children))
                                        @include('partials.categories', ['categories' => $category->children])
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- <div class="sidebar__filter">
                        <form action="">
                            <div class="section-title">
                                <h4>Shop by price</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="{{$prices['minPrice']}}" data-max="{{$prices['maxPrice']}}"></div>
                                    <div class="range-slider">
                                    <div class="price-input">
                                        <p>Price:</p>
                                        <input type="text" name="minamount" id="minamount">
                                        <input type="text" name="maxamount" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <button type="submit"></button>
                        </form>
                        <a href="#">Filter</a>
                    </div> --}}
                    @php


                    @endphp
                    <form action="" method="GET">
                        <div class="sidebar__sizes">
                            <div class="section-title">
                                <h4>Shop by size</h4>
                            </div>
                            <div class="size__list">
                            @foreach ($sizes as $size)
                                <label for="{{$size->name}}">
                                    {{$size->name}}
                                    <input type="checkbox" name="size[]" value="{{$size->id}}" id="{{$size->name}}"
                                    {{ in_array($size->id, $selectedSizes) ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="sidebar__color">
                            <div class="section-title">
                                <h4>Shop by color</h4>
                            </div>
                            <div class="size__list color__list">
                                @foreach ($colors as $color)
                                    <label for="{{$color->name}}">
                                        {{$color->name}}
                                        <input type="checkbox" name="color[]" value="{{$color->id}}" id="{{$color->name}}"
                                        {{ in_array($color->id, $selectedColors) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <button class="primary-button border-0 py-2 px-4 bg-danger text-white fw-bold" type="submit">Filter</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="row">
                    {{-- <div class="label new || stockout stockblue ">New</div> --}}
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset($product->image)}}">
                                    <div class="label new">New</div>
                                    <ul class="product__hover">
                                        <li><a href="{{asset($product->image)}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">{{$product->name}}</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">{{$product->price}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->

<!-- Instagram Begin -->
<div class="instagram">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="storage/images/web/img/instagram/insta-1.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ noobs_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="storage/images/web/img/instagram/insta-2.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ noobs_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="storage/images/web/img/instagram/insta-3.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ noobs_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="storage/images/web/img/instagram/insta-4.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ noobs_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="storage/images/web/img/instagram/insta-5.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ noobs_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="storage/images/web/img/instagram/insta-6.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ noobs_shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Instagram End -->
@endsection
