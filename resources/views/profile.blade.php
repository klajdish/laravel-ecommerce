@extends('layouts.main')
<style>
    .nav::before, .nav::after {
        content: none !important;
    }
</style>
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
        </div>
        <section class="py-5 my-5">
		<div class="container">
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<!-- <img src="img/user2.jpg" alt="Image" class="shadow"> -->
                            <img style="width: 200px; height: 180px" src="{{asset($user->image) }}" alt="User's profile image">
                             {{-- <img src="https://gravatar.com/avatar/31b64e4876d603ce78e04102c67d6144?s=80&d=https://codepen.io/assets/avatars/user-avatar-80x80-bdcd44a3bfb9a5fd01eb8b86f9e033fa1a9897c3a15b33adfc2649a002dab1b6.png" class="shadow" alt=""> --}}
						</div>
						<h4 class="text-center"> {{$user->firstname}} {{$user->lastname}}</h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i>
							Account
						</a>
                        @if(!$user->google_id)
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password-t" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i>
							Password
						</a>
                        @endif
                        <a class="nav-link" id="address-tab" data-toggle="pill" href="#address" role="tab" aria-controls="address" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i>
							Address
						</a>
					</div>
                    <div class="w-100 ps-5 text-center">
                        <a class="text-danger text-center" href="/logout">
                            Logout
                        </a>
                    </div>
				</div>
                <!-- forma 1-->
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Account Settings</h3>
                        <form action="{{route('update-user-data')}}"  method="POST" id="update-user-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input name="firstname" id="firstname" type="text" class="form-control" value={{$user->firstname}}>
                                    </div>
                                    <span  id="firstname-error" class="text-danger my-2 ml-3 error-msg">
                                        @error('firstname')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="lastname" id="lastname" type="text" class="form-control" value={{$user->lastname}}>
                                    </div>
                                    <span id="lastname-error" class="text-danger my-2 ml-3 error-msg">
                                        @error('lastname')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @if(!$user->google_id)
                                        <label>Email</label>
                                        <input  name="email" id="email" type="email" class="form-control" value={{$user->email}}>
                                        @endif
                                    </div>
                                    <span id="email-error" class="text-danger my-2 ml-3 error-msg">
                                        @error('email')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                                {{-- <button class="btn btn-light">Cancel</button> --}}
                            </div>
                        </form>
					</div>
                    {{-- Form2 Reset Password --}}
                    @if(!$user->google_id)
                        <div class="tab-pane fade" id="password-t" role="tabpanel" aria-labelledby="password-tab">
                            <h3 class="mb-4">Password Settings</h3>
                            <form action="{{route('reset-password')}}" method ="POST" id="reset-password">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Old password</label>
                                            <input  name="old_password" id="old_password" type="password" class="form-control">
                                        </div>
                                        <span id="old_password-error" class="text-danger my-2 ml-3 error-msg">
                                                @error('old_password')
                                                    {{$message}}
                                                @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>New password</label>
                                            <input name="password" id="password" type="password" class="form-control">
                                        </div>
                                        <span  id="password-error" class="text-danger my-2 ml-3 error-msg">
                                            @error('password')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Confirm new password</label>
                                            <input name="password_confirmation" id="password_confirmation" type="password" class="form-control">
                                        </div>
                                        <span  id="password_confirmation-error" class="text-danger my-2 ml-3 error-msg">
                                            @error('password_confirmation')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"> Update </button>
                                    </div> <!-- form-group// -->

                                </div>
                            </form>
                            </div>
                        @endif

                        @php
                            $userAddress = $user->addresses()->first();
                        @endphp
                        <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                            <h3 class="mb-4">Addres Settings</h3>
                            <form action="{{route('user.address')}}"  method="POST" id="user-address">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Country/State</label>
                                            <select name="state" class="form-control" id="state" class="mb-1">
                                                <option value="">Select State</option>
                                                @foreach ($countries as $country)
                                                    <option {{$userAddress && $userAddress->state == $country ? 'selected' : ''}} value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span  id="state-error" class="text-danger my-2 ml-3 error-msg">
                                            @error('state')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Town/City</label>
                                            <select name="city" id="city" class="form-control" class="mb-1">
                                            </select>
                                        </div>
                                        <span id="city-error" class="text-danger my-2 ml-3 error-msg">
                                            @error('city')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Street</label>
                                            <input  name="street" id="street" type="text" class="form-control" value="{{$userAddress && $userAddress->street ? $userAddress->street : '' }}">
                                        </div>
                                        <span id="street-error" class="text-danger my-2 ml-3 error-msg">
                                            @error('street')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Postcode/Zip</label>
                                            <input  name="zip_code" id="zip_code" type="text" class="form-control" value="{{$userAddress && $userAddress->zip_code ? $userAddress->zip_code : '' }}">
                                        </div>
                                        <span id="zip_code-error" class="text-danger my-2 ml-3 error-msg">
                                            @error('zip_code')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-block">{{$userAddress ? 'Update' : 'Add'}} </button>
                                </div>
                                    {{-- <button class="btn btn-light">Cancel</button> --}}
                                </div>
                            </form>
                        </div>
				</div>
			</div>
		</div>
	</section>

    <script>
        $(document).ready(function() {

            // $('#update-user-data').submit(function(event) {

            //     var defaultValues = {
            //         firstname:"{{$user->firstname}}",
            //         lastname: "{{$user->lastname}}",
            //         email: "{{$user->email}}"
            //     };
            //     var formValues = {
            //         firstname: $('input[name="firstname"]').val(),
            //         lastname: $('input[name="lastname"]').val(),
            //         email:$('input[name="email"]').val()
            //     };

            //     if (JSON.stringify(defaultValues) === JSON.stringify(formValues)) {

            //         $('.nochanges').addClass('my-alert alert-success');
            //         $('.nochanges').text('You did not change anything');
            //         event.preventDefault(); // Prevent the form submission

            //     }
            // });

            $.validator.addMethod("strongPassword", function(value, element) {
                return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])/.test(value);
            }, "Your password must contain at least one special character, one lowercase letter, one uppercase letter and one digit.");

            $('#update-user-data').validate({
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
                    }
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.parent().siblings('.error-msg'));
                },
            });

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
                            url: "{{route('check-password') }}",
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









            triggerStateChange();



            // get cities for a selected country

            $('#state').change(function() {
                var country = $(this).val();
                if (country) {
                    $.ajax({
                        url: '/get-cities',
                        type: 'POST',
                        data: { country: country },
                        dataType: 'json',
                        success: function(data) {
                            var cityOptions = '<option value="">Select a city</option>';
                            $.each(data, function(key, city) {
                                cityOptions += '<option value="' + city + '">' + city + '</option>';
                            });
                            $('#city').html(cityOptions);
                        }
                    });
                } else {
                    $('#city').html('<option value="">Select a city</option>');
                }
            });


             // validate address

        $("#user-address").validate({
            rules: {
                state: {
                    required: true,
                },
                city: {
                    required: true,
                },
                street: {
                    required: true,
                    minlength: 3,
                    maxlength: 255,
                    pattern: /^[a-zA-Z0-9\s]+$/
                },
                zip_code: {
                    required: true,
                    maxlength: 10,
                    pattern: /^[A-Z0-9]+$/
                }
            },
            messages: {
                state: {
                    required: "The state field is required.",
                },
                city: {
                    required: "The city field is required.",
                },
                street: {
                    required: "Please enter your street address.",
                    minlength: "Your street address must be at least 3 characters long.",
                    maxlength: "Your street address cannot exceed 255 characters.",
                    pattern: "Your street address can only contain letters, numbers, and spaces."
                },
                zip_code: {
                    required: "The ZIP code field is required.",
                    maxlength: "The ZIP code field cannot exceed 10 characters.",
                    pattern: "Please enter only uppercase letters."
                }
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.parent().siblings('.error-msg'));
            }
        });

        });

        function triggerStateChange() {
            var country = $('#state').val();
            var userCity = null;
            @if(isset($userAddress))
                userCity = {!! json_encode($userAddress->city) !!};
            @endif
            if (country) {
                $.ajax({
                    url: '/get-cities',
                    type: 'POST',
                    data: { country: country },
                    dataType: 'json',
                    success: function(data) {
                        var cityOptions = '<option value="">Select a city</option>';
                        $.each(data, function(key, city) {
                            cityOptions += '<option value="' + city + '" ' + (city === userCity ? 'selected' : '') + '>' + city + '</option>';
                        });
                        $('#city').html(cityOptions);
                    }
                });
            } else {
                $('#city').html('<option value="">Select a city</option>');
            }
        }



    </script>
@endsection
