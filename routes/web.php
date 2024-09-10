<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Admin\ProductController;
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
    // Route::get('/User/User_dashboard', function () {
    //     return view('User.User_dashboard');
    // })->name('User.User_dashboard');
    Route::get('/User/User_dashboard', [ProductController::class, 'showUserDashboard'])->name('User.User_dashboard');
    Route::get('/Admin/Admin_dashboard', function () {
        return view('Admin.Admin_dashboard');
    })->name('Admin.Admin_dashboard');

    
});
    

// ADMIN ROUTE
Route::get('/add_product', [ProductController::class, 'add_product'])->name('add_product');
Route::post('/submit_product', [ProductController::class, 'submit_product'])->name('add_product');

Route::get('/product_list', [ProductController::class, 'product_list'])->name('product_list');

Route::get('/buyer_list', [ProductController::class, 'buyer_list'])->name('buyer_list');

Route::get('/sold_product_list', [ProductController::class, 'sold_product_list'])->name('sold_product_list');
// END ADMIN ROUTE




// User

Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/success', function () {
    return 'Payment Successful';
})->name('success');
Route::get('/cancel', function () {
    return 'Payment Canceled';
})->name('cancel');
// Route::get('/payment/success', [StripeController::class, 'show'])->name('payment.success');
Route::get('/payment/success/{order_id}', [StripeController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel/{order_id}', [StripeController::class, 'cancel'])->name('payment.cancel');

//end user
Route::get('/login', [Logincontroller::class, 'showLoginForm'])->name('login');
Route::post('/login_user', [Logincontroller::class, 'login_user'])->name('login_user');



Route::get('/signup', [Logincontroller::class, 'showsignup'])->name('signup');
Route::post('/register_user', [Logincontroller::class, 'register_user'])->name('register_user');
Route::post('/signout', [Logincontroller::class, 'signout'])->name('signout');

