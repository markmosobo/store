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

// Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function(){
//     Route::get('/user', function( Request $request ){
//       return $request->user();
//     });


    
// });

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
Route::put('profile/{id}',[ProfileController::class, 'update']);
Route::put('changepassword/{id}',[ProfileController::class, 'changePassword']);
Route::get('activities/{id}',[ActivityController::class,'activities']);
Route::get('useractivities/{id}',[ActivityController::class,'userActivity']);
Route::get('mypurchases',[PurchaseController::class,'myPurchases']);
Route::get('myrevenue/{id}',[PurchaseController::class,'myRevenue']);
Route::post('login', [AuthController::class, 'login'])->name('login');
// Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('userpurchases',[PurchaseController::class,'userPurchases']);
Route::get('userrevenue',[PurchaseController::class,'userRevenue']);

