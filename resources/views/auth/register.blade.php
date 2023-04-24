@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row gap-3">
            <div class="col-12">
                <div class="wrapper d-flex flex-column align-items-center justify-content-center">
                    <div class="my-4" style="width: 500px">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">
                                {{Session::get('fail')}}
                            </div>
                        @endif
                    </div>
                    <div class="card bg-light" style="width: 500px">
                        <article class="card-body m-4" style="max-width: 700px;">
                            <h4 class="card-title mt-3 text-center">Create Account</h4>
                            <p class="text-center">Get started with your free account</p>
                            <p class="text-center">
                                <a href="{{ route('auth.google') }}">
                                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                                </a>
                                {{-- <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-google"></i>   Login via Google</a> --}}
                                {{-- <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a> --}}
                            </p>
                            <p class="divider-text">
                                <span class="bg-light">OR</span>
                            </p>
                            <form action="{{route('register')}}" method="POST"  id="register-user" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex flex-column">
                                    <div class="form-group input-group m-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input name="firstname" id="firstname" value="{{old('firstname')}}" class="form-control" placeholder="First name" type="text">
                                    </div>
                                    <span id="firstname-error" class="text-danger error-msg my-2 ml-3">
                                        @error('firstname')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div> <!-- form-group// -->
                                <div class="d-flex flex-column">
                                    <div class="form-group input-group m-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input name="lastname" id="lastname" value="{{old('lastname')}}" class="form-control" placeholder="Last name" type="text">
                                    </div> <!-- form-group// -->
                                    <span id="lastname-error" class="text-danger error-msg my-2 ml-3">
                                        @error('lastname')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="form-group input-group m-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                        </div>
                                        <input name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Email address" type="email">
                                    </div> <!-- form-group// -->
                                    <span id="email-error" class="text-danger error-msg my-2 ml-3">
                                        @error('email')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="form-group input-group m-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                        </div>
                                        <input name="password" id="password" value="{{old('password')}}" class="form-control" placeholder="Password" type="password">
                                    </div> <!-- form-group// -->
                                    <span id="password-error" class="text-danger error-msg my-2 ml-3">
                                        @error('password')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="form-group input-group m-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                        </div>
                                        <input name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" placeholder="Repeat password" type="password">
                                    </div> <!-- form-group// -->
                                    <span id="password_confirmation-error" class="text-danger error-msg my-2 ml-3">
                                        @error('password_confirmation')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="form-group input-group m-0 justify-content-between">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-image"></i> </span>
                                        </div>
                                        <input type="file" name="image" id="image">
                                    </div> <!-- form-group// -->
                                    <span id="image-error" class="text-danger error-msg my-2 ml-3">
                                        @error('image')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                                </div> <!-- form-group// -->
                                <p class="text-center">Have an account? <a href="/login">Log In</a> </p>
                            </form>
                        </article>
                    </div> <!-- card.// -->
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
            // end custom methods



            $('#register-user').validate({
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
                            url: "{{ route('check-email') }}",
                            type: "POST",
                            data: {
                                email: function() {
                                    return $('#email').val();
                                }
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
                    }
                },
                messages: {
                    firstname: {
                        required: "Please enter your name.",
                        maxlength: "Name must not exceed 100 characters."
                    },
                    lastname: {
                        required: "Please enter your name.",
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
                        required: "Please confirm your password.",
                        equalTo: "Passwords do not match.",
                        maxlength: "Password Confirmation must not exceed 100 characters."
                    },
                    image: {
                        required: "Please select an image file",
                        extension: "Please select a file with a valid extension (jpg, jpeg or png)",
                        filesize: "Please select a file with a size not exceeding 2MB"
                    }
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.parent().siblings('.error-msg'));
                }
            });
        });
    </script>
@endsection
