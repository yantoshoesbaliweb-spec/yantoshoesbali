<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminContentController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Halaman Pengunjung (Visitor)
|--------------------------------------------------------------------------
*/
Route::get('/', [VisitorController::class, 'home'])->name('visitor.home');
Route::get('/catalog', [VisitorController::class, 'catalog'])->name('visitor.catalog');

/*
|--------------------------------------------------------------------------
| Autentikasi (Login & Logout)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Halaman Admin (Dilindungi Auth Middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    /* Products (Boots Catalog) CRUD */
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
    Route::put('/products/{product}', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{product}', [AdminController::class, 'deleteProduct'])->name('products.delete');
    Route::patch('/products/{product}/toggle', [AdminController::class, 'toggleProductStatus'])->name('products.toggle');

    /* Orders & Inquiries */
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');

    /* User Profile / Setting User */
    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');

    /* Content Management (Header, Story, Vision, Testimonies) */
    Route::prefix('content')->name('content.')->group(function () {
        Route::get('/header', [AdminContentController::class, 'header'])->name('header');
        Route::post('/header', [AdminContentController::class, 'updateHeader'])->name('header.update');

        Route::get('/story', [AdminContentController::class, 'story'])->name('story');
        Route::post('/story', [AdminContentController::class, 'updateStory'])->name('story.update');

        Route::get('/vision', [AdminContentController::class, 'vision'])->name('vision');
        Route::post('/vision', [AdminContentController::class, 'updateVision'])->name('vision.update');

        Route::get('/testimonies', [AdminContentController::class, 'testimonies'])->name('testimonies');
        Route::post('/testimonies', [AdminContentController::class, 'updateTestimonies'])->name('testimonies.update');
    });

    /* About Us (Contact & Stores) */
    Route::prefix('about')->name('about.')->group(function () {
        Route::get('/contact', [AdminContentController::class, 'contact'])->name('contact');
        Route::post('/contact', [AdminContentController::class, 'updateContact'])->name('contact.update');

        Route::get('/stores', [AdminContentController::class, 'stores'])->name('stores');
        Route::post('/stores', [AdminContentController::class, 'updateStores'])->name('stores.update');
    });
});
