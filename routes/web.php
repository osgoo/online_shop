<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('/admin')->middleware(AdminMiddleware::class)->name('admin.')->group(function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/category', function () {
            $categories = category::all();
            return view('admin.category.index', compact('categories'));
    })->name('category');
    Route::controller(CategoryController::class)->group(function(){


        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/store', 'store')->name('category.store');
        Route::get('/category/edit/{id}', 'edit')->name('category.edit');
        Route::put('/category/update/{id}', 'update')->name('category.update');
        Route::delete('/category/{id}', 'destroy')->name('category.destroy');
    });



    Route::controller(ProductController::class)->group(function(){
        Route::get('/product', [ProductController::class, 'index'])->name('product');
        Route::get('/product/create', 'create')->name('product.create');
        Route::post('/product/store', 'store')->name('product.store');
        Route::get('/product/edit/{id}', 'edit')->name('product.edit');
        Route::put('/product/update/{id}', 'update')->name('product.update');
        Route::delete('/product/{id}', 'destroy')->name('product.destroy');
        Route::get('/product/show/{id}', 'show')->name('product.show');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




});


require __DIR__.'/auth.php';
