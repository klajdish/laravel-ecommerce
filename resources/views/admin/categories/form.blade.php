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
                        <h1>{{isset($category) ? 'Update Category' : 'Add Category'}}</h1>
                    </div>
                    <!-- Form -->
                    @php
                        $route = isset($category) ? 'admin.category.store' : 'admin.category.add';
                    @endphp
                    <form action="{{route($route)}}" method="POST" id="{{isset($category) ? 'update-category' : 'add-category'}}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($category))
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                        @endif
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input value="{{isset($category) ? $category->name : old('name')}}" type="text" id="name" class="form-control" name="name" placeholder="">
                            <div class="invalid-feedback d-block">
                               @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="parent_id" class="form-label">Choose Parent Category</label>
                            <select id="parent_id" name="parent_id" class="form-select">
                                <option value=""></option>
                                @foreach ($categories as $currentCategory)
                                    <option {{isset($category) && $category->parent_id == $currentCategory->id ? 'selected' : ''}} value="{{$currentCategory->id}}">{{$currentCategory->name}}</option>
                                @endforeach
                              </select>
                            <div class="invalid-feedback d-block">
                               @error('category')
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
      $("#add-category").validate({
        rules: {
          name: {
            required: true
          }
        },
        messages: {
          name: {
            required: "Please enter a category name"
          },
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.siblings('.invalid-feedback'));
        }
      });


      $("#update-category").validate({
        rules: {
          name: {
            required: true
          }
        },
        messages: {
          name: {
            required: "Please enter a category name"
          },
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.siblings('.invalid-feedback'));
        }
      });
    });
    </script>
@endsection
