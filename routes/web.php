<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ValidationController;
use Illuminate\Support\Facades\Route;


            //=== 15.04.2022 ===/




//======= 1.Route Prefix 2.Route Name Prefixe =======//
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //=== Route Middleware ===//
    Route::get('/middleware1', [HomeController::class, 'profile'])
    ->middleware('verify-token')
    ->name('middleware1');
    Route::get('/contact-us', [HomeController::class, 'contactUs'])
    ->middleware('verify-token')
    ->name('contactus');
    Route::get('/middleware1', [HomeController::class, 'profile'])
    ->middleware('verify-token')
    ->name('middleware1');

    //=== Group Middleware ===//
    Route::group(['middleware'=>['protectedPage']], function(){

        Route::get('/middleware2', [HomeController::class, 'profile'])
        ->middleware('verify-token')
        ->name('middleware2');
       
    });


});





Route::name('admin.')->group(function () {
   
    Route::get('/validation', [ValidationController::class, 'index'])->name('validation');
});


   



