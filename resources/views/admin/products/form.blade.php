@extends('layouts.admin')
@section('content')
<div class="container-fluid pt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="col-12">
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
        <div class="col-8">
            <div class="card smooth-shadow-md">
                <!-- Card body -->
                <div class="card-body p-6">

                    <div class="mb-4">
                        <h1>{{isset($product) ? 'Update Product' : 'Add Product'}}</h1>
                    </div>
                    <!-- Form -->
                    @php
                        $route = isset($product) ? 'admin.product.store' : 'admin.product.add';
                    @endphp
                    <form action="{{route($route)}}" method="POST" id="{{isset($product) ? 'update-product' : 'add-product'}}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($product))
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                        @endif
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="barcode" class="form-label">Barcode</label>
                            <input value="{{isset($product) ? $product->barcode : old('barcode')}}" type="text" id="barcode" class="form-control" name="barcode" placeholder="">
                            <div class="invalid-feedback d-block">
                                @error('barcode')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{isset($product) ? $product->name : old('name')}}" type="text" id="name" class="form-control" name="name" placeholder="">
                            <div class="invalid-feedback d-block">
                               @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input value="{{isset($product) ? $product->price : old('price')}}" type="number" id="price" class="form-control" name="price" placeholder="">
                            <div class="invalid-feedback d-block">
                               @error('price')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input value="{{isset($product) ? $product->quantity : old('quantity')}}" type="number" id="quantity" class="form-control" name="quantity" placeholder="">
                            <div class="invalid-feedback d-block">
                               @error('quantity')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label"> Choose Image </label>
                            <input type="file" id="image" value="{{old('image')}}" class="form-control" name="image" placeholder=>
                            @if (isset($product))
                                <img class="w-25 h-25" src="{{asset($product->image)}}" alt="">
                            @endif
                            <div class="invalid-feedback d-block">
                               @error('image')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Choose Category</label>
                            <select id="category" name="category" class="form-select">
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option {{isset($product) && $product->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                            <div class="invalid-feedback d-block">
                               @error('category')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="size" class="form-label">Choose size</label>
                            <select id="size" name="size" class="form-select">
                                <option value=""></option>
                                @foreach ($sizes as $size)
                                    <option {{isset($product) && $product->size_id == $size->id ? 'selected' : ''}} value="{{$size->id}}">{{$size->name}}</option>
                                @endforeach
                              </select>
                            <div class="invalid-feedback d-block">
                               @error('size')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Choose color</label>
                            <select id="color" name="color" class="form-select">
                                <option value=""></option>
                                @foreach ($colors as $color)
                                    <option {{isset($product) && $product->color_id == $color->id ? 'selected' : ''}} value="{{$color->id}}">{{$color->name}}</option>
                                @endforeach
                              </select>
                            <div class="invalid-feedback d-block">
                               @error('color')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {

        $.validator.addMethod("filesize", function(value, element, param) {
            var size = element.files[0].size;
            if (size <= param) {
            return true;
            } else {
            return false;
            }
        }, "The selected file must be less than or equal to {0} bytes in size.");

      $("#add-product").validate({
        rules: {
          barcode: {
            required: true
          },
          name: {
            required: true
          },
          price: {
            required: true,
            number: true
          },
          quantity: {
            required: true,
            number: true
          },
          image: {
            required: true,
            extension: "jpg|jpeg|png|gif",
            filesize: 5048576 // 5 MB
          },
          category: {
            required: true
          },
          size: {
            required: true
          },
          color: {
            required: true
          }
        },
        messages: {
          barcode: {
            required: "Please enter a barcode"
          },
          name: {
            required: "Please enter a product name"
          },
          price: {
            required: "Please enter a price",
            number: "Please enter a valid price"
          },
          quantity: {
            required: "Please enter a quantity",
            number: "Please enter a valid quantity"
          },
          image: {
            required: "Please select an image",
            extension: "Please select a valid image file (jpg, jpeg, png or gif)",
            filesize: "The image file size must be less than 1 MB"
          },
          category: {
            required: "Please select a category"
          },
          size: {
            required: "Please select a size"
          },
          color: {
            required: "Please select a color"
          }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.siblings('.invalid-feedback'));
        }
      });


      $("#update-product").validate({
        rules: {
          barcode: {
            required: true
          },
          name: {
            required: true
          },
          price: {
            required: true,
            number: true
          },
          quantity: {
            required: true,
            number: true
          },
          image: {
            extension: "jpg|jpeg|png|gif",
            filesize: 5048576 // 5 MB
          },
          category: {
            required: true
          },
          size: {
            required: true
          },
          color: {
            required: true
          }
        },
        messages: {
          barcode: {
            required: "Please enter a barcode"
          },
          name: {
            required: "Please enter a product name"
          },
          price: {
            required: "Please enter a price",
            number: "Please enter a valid price"
          },
          quantity: {
            required: "Please enter a quantity",
            number: "Please enter a valid quantity"
          },
          image: {
            extension: "Please select a valid image file (jpg, jpeg, png or gif)",
            filesize: "The image file size must be less than 1 MB"
          },
          category: {
            required: "Please select a category"
          },
          size: {
            required: "Please select a size"
          },
          color: {
            required: "Please select a color"
          }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.siblings('.invalid-feedback'));
        }
      });
    });
    </script>
@endsection
