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
                <div class="my-4">
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
            </div>
        </div>
        <div class="row profile">
            <div class="col-md-4">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic text-center">
                        <img src="https://gravatar.com/avatar/31b64e4876d603ce78e04102c67d6144?s=80&d=https://codepen.io/assets/avatars/user-avatar-80x80-bdcd44a3bfb9a5fd01eb8b86f9e033fa1a9897c3a15b33adfc2649a002dab1b6.png" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{$user->firstname}} {{$user->lastname}}
                        </div>
                        {{-- <div class="profile-usertitle-job">
                            Developer
                        </div> --}}
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <a href="/logout" class="btn btn-danger btn-sm">Log Out</a>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav d-flex justify-content-center">
                            <li class="active">
                                <a href="#">
                                    <i class="glyphicon glyphicon-home"></i>
                                    Overview
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Account Settings </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                    <div class="portlet">
                        <!-- STAT -->
                        <div class="row profile-stat">
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> 37 </div>
                                <div class="uppercase profile-stat-text"> POINTS </div>
                            </div>
                        </div>
                        <!-- END STAT -->
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-content d-flex flex-column gap-3 border-bottom" style="gap:16px;">
                    <h3>Overview</h3>
                    <div class="info d-flex align-items-center" style="border-bottom:1px solid lightgray">
                        <span class="pr-3">First Name: </span>
                        <p class="mb-0">{{$user->firstname}}</p>
                    </div>
                    <div class="info d-flex align-items-center" style="border-bottom:1px solid lightgray">
                        <span class="pr-3">Last Name: </span>
                        <p class="mb-0">{{$user->lastname}}</p>
                    </div>
                    <div class="info d-flex align-items-center" style="border-bottom:1px solid lightgray">
                        <span class="pr-3">Email: </span>
                        <p class="mb-0">{{$user->email}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>
