<?php

use App\Http\Controllers\User;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Review;
use App\Http\Controllers\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

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



Route::get('/', [User::class, 'home']);

Route::get('/login', [User::class, 'login'])->middleware('alreadyLoggedIn');
Route::post('/login', [User::class, 'loginPost'])->name('login');
Route::get('/register', [User::class, 'register'])->middleware('alreadyLoggedIn');
Route::post('/register', [User::class, 'registerPost'])->name('register');
Route::get('/profile', [User::class, 'profile'])->middleware('isLoggedIn');
Route::get('/logout', [User::class, 'logout']);
Route::post('/reset-password', [User::class, 'resetPassword'])->name('reset-password');
Route::post('/check-email', [User::class, 'checkEmail'])->name('check-email');
Route::post('/check-update-email', [User::class, 'checkUpdateEmail'])->name('check-update-email');
Route::post('/check-password', [User::class, 'checkPassword'])->name('check-password');
Route::post('/update-user-data', [User::class, 'updateUser'])->name('update-user-data')->middleware('isLoggedIn');


Route::get('/shop', [Product::class, 'shop'])->name('shop');
Route::get('/product/{id}', [Product::class, 'productDetails'])->name('product-details');
Route::post('/add-review', [Review::class, 'addReview'])->name('add-review');
Route::post('/edit-review', [Review::class, 'editReview'])->name('edit-review');



Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});


// admin routes
Route::controller(Admin::class)->group(function(){
    Route::get('/admin', 'dashboard')->name('admin.dashboard')->middleware('adminCheck');
    Route::get('/admin/users', 'users')->name('admin.users')->middleware('adminCheck');
    Route::get('/admin/user/add', 'add')->name('admin.user.add')->middleware('adminCheck');
    Route::post('/admin/user/add', 'create')->name('admin.user.add')->middleware('adminCheck');
    Route::get('/admin/user/update/{id}', 'update')->name('admin.user.update')->middleware('adminCheck');
    Route::post('/admin/user/store', 'store')->name('admin.user.store')->middleware('adminCheck');
    Route::get('/admin/user/delete', 'delete')->name('admin.user.delete')->middleware('adminCheck');

    Route::get('admin/products', 'products')->name('admin.products')->middleware('adminCheck');
    Route::get('/admin/product/add', 'addProduct')->name('admin.product.add')->middleware('adminCheck');
    Route::post('/admin/product/add', 'createProduct')->name('admin.product.add')->middleware('adminCheck');
    Route::get('/admin/product/update/{id}', 'updateProduct')->name('admin.product.update')->middleware('adminCheck');
    Route::post('/admin/product/store', 'storeProduct')->name('admin.product.store')->middleware('adminCheck');
    Route::get('/admin/product/delete', 'deleteProduct')->name('admin.product.delete')->middleware('adminCheck');

    Route::get('admin/categories', 'categories')->name('admin.categories')->middleware('adminCheck');
    Route::get('/admin/category/add', 'addCategory')->name('admin.category.add')->middleware('adminCheck');
    Route::post('/admin/category/add', 'createCategory')->name('admin.category.add')->middleware('adminCheck');
    Route::get('/admin/category/update/{id}', 'updateCategory')->name('admin.category.update')->middleware('adminCheck');
    Route::post('/admin/category/store', 'storeCategory')->name('admin.category.store')->middleware('adminCheck');
    Route::get('/admin/category/delete', 'deleteCategory')->name('admin.category.delete')->middleware('adminCheck');
});
// end admin routes




