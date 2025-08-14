<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\userValidation;



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware(userValidation::class);
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::put('update-profile', [UserController::class, 'profileupdate'])->name('profile.update');

// Route::resource('/users', UserController::class);
Route::get('/users',[UserController::class,'login'])->name('users.login');
Route::get('/users/create/register',[UserController::class,'register'])->name('users.register');
Route::post('/users/saveregister',[UserController::class,'saveregister'])->name('users.saveregister');
Route::post('/users/checkcreatdantial',[UserController::class,'validatecredential'])->name('users.validatecredential');

Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('profile', [UserController::class, 'showProfile'])->name('profile.show');
Route::get('update-profile', [UserController::class, 'updateProfile'])->name('profile.update');//sendEmail
Route::post('send-email', [App\Http\Controllers\SendEmailController::class, 'sendEmail'])->name('send.email');


Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::put('/cart/update/{cartItem}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});


// Route::get('/products/{product}/calculate-gst', [ProductController::class, 'calculateGST'])->name('products.calculate-gst');

// Route::get('/products/{email}/send-email', [ProductController::class, 'isValidEmail'])->name('products.send-email');

// Route::get('/test-missing-file', [ProductController::class, 'testMissingFile']);

// Route::get('/test-undefined-function', [ProductController::class, 'testUndefinedFunction']);

// Route::get('/divide/{numerator}/{denominator}', [ProductController::class, 'handleDivision']);