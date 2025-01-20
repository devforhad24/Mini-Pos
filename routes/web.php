<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\UsersController;
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

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.confirm');

Route::group(['middleware' => 'auth'],function () {

    Route::get('dashboard', function () {
        return view('dashboard');
    });

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('groups', [UserGroupsController::class, 'index']);
    Route::get('groups/create', [UserGroupsController::class, 'create']);
    Route::post('groups', [UserGroupsController::class, 'store']);
    Route::delete('groups/{id}', [UserGroupsController::class, 'destroy']);

    Route::resource('users', UsersController::class);
    Route::get('users/{id}/sales', [UserSalesController::class, 'index'])->name('user.sales');
    Route::get('users/{id}/purchases', [UserPurchasesController::class, 'index'])->name('user.purchases');
    Route::get('users/{id}/payments', [UserPaymentsController::class, 'index'])->name('user.payments');
    Route::get('users/{id}/receipts', [UserReceiptsController::class, 'index'])->name('user.receipts');



    Route::resource('categories', CategoriesController::class, ['except' => ['show']]);

    Route::resource('products', ProductsController::class);

});
