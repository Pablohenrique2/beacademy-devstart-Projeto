<?php

use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'index'])->name('index');

Route::prefix('produtos')->group(function () {
    Route::get('', [StoreController::class, 'products'])->name('produtos');
    Route::get('/criar', [StoreController::class, 'create'])->middleware('can:admin')->name('produtos.criar');
    Route::get('/{id}', [StoreController::class, 'show'])->name('produtos.id');
});


Route::post('/bdproduto', [StoreController::class, 'store'])->name('bdproduto');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');
});