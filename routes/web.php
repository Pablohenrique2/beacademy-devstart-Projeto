<?php

use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'index']);
Route::get('/produtos', [StoreController::class, 'products']);
Route::get('/produtos/criar', [StoreController::class, 'create']);
Route::get('/produtos/{id}', [StoreController::class, 'show']);

Route::post('/bdproduto', [StoreController::class, 'store']);