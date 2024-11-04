<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Laravel\Fortify\Features;



Route::get('/user/api-tokens', function () {
    abort(404);  
});

// =============Home Controller==================

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about-us',[HomeController::class,'about'])->name('about');
Route::get('/explore/{slug}',[HomeController::class,'explore'])->name('explore');
Route::get('/terms-of-use',[HomeController::class,'terms_of_use'])->name('terms-of-use');
Route::get('/privacy-policy',[HomeController::class,'privacy_policy'])->name('privacy-policy');



