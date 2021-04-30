<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Account\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Account\SettingController;
use App\Http\Controllers\Account\CategoryController;

require __DIR__ . '/auth.php';


Route::get('/', [HomeController::class, 'index'])->name('front.home');
Route::get('/shop', [ShopController::class, 'index'])->name('front.shop');
Route::resource('product', ProductController::class);

// ACCOUNT ROUTES 
Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
    Route::view('/', 'back.dashboard')->name('dashboard');
    Route::resources([
        'products' => ProductController::class,
        'categories' => CategoryController::class,
        'brands' => BrandController::class,
    ]);
    Route::resource('settings', SettingController::class)->only(['index', 'update']);
});
