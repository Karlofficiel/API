<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\LoginController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/', [RegisterUserController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);


Route::post('/produits', [ProduitController::class, 'createproduit']);
Route::get('/produits', [ProduitController::class, 'showproduits']);
Route::delete('/produits/{id}', [ProduitController::class, 'deleteproduit']);
Route::put('/produits/{id}', [ProduitController::class, 'updateproduit']);



