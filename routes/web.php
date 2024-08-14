<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['checkUserRole'])->group(function () {
    Route::get('/User/User_dashboard', function () {
        return view('User.User_dashboard');
    })->name('User.User_dashboard');
    
    Route::get('/Admin/Admin_dashboard', function () {
        return view('Admin.Admin_dashboard');
    })->name('Admin.Admin_dashboard');

    
});
    


Route::get('/login', [Logincontroller::class, 'showLoginForm'])->name('login');
Route::post('/login_user', [Logincontroller::class, 'login_user'])->name('login_user');



Route::get('/signup', [Logincontroller::class, 'showsignup'])->name('signup');
Route::post('/register_user', [Logincontroller::class, 'register_user'])->name('register_user');
Route::post('/signout', [Logincontroller::class, 'signout'])->name('signout');

