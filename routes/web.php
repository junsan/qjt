<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin/companies', function () {
    return view('admin.companies.index');
})->name('admin_companies');

Route::get('/admin/companies/create', function () {
    return view('admin.companies.create');
})->name('admin_companies_create');

Route::resource('companies', CompanyController::class);

