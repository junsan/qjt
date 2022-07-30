<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
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
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');;

Route::get('/register', function () {
    return view('register');
})->name('register')->middleware('guest');;

Route::post('users/store', [UserController::class, 'store'])->name('user.store')->middleware('guest');
Route::get('users/logout', [UserController::class, 'logout'])->name('user.logout')->middleware('auth');
Route::post('users/authenticate', [UserController::class, 'authenticate'])->name('user.authenticate')->middleware('guest');

Route::get('/resume', function () {
    return view('resume');
})->name('resume')->middleware('auth');

Route::get('/jobs',[JobController::class, 'search_jobs'])->name('jobs');

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