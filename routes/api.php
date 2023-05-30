<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ListController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories',CategoryController::class);
Route::apiResource('suppliers',SupplierController::class);
Route::apiResource('products',ProductController::class);
Route::get('lists',[ListController::class, 'index']);
Route::post('restockproducts/{id}',[ProductController::class, 'restock']);
