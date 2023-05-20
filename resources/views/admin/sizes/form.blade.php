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
                        <h1>{{isset($size) ? 'Update Size' : 'Add Size'}}</h1>
                    </div>
                    <!-- Form -->
                    @php
                        $route = isset($size) ? 'admin.size.store' : 'admin.size.add';
                    @endphp
                    <form action="{{route($route)}}" method="POST" id="{{isset($size) ? 'update-size' : 'add-size'}}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($size))
                            <input type="hidden" name="size_id" value="{{$size->id}}">
                        @endif
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{isset($size) ? $size->name : old('name')}}" type="text" id="name" class="form-control" name="name" placeholder="">
                            <div class="invalid-feedback d-block">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input value="{{isset($size) ? $size->code : old('code')}}" type="text" id="code" class="form-control" name="code" placeholder="">
                                <div class="invalid-feedback d-block">
                                @error('code')
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
        $("#add-size").validate({
        rules: {
          name: {
            required: true
          },
          code: {
            required: true
          }
        },
        messages: {
          name: {
            required: "Please enter a size name"
          },
          code: {
            required: "Please choose a size"
          }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.siblings('.invalid-feedback'));
        }
      });


      $("#update-size").validate({
        rules: {
          name: {
            required: true
          },
          code: {
            required: true
          }
        },
        messages: {
          name: {
            required: "Please enter a size name"
          },
          code: {
            required: "Please choose a size"
          }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.siblings('.invalid-feedback'));
        }
      });
    });
    </script>
@endsection
