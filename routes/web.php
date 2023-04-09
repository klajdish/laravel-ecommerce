<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('home');
});

Route::get('/login', [User::class, 'login'])->middleware('alreadyLoggedIn');
Route::post('/login', [User::class, 'loginPost'])->name('login');
Route::get('/register', [User::class, 'register'])->middleware('alreadyLoggedIn');
Route::post('/register', [User::class, 'registerPost'])->name('register');
Route::get('/profile', [User::class, 'profile'])->middleware('isLoggedIn');
Route::get('/logout', [User::class, 'logout']);

