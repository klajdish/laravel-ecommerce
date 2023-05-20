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
                        <h1>{{isset($coupon) ? 'Update coupon' : 'Add coupon'}}</h1>
                    </div>
                    <!-- Form -->
                    @php
                        $route = isset($coupon) ? 'admin.coupon.store' : 'admin.coupon.add';
                    @endphp
                    <form action="{{route($route)}}" method="POST" id="{{isset($coupon) ? 'update-coupon' : 'add-coupon'}}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($coupon))
                            <input type="hidden" name="coupon_id" value="{{$coupon->id}}">
                        @endif
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input value="{{isset($coupon) ? $coupon->code : old('code')}}" type="text" id="code" class="form-control" name="code" placeholder="">
                                <div class="invalid-feedback d-block">
                                @error('code')
                                        {{$message}}
                                @enderror
                                </div>
                            </div>
                        <div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="discount" class="form-label">Discount</label>
                                <input value="{{isset($coupon) ? $coupon->discount : old('discount')}}" type="text" id="discount" class="form-control" name="discount" placeholder="">
                                <div class="invalid-feedback d-block">
                                @error('discount')
                                        {{$message}}
                                @enderror
                                </div>
                            </div>
                        <div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="expiration_date" class="form-label">Expiration Date</label>
                                <input value="{{isset($coupon) ? $coupon->expiration_date : old('expiration_date')}}" type="date" id="expiration_date" class="form-control" name="expiration_date" placeholder="">
                                <div class="invalid-feedback d-block">
                                @error('expiration_date')
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    // $(document).ready(function() {
    //     $("#add-coupon").validate({
    //     rules: {
    //       name: {
    //         required: true
    //       },
    //       code: {
    //         required: true
    //       }
    //     },
    //     messages: {
    //       name: {
    //         required: "Please enter a coupon name"
    //       },
    //       code: {
    //         required: "Please choose a coupon"
    //       }
    //     },
    //     errorPlacement: function(error, element) {
    //         error.appendTo(element.siblings('.invalid-feedback'));
    //     }
    //   });


    //   $("#update-coupon").validate({
    //     rules: {
    //       name: {
    //         required: true
    //       },
    //       code: {
    //         required: true
    //       }
    //     },
    //     messages: {
    //       name: {
    //         required: "Please enter a coupon name"
    //       },
    //       code: {
    //         required: "Please choose a coupon"
    //       }
    //     },
    //     errorPlacement: function(error, element) {
    //         error.appendTo(element.siblings('.invalid-feedback'));
    //     }
    //   });
    // });
    </script>
@endsection
