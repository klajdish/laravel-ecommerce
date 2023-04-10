@extends('layouts.main')
@section('content')
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
                    <h3 class="mt-5">Reset Password</h3>
                    <div>
                        <form action="{{route('reset-password')}}" method="POST">
                            @csrf
                            <div class="d-flex flex-column">
                                <div class="form-group input-group m-0">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input name="old_password" class="form-control" placeholder="Old Password" type="password">
                                </div> <!-- form-group// -->
                                <span class="text-danger my-2 ml-3">
                                    @error('old_password')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="form-group input-group m-0">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input name="password" class="form-control" placeholder="New Password" type="password">
                                </div> <!-- form-group// -->
                                <span class="text-danger my-2 ml-3">
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
                                    <input name="password_confirmation" class="form-control" placeholder="Confirm password" type="password">
                                </div> <!-- form-group// -->
                                <span class="text-danger my-2 ml-3">
                                    @error('password_confirmation')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div> <!-- form-group// -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
