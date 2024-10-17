<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;





// =============Home Controller==================

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about-us',[HomeController::class,'about'])->name('about');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

