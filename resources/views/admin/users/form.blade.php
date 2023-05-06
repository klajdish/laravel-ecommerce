@extends('layouts.admin')
@section('content')
<div class="container-fluid pt-5">
    <div class="row justify-content-center">
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
        <div class="col-8">
            <div class="card smooth-shadow-md">
                <!-- Card body -->
                <div class="card-body p-6">

                    <div class="mb-4">
                        <h1>{{isset($user) ? 'Update User' : 'Add User'}}</h1>
                    </div>
                    <!-- Form -->
                    @php
                        $route = isset($user) ? 'admin.user.store' : 'admin.user.add';
                    @endphp
                    <form action="{{route($route)}}" method="POST" id="{{isset($user) ? 'update-user' : 'add-user'}}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($user))
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        @endif
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input value="{{isset($user) ? $user->firstname : old('firstname')}}" type="text" id="firstname" class="form-control" name="firstname" placeholder="First Name">
                            <div class="invalid-feedback d-block">
                                @error('firstname')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Last Name</label>
                            <input value="{{isset($user) ? $user->lastname : old('lastname')}}" type="text" id="lastname" class="form-control" name="lastname" placeholder="Last Name">
                            <div class="invalid-feedback d-block">
                               @error('lastname')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{isset($user) ? $user->email : old('email')}}" type="email" id="email" class="form-control" name="email" placeholder="Email address here">
                            <div class="invalid-feedback d-block">
                               @error('email')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input value="{{old('password')}}" type="password" id="password" class="form-control" name="password" placeholder="">
                            <div class="invalid-feedback d-block">
                               @error('password')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm
                            Password</label>
                            <input value="{{old('password_confirmation')}}" type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="">
                            <div class="invalid-feedback d-block">
                               @error('password_confirmation')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Choose Role</label>
                            <select id="role" name="role" class="form-select">
                                <option value=""></option>
                                <option {{isset($user) && $user->role == 1 ? 'selected' : ''}} value="1">Super Admin</option>
                                <option {{isset($user) && $user->role == 2 ? 'selected' : ''}} value="2">Manager</option>
                                <option {{isset($user) && $user->role == 3 ? 'selected' : ''}} value="3">Simple User</option>
                              </select>
                            <div class="invalid-feedback d-block">
                               @error('role')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label"> Choose Image </label>
                            <input type="file" id="image" value=" {{ isset($user) ? asset($user->image) : old('image')}}" class="form-control" name="image" placeholder="">
                            @if (isset($user))
                                <img class="w-25 h-25" src="{{asset($user->image)}}" alt="">
                            @endif
                            <div class="invalid-feedback d-block">
                               @error('image')
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
        // custom methods
        $.validator.addMethod("strongPassword", function(value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])/.test(value);
        }, "Your password must contain at least one special character, one lowercase letter, one uppercase letter and one digit.");

        $.validator.addMethod("filesize", function(value, element, param) {
            var size = element.files[0].size;
            if (size <= param) {
                return true;
            } else {
                return false;
            }
        }, "The selected file must be less than or equal to {0} bytes in size.");

        $.validator.addMethod("passwordNotEmpty", function(value, element) {
            return this.optional(element) || value.trim().length > 0;
        }, "Password is required");

        // end custom methods

        $('#add-user').validate({
            rules: {
                firstname: {
                    required: true,
                    maxlength: 100
                },
                lastname: {
                    required: true,
                    maxlength: 100
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 100,
                    remote: {
                        url: "{{ route('check-update-email')}}",
                        type: "POST",
                        data: {
                            email: function() {
                                return $('#email').val();
                            },
                            'update': '{{isset($user) ? $user->id : null}}'
                        }
                    }
                },
                password: {
                    required: true,
                    minlength: 8,
                    strongPassword: true,
                    maxlength: 100,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password",
                    maxlength: 100,
                },
                image: {
                    required: true,
                    extension: "jpg|jpeg|png",
                    filesize: 2097152  // 2 MB
                },
                role: {
                    required: true,
                }
            },
            messages: {
                firstname: {
                    required: "Please enter your firstname.",
                    maxlength: "Name must not exceed 100 characters."
                },
                lastname: {
                    required: "Please enter your lastname.",
                    maxlength: "Name must not exceed 100 characters."
                },
                email: {
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                    remote: "This email is already taken.",
                    maxlength: "Email must not exceed 100 characters."
                },
                password: {
                    required: "Please enter your password.",
                    minlength: "Password must be at least 8 characters long.",
                    maxlength: "Password must not exceed 100 characters."
                },
                password_confirmation: {
                    equalTo: "Passwords do not match.",
                    maxlength: "Password Confirmation must not exceed 100 characters."
                },
                image: {
                    extension: "Please select a file with a valid extension (jpg, jpeg or png)",
                    filesize: "Please select a file with a size not exceeding 2MB"
                },
                role: {
                    required: "Please select a role",
                }
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.siblings('.invalid-feedback'));
            }
        });

        // -------------------------------------------------------------

        $('#update-user').validate({
            rules: {
                firstname: {
                    required: true,
                    maxlength: 100
                },
                lastname: {
                    required: true,
                    maxlength: 100
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 100,
                    remote: {
                        url: "{{ route('check-update-email')}}",
                        type: "POST",
                        data: {
                            email: function() {
                                return $('#email').val();
                            },
                            'update': '{{isset($user) ? $user->id : null}}'
                        }
                    }
                },
                password: {
                    required: false,
                    passwordNotEmpty: true,
                    minlength: 8,
                    strongPassword: true,
                    remote: {
                        url: "{{route('check-password') }}",
                        type: "POST",
                        data: {
                            password: function() {
                                return $('#password').val();
                            },
                            'update': '{{isset($user) ? $user->id : null}}'
                        }
                    },
                    maxlength: 100,
                },
                password_confirmation: {
                    required: false,
                    passwordNotEmpty: true,
                    equalTo: "#password",
                    maxlength: 100,
                },
                image: {
                    required: false,
                    extension: "jpg|jpeg|png",
                },
                role: {
                    required: true,
                }
            },
            messages: {
                firstname: {
                    required: "Please enter your firstname.",
                    maxlength: "Name must not exceed 100 characters."
                },
                lastname: {
                    required: "Please enter your lastname.",
                    maxlength: "Name must not exceed 100 characters."
                },
                email: {
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                    remote: "This email is already taken.",
                    maxlength: "Email must not exceed 100 characters."
                },
                password: {
                    minlength: "Password must be at least 8 characters long.",
                    remote: "Your new password is the same as the old password.",
                    maxlength: "Password must not exceed 100 characters."

                },
                password_confirmation: {
                    equalTo: "Passwords do not match.",
                    maxlength: "Password Confirmation must not exceed 100 characters."
                },
                image: {
                    extension: "Please select a file with a valid extension (jpg, jpeg or png)",
                },
                role: {
                    required: "Please select a role",
                }
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.siblings('.invalid-feedback'));
            }
        });
    });
</script>
@endsection
