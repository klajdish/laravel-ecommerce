<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;


class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){
                Session::put('loginId', $finduser->id);
                // Session::put('isFromProvider', 1);
                // Auth::login($finduser);
                $finduser->image = $user->avatar;
                $finduser->save();
                return redirect('profile')->with('success', 'You have logged in successfully');

            }else{
                $fullname = explode(" ", $user->name);
                $newUser = User::updateOrCreate(
                    [
                    'email' => $user->email],[
                    'firstname' => $fullname[0],
                    'lastname' => $fullname[1],
                    'image' => $user->avatar,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456')
                ]);
                Mail::to($newUser->email)->send(new WelcomeEmail($newUser));
                Session::put('loginId', $newUser->id);
                // Session::put('isFromProvider', 1);
                // Auth::login($newUser);

                return redirect('profile')->with('success', 'You have logged in successfully');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
