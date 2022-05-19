<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\CollectionController;
use Illuminate\Support\Facades\Route;


//=== 15.04.2022 ===/




//======= 1.Route Prefix 2.Route Name Prefixe =======//
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //=== Route Middleware ===//
    Route::get('/middleware1', [HomeController::class, 'profile'])
        ->middleware('verify-token')
        ->name('middleware1');

    Route::get('/middleware1', [HomeController::class, 'profile'])
        ->middleware('verify-token')
        ->name('middleware1');

    //=== Group Middleware ===//
    Route::group(['middleware' => ['protectedPage']], function () {

        Route::get('/middleware2', [HomeController::class, 'profile'])
            ->middleware('verify-token')
            ->name('middleware2');
    });

    Route::get('/views-blade', [HomeController::class, 'viewAndBlade'])
        ->middleware('verify-token')
        ->name('viewAndBlade');
});




Route::name('admin.')->group(function () {

    Route::resource('validations', ValidationController::class);

    Route::resource('validation', ValidationController::class)->names([
        'create' => 'validation.create'
    ]);
});


//======= Model =======//

Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blogs', [HomeController::class, 'getBlog'])->name('blogs');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/product-delete', [HomeController::class, 'productDelete'])->name('product-delete');


//======= Collection =======//

Route::get('/collection', [CollectionController::class, 'index'])->name('collection');