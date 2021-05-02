<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('front.home');
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('front.shop');
Route::resource('product', ProductController::class);

// ACCOUNT ROUTES 
Route::group(['prefix' => 'account', 'as' => 'account.', 'namespace' => 'Account'], function () {
    Route::view('/', 'back.dashboard')->name('dashboard');
    Route::resources([
        'products' => ProductController::class,
        'categories' => CategoryController::class,
        'orders' => OrderController::class,
        'pages' => PageController::class,
        'menus' => MenuController::class,
    ]);
    Route::resource('settings', SettingController::class)->only(['index', 'update']);
});
