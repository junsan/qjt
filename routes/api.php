<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('industries', [IndustryController::class, 'all']);
Route::get('categories', [CategoryController::class, 'all']);
Route::get('jobs', [JobController::class, 'all']);
Route::get('job/{job}', [JobController::class, 'show']);
Route::get('search', [JobController::class, 'search']);

Route::apiResource('experience', ExperienceController::class);
Route::apiResource('education', EducationController::class);
