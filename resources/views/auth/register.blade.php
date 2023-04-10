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
                        <article class="card-body mx-auto" style="max-width: 700px;">
                            <h4 class="card-title mt-3 text-center">Create Account</h4>
                            <p class="text-center">Get started with your free account</p>
                            <p>
                                <a href="{{ route('auth.google') }}">
                                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                                </a>
                                {{-- <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-google"></i>   Login via Google</a> --}}
                                {{-- <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a> --}}
                            </p>
                            <p class="divider-text">
                                <span class="bg-light">OR</span>
                            </p>
                            <form action="{{route('register')}}" method="POST"  id="register-user" >
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
                        minlength: 8
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name.",
                        maxlength: "Name must not exceed 255 characters."
                    },
                    email: {
                        required: "Please enter your email address.",
                        email: "Please enter a valid email address.",
                        remote: "This email is already taken."
                    },
                    password: {
                        required: "Please enter your password.",
                        minlength: "Password must be at least 8 characters long."
                    },
                    password_confirmation: {
                        required: "Please confirm your password.",
                        equalTo: "Passwords do not match."
                    }
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.parent().siblings('.error-msg'));
                }
            });
        });
    </script>
@endsection
