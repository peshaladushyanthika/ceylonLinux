<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Auth.login');
});
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@authenticate');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/admin/zone/create', [AdminController::class, 'showZoneForm'])->name('admin.zone');
    Route::post('/admin/zone/create', [AdminController::class, 'createZone'])->name('admin.zone');
    Route::get('/admin/region/create', [AdminController::class, 'showCreateRegionForm'])->name('admin.region');
    Route::post('/admin/region/create', [AdminController::class, 'createRegion'])->name('admin.region');
    Route::get('/admin/territory/create', [AdminController::class, 'showCreateTerritoryForm'])->name('admin.territory');
    Route::post('/admin/territory/create', [AdminController::class, 'storeTerritory'])->name('admin.territory');
    Route::get('/admin/distributor/create', [AdminController::class, 'userForm'])->name('admin.user');
    Route::post('/admin/distributor/create', [AdminController::class, 'createUser'])->name('admin.user');
    Route::get('/admin/product/create', [AdminController::class, 'productForm'])->name('admin.product');
    Route::post('/admin/product/create', [AdminController::class, 'createProduct'])->name('admin.product');
    Route::post('/user/dashboard', [AdminController::class, 'createOrder'])->name('user.dashboard');
    Route::get('/user/orders', [AdminController::class, 'viewOrder'])->name('user.order');
});
