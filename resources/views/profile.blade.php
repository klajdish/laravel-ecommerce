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
                        <img src="{{ asset($user->image) }}" alt="User's profile image">

                        {{-- <img src="https://gravatar.com/avatar/31b64e4876d603ce78e04102c67d6144?s=80&d=https://codepen.io/assets/avatars/user-avatar-80x80-bdcd44a3bfb9a5fd01eb8b86f9e033fa1a9897c3a15b33adfc2649a002dab1b6.png" class="img-responsive" alt=""> --}}
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
                                    <i clasusers="glyphicon glyphicon-user"></i>
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
                        <form action="{{route('reset-password')}}" id="reset-password" method="POST">
                            @csrf
                            <div class="d-flex flex-column">
                                <div class="form-group input-group m-0">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input name="old_password" id="old_password" class="form-control" placeholder="Old Password" type="password">
                                </div> <!-- form-group// -->
                                <span  id="old_password-error" class="text-danger my-2 ml-3 error-msg">
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
                                    <input name="password" id="password" class="form-control" placeholder="New Password" type="password">
                                </div> <!-- form-group// -->
                                <span  id="password-error" class="text-danger my-2 ml-3 error-msg">
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
                                    <input name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password" type="password">
                                </div> <!-- form-group// -->
                                <span  id="password_confirmation-error" class="text-danger my-2 ml-3 error-msg">
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
    <script>
        $(document).ready(function() {
            $.validator.addMethod("strongPassword", function(value, element) {
                return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])/.test(value);
            }, "Your password must contain at least one special character, one lowercase letter, one uppercase letter and one digit.");

            $('#reset-password').validate({
                rules: {
                    old_password: {
                        required: true,
                        minlength: 8,
                        maxlength: 100,
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        strongPassword: true,
                        maxlength: 100,
                        remote: {
                            url: "{{ route('check-password') }}",
                            type: "POST",
                            data: {
                                password: function() {
                                    return $('#password').val();
                                }
                            }
                        }
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password",
                        maxlength: 100,
                    }
                },
                messages: {
                    old_password: {
                        required: "Please enter your old password.",
                        minlength: "Password must be at least 8 characters long.",
                        maxlength: "Password must not exceed 100 characters."
                    },
                    password: {
                        required: "Please enter your password.",
                        minlength: "Password must be at least 8 characters long.",
                        strongPassword: "Your password must contain at least one special character, one lowercase letter, one uppercase letter and one digit.",
                        remote: "Your new password is the same as the old password.",
                        maxlength: "Password must not exceed 100 characters."
                    },
                    password_confirmation: {
                        required: "Please confirm your password.",
                        equalTo: "Passwords do not match.",
                        maxlength: "Password Confirmation must not exceed 100 characters."
                    }
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.parent().siblings('.error-msg'));
                }
            });
        });
    </script>
@endsection
