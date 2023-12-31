<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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

Route::apiResource('subjects', SubjectController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('videos', VideoController::class);
Route::apiResource('enrollments', EnrollmentController::class);
Route::post('/enrollments/store', [EnrollmentController::class, 'store']);
Route::get('/enrollments/user/{id}', [EnrollmentController::class, 'getEnrollmentByUserID']);
Route::apiResource('progress', ProgressController::class);
Route::apiResource('videolink', VideoLinkCategoryController::class);


Route::get('/items', [ApiController::class, 'index']);
Route::get('/items/{id}', [ApiController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::apiResource('categories', CategoryController::class);

Route::get('/users/{id}', [UserController::class, 'getUser']);
