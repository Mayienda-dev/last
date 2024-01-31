<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Page
    Route::get('/', function(){
        return view('welcome');
    });

    Route::get('/admin', [HomeController::class, 'index'])->middleware('auth')->name('admin');
// Property listings route
    Route::get('home',[ProductController::class, 'index'])->middleware('auth')->name('home');

// Show specific property
    Route::get('/properties/show/{id}', [ProductController::class, 'showProperties'])->middleware('auth');

    Route::get('/filter-properties', [ProductController::class, 'filterProperties'])->name('filter');

// Seller routes

    Route::get('/seller', [SellerController::class, 'index'])->name('seller');

    Route::get('/seller/account', [SellerController::class, 'createSellerAccount'])->name('account');

    Route::get('seller/dashboard', [SellerController::class, 'storeSellerAccount'])->name('sellerdashboard');

    Route::get('/seller/create', [SellerController::class, 'create'])->middleware('auth')->name('enlist');

    Route::post('/seller/store', [SellerController::class, 'store'])->name('success');

    Route::get('/seller/properties', [SellerController::class, 'showProperties'])->name('seller.properties');

    Route::get('/seller/properties/edit/{id}', [SellerController::class, 'edit'])->name('seller.edit');

    Route::get('/seller/update', [SellerController::class, 'update']);

    Route::get('/seller/delete', [SellerController::class, 'delete']);


        


//  Admin routes

Route::get('/admin/users', [AdminController::class, 'getUsers'])->middleware('auth');

Route::get('/admin/products', [AdminController::class, 'getProducts'])->middleware('auth');





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});

// Route::get('/profile',[ProductsController::class, 'index']);

require __DIR__.'/auth.php';
