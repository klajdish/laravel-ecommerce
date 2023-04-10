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
                            <h4 class="card-title mt-3 text-center">Log in</h4>
                            <p>
                                <a href="{{ route('auth.google') }}">
                                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                                </a>
                                {{-- <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
                                <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a> --}}
                            </p>
                            <p class="divider-text">
                                <span class="bg-light">OR</span>
                            </p>
                            <form action="{{route('login')}}" method="POST">
                                @csrf
                                <div class="d-flex flex-column">
                                    <div class="form-group input-group m-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                        </div>
                                        <input name="email" value="{{old('email')}}" class="form-control" placeholder="Email address" type="email">
                                    </div> <!-- form-group// -->
                                    <span class="text-danger my-2 ml-3">
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
                                        <input name="password" class="form-control" placeholder="Password" type="password">
                                    </div> <!-- form-group// -->
                                    <span class="text-danger my-2 ml-3">
                                        @error('password')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                                </div> <!-- form-group// -->
                                <p class="text-center">Are you new ? <a href="/register">Register</a> </p>
                            </form>
                        </article>
                    </div> <!-- card.// -->
                </div>
            </div>
        </div>
    </div>
@endsection
