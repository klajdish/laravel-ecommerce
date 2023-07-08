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
                        <h1>{{isset($order) ? 'Update order' : 'Add order'}}</h1>
                    </div>
                    <!-- Form -->
                    @php
                        $route = isset($order) ? 'admin.order.store' : 'admin.order.add';
                    @endphp
                    <form action="{{route($route)}}" method="POST" id="{{isset($order) ? 'update-order' : 'add-order'}}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($order))
                            <input type="hidden" name="order_id" value="{{$order->id}}">
                        @endif
                        <div class="mb-1">
                            <label for="name" class="form-label">{{$order->user->firstname}}</label>

                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select">
                                @foreach ($statuses as $status)
                                    <option {{$status->id == $order->status_id ? 'selected' : ''}} value="{{$status->id}}">{{$status->code}}</option>
                                @endforeach
                              </select>
                            <div class="invalid-feedback d-block">
                                @error('name')
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
        $("#add-order").validate({
            rules: {
                status: {
                    required: true
                }
            },
            messages: {
                status: {
                    required: "Please choose a status"
                },
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.siblings('.invalid-feedback'));
            }
        });


      $("#update-order").validate({
        rules: {
            status: {
                required: true
            }
        },
        messages: {
            status: {
                required: "Please choose a status"
            },
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.siblings('.invalid-feedback'));
        }
      });
    });
    </script>
@endsection
