<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Laravel\Fortify\Features;


if (Features::enabled(Features::registration())) {
    Route::get('/register', function () {
        abort(404); 
    });
}

Route::get('/user/api-tokens', function () {
    abort(404);  
});

// =============Home Controller==================

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about-us',[HomeController::class,'about'])->name('about');
Route::get('/explore/{slug}',[HomeController::class,'explore'])->name('explore');



