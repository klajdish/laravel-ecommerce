<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="/css/custom.css" />
    <title>Document</title>
</head>
<body>
    <nav class="navbar my-navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="https://imgur.com/sbUlQpy" alt="" />
            LOGO</a
          >
          <button
            class="navbar-toggler border-0"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span
              class="iconify bar-icon"
              data-icon="fa-solid:bars"
              data-inline="false"
            ></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="/">
                    Home
                </a>
              </li>
              @if(Session::has('loginId'))
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
              @endif
              @if(!Session::has('loginId'))
                <li class="nav-item">
                    <a class="nav-link" href="/login">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
              @endif
            </ul>
          </div>
        </div>
    </nav>
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
                                <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
                                <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
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
                                        <input name="password" value="{{old('password')}}" class="form-control" placeholder="Password" type="password">
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
</body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>
