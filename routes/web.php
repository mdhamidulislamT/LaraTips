<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\OtherContolller;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\StripePaymentController;

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


Route::resource('crud', ResourceController::class)->names([
    'index' => 'crud.index',
    'store' => 'crud.store',
    'show' => 'crud.show',
    'update' => 'crud.update',
    'destroy' => 'crud.destroy',
]);
Route::get('crud/show2/{product}', [ResourceController::class, 'show2'])->name('crud.show2');


//======= Model =======//
Route::controller(HomeController::class)->group(function () {
    Route::get('/blog',  'blog')->name('blog');
    Route::get('/blogs',  'getBlog')->name('blogs');
    Route::get('/product',  'product')->name('product');
    Route::get('/product-delete',  'productDelete')->name('product.delete');
});

//======= Other =======//
Route::controller(OtherContolller::class)->group(function () {
    //======= Response =======//
    Route::get('/response', 'response')->name('response');
    Route::get('/response2', 'response2')->name('response2');
    Route::get('/redirecToGoggle', 'redirecToGoggle')->name('redirecToGoggle');
    //======= Error Handling =======//
    Route::get('/404',  'Error404')->name('404');
    //======= Encryption =======//
    Route::get('/encryption',  'encryption')->name('encryption');
    Route::get('/hashing',  'hashing')->name('hashing');

});



//======= Collection =======//
Route::prefix('collection')->name('collection.')->group(function () {
    Route::get('/index', [CollectionController::class, 'index'])->name('index');
    Route::get('/chunk', [CollectionController::class, 'chunk'])->name('chunk');
    Route::get('/cache', [CollectionController::class, 'cache'])->name('cache');
});//======= End Collection =======//

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
// test with where deleted = 'No'
Route::get('/testData', [RelationshipController::class, 'testData'])->name('relationship.testData');

// Event
Route::controller(EventController::class)->group(function () {
    Route::get('/event',  'index')->name('event.index');
    Route::post('/store',  'store')->name('event.store');

    Route::get('/queue',  'queueIndex')->name('queue.index');
    Route::post('/updateBigData',  'updateBigData')->name('queue.updateBigData');
});


Route::get('/this-from-shoppingCart', [ShoppingCartController::class, 'thisFromShoppingCart']);

//===  Yajra DataTables
Route::get('/datatable', [CollectionController::class, 'postIndex'])->name('datatable');
Route::get('/getPosts', [CollectionController::class, 'getPosts'])->name('getPosts');
Route::post('/editPost', [CollectionController::class, 'editPost'])->name('editPost');
Route::post('/deletePost', [CollectionController::class, 'deletePost'])->name('deletePost');

//===  shoppingcart
Route::get('/shoppingcart', [ShoppingCartController::class, 'index'])->name('shoppingcart');
Route::get('/getCategoryWiseProducts', [ShoppingCartController::class, 'getCategoryWiseProducts'])->name('shoppingcart.getCategoryWiseProducts');
Route::get('/from-relationship', [RelationshipController::class, 'fromFelationship']);

//===  Stripe Payment Gateway
Route::get('stripe', [StripePaymentController::class, 'stripe'])->name('stripe');
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

//===  File Storage
Route::get('file-view', [PhotoController::class, 'index'])->name('fileView');
Route::resource('photos', PhotoController::class)->names([
    'index' => 'photos.index',
    'store' => 'photos.store',
]);
Route::post('photo-store2', [PhotoController::class, 'store2'])->name('photo.store2');


//Route::get('importExportView', [ExcelController::class, 'importExportView'])->name('importExportView');
Route::view('/importExportView', 'import',  ['name' => 'Taylor'])->name('importExportView'); // shortcut
Route::get('export', [ExcelController::class, 'export'])->name('export');
Route::post('import', [ExcelController::class, 'import'])->name('import');

// Observers
Route::get('observers', [TestController::class, 'create'])->name('observers');