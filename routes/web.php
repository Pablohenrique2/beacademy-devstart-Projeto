<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/', [StoreController::class, 'index'])->name('home');

Route::prefix('produtos')->group(function () {
    Route::match(['get', 'post'], '', [StoreController::class, 'products'])->name('produtos');
    Route::match(['get', 'post'], '/criar', [StoreController::class, 'create'])->middleware('can:admin')->name('produtos-criar');
    Route::match(['get', 'post'], '/{id}', [StoreController::class, 'show'])->name('produtos.id');
});

Route::match(['get', 'post'], '/categoria', [StoreController::class, 'category'])->name('categoria');
Route::match(['get', 'post'], '/cadastrar', [ClienteController::class, 'cadastrar'])->name('cadastrar');

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