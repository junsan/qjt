<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndustryController;

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
    return view('index');
})->name('home');

Route::get('/jobs', function () {
    return view('jobs');
})->name('jobs');

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin_login');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin_dashboard');

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::resource('companies', CompanyController::class);
    });
});

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::resource('industries', IndustryController::class);
    });
});

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class);
    });
});

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::resource('jobs', JobController::class);
    });
});