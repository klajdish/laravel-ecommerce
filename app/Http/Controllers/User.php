<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Faker\Provider\Base;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use PragmaRX\Countries\Package\Countries;
use App\Models\Address;




class User extends Controller
{
    public function home()
    {
        $products = Product::orderBy('created_at', 'desc')->take(4)->get();
        $bestSellerProducts = Product::withCount(['orderItems as total_quantity' => function ($query) {
                                    $query->select(\DB::raw('sum(quantity)'));
                                }])
                                ->orderByDesc('total_quantity')
                                ->take(3)
                                ->get();


        return view('home', compact('products', 'bestSellerProducts'));
    }

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
                'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])/',
                'confirmed',
                'max:100'
            ],
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'password.regex' => 'Your password must contain at least one special character, one lowercase letter, one uppercase letter and one digit.',
        ]);


        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('public/images', $imageName);

        $user = new UserModel();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = Storage::url($imagePath);
        $result = $user->save();

        if($result) {
            Mail::to($user->email)->send(new WelcomeEmail($user));
            return redirect('login')->with('success', 'You have registered successfully');
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
                $request->session()->put('userRole', $user->role);
                return redirect('profile')->with('success', 'You have logged in successfully');
            }else {
                return back()->with('fail', 'Something went wrong');
            }
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function profile(Request $request)
    {
        if(Session::has('loginId')) {
            $user = UserModel::where('id', Session::get('loginId'))->first();

            $countries = Countries::all()->pluck('name.common');
        }

        return view('profile', compact('user', 'countries'));
    }

    public function logout() {
        if(Session::has('loginId')){
            Session::pull('loginId');
        }
        // if(Session::has('isFromProvider')){
        //     Session::pull('isFromProvider');
        // }
        if(Session::has('userRole')){
            Session::pull('userRole');
        }

        return redirect('/login')->with('success', 'You have successfully logged out');

    }

    public function resetPassword(Request $request) {
        $user = UserModel::where('id', Session::get('loginId'))->first();

        $request->validate([
            'old_password' => [
                'required',
                'min:8',
                'max:50',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('The password is incorrect.');
                    }
                }
            ],
            'password' => [
                'required',
                'min:8',
                'max:50',
                'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])/',
                function ($attribute, $value, $fail) use ($user) {
                    if (Hash::check($value, $user->password)) {
                        $fail('Your new password is the same as the old password.');
                    }
                },
                'confirmed'
            ]
        ]);


        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('logout')->with('success', 'Password changed successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }

    }

    public function checkEmail(Request $request){
        $loggedInUser = null;
        $email = $request->email;  //email i ndryshuar
        $user = UserModel::where('email', $email)->first(); // a ka user me kete emailin e ndryshuar

        if (Session::has('loginId')){
            $loggedInUser = UserModel::where('id', Session::get('loginId'))->first();
        }
        if ($loggedInUser && $user && ($loggedInUser->email != $email)) {
            return response()->json(false); //shfaq error
        }else {
            return response()->json(true); //mos shfaq error
        }
    }

    public function checkUpdateEmail(Request $request){
        $updateUserId = $request->update;
        $updateUser = null;
        $email = $request->email;  //email i ndryshuar
        $user = UserModel::where('email', $email)->first();

        if ($updateUserId){
            $updateUser = UserModel::where('id', $updateUserId)->first();
        }
        if ($updateUser && $user && ($updateUser->email != $email)) {
            return response()->json(false); //shfaq error
        } else if(!$updateUser && $user) {
            return response()->json(false); //shfaq error
        }else {
            return response()->json(true); //mos shfaq error
        }
    }

    public function checkPassword(Request $request){
        $password = $request->input('password');
        $result = false;
        $user = UserModel::where('id', Session::get('loginId'))->first();

        $updateUserId = $request->update;
        if ($updateUserId){
            $updateUser = UserModel::where('id', $updateUserId)->first();
            $result = Hash::check($password, $updateUser->password);
        } else {
            $result = Hash::check($password, $user->password);
        }

        if ($result) {
            return response()->json(false); // shfaq error
        } else {
            return response()->json(true);
        }
    }

    public function updateUser(Request $request){

        try {
            $user1 = UserModel::where('id',Session::get('loginId'))->first();

            if(
                $request->firstname == $user1->firstname &&
                $request->last == $user1->lastname &&
                $request->email == $user1->email
                ){
                return redirect('/profile')->with('success', 'You have nothing to change');
                }

            $validatedData = $request->validate([
                'firstname' => 'required|max:100',
                'lastname' => 'required|max:100',
                'email' => [
                    'required',
                    'email',
                    'max:100',
                    Rule::unique('users')->ignore(Session::get('loginId'), 'id')
                ],
            ]);

            $user = UserModel::where('id', Session::get('loginId'))->update($validatedData);
            if($user){
                return redirect('/profile')->with('success', 'Your data is changed succesfully');
            }else{
                return redirect('/profile')>with('fail', 'Something went wrong');
            }
        } catch (\Throwable $th) {
            dd($th);
        }

    }






    public function createOrUpdateAddress(Request $request)
    {
        $request->validate([
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10'
        ], [
            'state.required' => 'The state field is required.',
            'city.required' => 'The city field is required.',
            'street.required' => 'The street field is required.',
            'zip_code.required' => 'The ZIP code field is required.'
        ]);

        $userId = Session::get('loginId');
        $addressData = $request->only(['state', 'city', 'street', 'zip_code']);

        Address::updateOrCreate(['user_id' => $userId], $addressData);

        return redirect()->back()->with('success', 'Address saved successfully.');
    }




}
