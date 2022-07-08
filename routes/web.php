<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\TestController;

//=== 15.04.2022 ===/



Route::get('/', [HomeController::class, 'index'])->name('admin.home');

//======= 1.Route Prefix 2.Route Name Prefixe =======//
Route::prefix('admin')->name('admin.')->group(function () {


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


Route::resource('test', TestController::class)->names([
    'index' => 'test.index',
    'store' => 'test.store',
    'show' => 'test.show',
]);



//======= Model =======//
Route::controller(HomeController::class)->group(function () {
    Route::get('/blog',  'blog')->name('blog');
    Route::get('/blogs',  'getBlog')->name('blogs');
    Route::get('/product',  'product')->name('product');
    Route::get('/product-delete',  'productDelete')->name('product.delete');
});


//======= Collection =======//
Route::get('/collection', [CollectionController::class, 'index'])->name('collection');
//======= Collection =======//
Route::get('/signupForm', [SignupController::class, 'signupForm'])->name('signup.form');
Route::post('signup', [SignupController::class, 'signup'])->name('signup');

Route::prefix('sale')->name('sale.')->controller(PurchaseController::class)->group(function () {
    Route::get('/addToCart', 'index')->name('addToCart');
    Route::post('/addToCart', 'addToCart')->name('addToCart');
    Route::get('/fetchCart', 'fetchCart')->name('fetchCart');
    Route::post('/updateCart', 'updateCart')->name('updateCart');
    Route::get('/removeProduct', 'removeProduct')->name('removeProduct');
    Route::get('/clearCart', 'clearCart')->name('clearCart');
});


Route::prefix('relationship')->name('relationship.')->controller(RelationshipController::class)->group(function () {
    Route::get('/one-to-one',  'oneToOne')->name('one-to-one');
    Route::get('/one-to-many',  'oneToMany')->name('one-to-many');
    Route::get('/many-to-many',  'manyToMany')->name('many-to-many');
    Route::get('/hasOneThrough',  'hasOneThrough')->name('hasOneThrough');
    Route::get('/hasManyThrough',  'hasManyThrough')->name('hasManyThrough');
});
