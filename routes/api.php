<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ListController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ActivityController;

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
Route::apiResource('purchases',PurchaseController::class);
Route::apiResource('users',UserController::class);
Route::get('lists',[ListController::class, 'index']);
Route::post('restockproducts/{id}',[ProductController::class, 'restock']);
Route::put('reduceproductpieces/{id}',[ProductController::class,'reducePieces']);
Route::post('login', [AuthController::class, 'login'])->name('login');
// Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::put('profile/{id}',[ProfileController::class, 'update']);
Route::put('changepassword/{id}',[ProfileController::class, 'changePassword']);
Route::get('salestotal',[PurchaseController::class,'salesTotal']);
Route::get('activities/{id}',[ActivityController::class,'activities']);