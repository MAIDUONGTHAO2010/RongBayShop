<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\CategoryFilterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\FilterController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/category_product', [CategoryProductController::class, 'create']);
Route::delete('/category_product/{id}', [CategoryProductController::class, 'delete']);
Route::get('/category_product', [CategoryProductController::class, 'getAll']);
Route::get('/category_product/{id}', [CategoryProductController::class, 'getById']);
Route::put('/category_product/{id}', [CategoryProductController::class, 'update']);

Route::post('/product', [ProductController::class, 'create']);
Route::get('/product', [ProductController::class, 'getAll']);
Route::post('/productUpdate', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'delete']);
Route::get('/product/{id}', [ProductController::class, 'getById']);

Route::post('/register', [AccountController::class, 'register']);
Route::post('/login', [AccountController::class, 'login']);
Route::get('/getUser', [AccountController::class, 'getUser']);



Route::post('/category_filter', [CategoryFilterController::class, 'create']);
Route::get('/category_filter', [CategoryFilterController::class, 'getAll']);
Route::get('/category_filter/{id}', [CategoryFilterController::class, 'getById']);
Route::put('/category_filter/{id}', [CategoryFilterController::class, 'update']);
Route::delete('/category_filter/{id}', [CategoryFilterController::class, 'delete']);

Route::post('/filter', [FilterController::class, 'create']);
