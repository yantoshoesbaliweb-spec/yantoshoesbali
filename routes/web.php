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

    /* Products CRUD */
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('products.create');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{product}', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{product}', [AdminController::class, 'deleteProduct'])->name('products.delete');
    Route::patch('/products/{product}/toggle', [AdminController::class, 'toggleProductStatus'])->name('products.toggle');
    Route::delete('/product-images/{productImage}', [AdminController::class, 'deleteProductImage'])->name('products.image.delete');

    /* Categories CRUD */
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('categories.store');
    Route::put('/categories/{category}', [AdminController::class, 'updateCategory'])->name('categories.update');
    Route::delete('/categories/{category}', [AdminController::class, 'deleteCategory'])->name('categories.delete');

    /* Guides CRUD (Shoe Toe & Leather) */
    Route::prefix('guides')->name('guides.')->group(function () {
        Route::get('/shoe-toes', [AdminController::class, 'shoeToes'])->name('shoe-toes');
        Route::get('/shoe-toes/create', [AdminController::class, 'createShoeToe'])->name('shoe-toes.create');
        Route::post('/shoe-toes', [AdminController::class, 'storeShoeToe'])->name('shoe-toes.store');
        Route::get('/shoe-toes/{shoeToe}/edit', [AdminController::class, 'editShoeToe'])->name('shoe-toes.edit');
        Route::put('/shoe-toes/{shoeToe}', [AdminController::class, 'updateShoeToe'])->name('shoe-toes.update');
        Route::delete('/shoe-toes/{shoeToe}', [AdminController::class, 'destroyShoeToe'])->name('shoe-toes.destroy');

        Route::get('/leathers', [AdminController::class, 'leathers'])->name('leathers');
        Route::get('/leathers/create', [AdminController::class, 'createLeather'])->name('leathers.create');
        Route::post('/leathers', [AdminController::class, 'storeLeather'])->name('leathers.store');
        Route::get('/leathers/{leather}/edit', [AdminController::class, 'editLeather'])->name('leathers.edit');
        Route::put('/leathers/{leather}', [AdminController::class, 'updateLeather'])->name('leathers.update');
        Route::delete('/leathers/{leather}', [AdminController::class, 'destroyLeather'])->name('leathers.destroy');
    });

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
