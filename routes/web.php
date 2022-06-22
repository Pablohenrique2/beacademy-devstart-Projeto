<?php

use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/produtos', [StoreController::class, 'products']);
Route::get('/', [StoreController::class, 'index']);