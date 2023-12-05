<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderProductController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\User\CustomerController as UserCustomerController;

use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\User\OrderController as UserOrderController;

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\User\ProductController as UserProductController;

use App\Http\Controllers\Admin\OrderProductController as AdminOrderProductController;
use App\Http\Controllers\User\OrderProductController as UserOrderProductController;

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

// Display the welcome view when users access the root URL
Route::get('/', function () {
    return view('welcome');
});

// Display the dashboard view to authenticated and verified users
Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Provide CRUD operations for the different tables
Route::resource('customers', CustomerController::class);
Route::resource('orders', OrderController::class);
Route::resource('products', ProductController::class);
Route::resource('order_products', OrderProductController::class);

// Handle user profile editing and deletion for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::resource('/customers', UserCustomerController::class)
    ->middleware(['auth', 'role:user,admin'])
    ->names('user.customers')
    ->only(['index', 'show']);

Route::resource('/admin/customers', AdminCustomerController::class)->middleware(['auth', 'role:admin'])->names('admin.customers');

Route::resource('/orders', UserOrderController::class)
    ->middleware(['auth', 'role:user,admin'])
    ->names('user.orders')
    ->only(['index', 'show']);

Route::resource('/admin/orders', AdminOrderController::class)->middleware(['auth', 'role:admin'])->names('admin.orders');

Route::resource('/products', UserOrderProductController::class)
    ->middleware(['auth', 'role:user,admin'])
    ->names('user.products')
    ->only(['index', 'show']);

Route::resource('/admin/products', AdminProductController::class)->middleware(['auth', 'role:admin'])->names('admin.products');

Route::resource('/order_products', UserOrderProductController::class)
    ->middleware(['auth', 'role:user,admin'])
    ->names('user.order_products')
    ->only(['index', 'show']);

Route::resource('/admin/order_products', AdminOrderProductController::class)->middleware(['auth', 'role:admin'])->names('admin.order_products');

require __DIR__.'/auth.php';