<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;
use Faker\Provider\Base;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class User extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function registerPost(Request $request) {
        $request->validate([
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required|email|unique:users|max:100',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])$/',
                'confirmed',
                'max:100'
            ]
        ], [
            'password.regex' => 'Your password must contain at least one special character, one lowercase letter, one uppercase letter and one digit.',
        ]);

        $user = new UserModel();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $result = $user->save();

        if($result) {
            return back()->with('success', 'You have registered successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }

    }

    //SHTUAR KOMENT

    public function loginPost(Request $request) {
        $request->validate([
            'email' => [
                'required',
                'email',
                'max:100',
                function ($attribute, $value, $fail) use ($request) {
                    $user = UserModel::where('email', $request->email)->first();
                    if (!$user) {
                        $fail('The email does not exist.');
                    }
                }
            ],
            'password' => [
                'required',
                'min:8',
                'max:50',
                function ($attribute, $value, $fail) use ($request) {
                    $user = UserModel::where('email', $request->email)->first();
                    if ($user && !Hash::check($value, $user->password)) {
                        $fail('The password does not match the email.');
                    }
                }
            ]
        ]);

        $user = UserModel::where('email', $request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('profile')->with('success', 'You have logged in successfully');
            }else {
                return back()->with('fail', 'Something went wrong'); //
            }
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function profile(Request $request)
    {
        if(Session::has('loginId')) {
            $user = UserModel::where('id', Session::get('loginId'))->first();
        }
        return view('profile', compact('user'));
    }

    public function logout() {
        if(Session::has('loginId')){
            Session::pull('loginId');
        }
        if(Session::has('isFromProvider')){
            Session::pull('isFromProvider');
        }

        return redirect('/login')->with('success', 'You have successfully logged out');

    }

    public function resetPassword(Request $request) {
        $request->validate([
            'old_password' => 'required|min:8|max:50',
            'password' => 'required|confirmed|min:8|max:50',
        ]);

        $user = UserModel::where('id', Session::get('loginId'))->first();

        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Password changed successfully');
        }else {
            // $validator = new Validator();
            // dd(get_class_methods($validator));
            // $validator->getMessageBag()->add('password', 'Password wrong');
            return back()->with('fail', 'Password is incorrect');
        }

    }

    public function checkEmail(Request $request){
        $email = $request->input('email');
        $user = UserModel::where('email', $email)->first();

        if ($user) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }

    public function checkPassword(Request $request){
        $password = $request->input('password');
        $user = UserModel::where('id', Session::get('loginId'))->first();

        $result = Hash::check($password, $user->password);

        if ($result) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }
}
