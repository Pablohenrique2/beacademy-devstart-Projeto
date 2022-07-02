<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/', [StoreController::class, 'index'])->name('home');

Route::prefix('produtos')->group(function () {
    Route::match(['get', 'post'], '', [StoreController::class, 'products'])->name('produtos');
    Route::match(['get', 'post'], '/criar', [StoreController::class, 'create'])->middleware('can:admin')->name('produtos-criar');
    Route::match(['get', 'post'], '/list', [StoreController::class, 'list'])->middleware('can:admin')->name('produtos-list');
    Route::match(['get', 'post'], '/{id}', [StoreController::class, 'show'])->name('produtos-id');
    Route::match(['get', 'post'], '/editar/{id}', [StoreController::class, 'edit'])->name('produtos-edit');
    Route::delete('/{id}', [StoreController::class, 'destroy'])->middleware('can:admin')->name('produtos-delete-id');
    Route::put('/update/{id}', [StoreController::class, 'update'])->middleware('can:admin')->name('produtos-update');
});

Route::match(['get', 'post'], '/categoria', [StoreController::class, 'category'])->name('categoria');
Route::match(['get', 'post'], '/{idcategory?}/categoria', [StoreController::class, 'category'])->name('categoria_por_id');

Route::match(['get', 'post'], '/{idproduct}/carrinho/adicionar', [CartController::class, 'addcart'])->name('addcart');
Route::match(['get', 'post'], '/carrinho', [CartController::class, 'viewCart'])->name('viewcart');
Route::match(['get', 'post'], '/{indice}/excluircarrinho', [CartController::class, 'deleteCart'])->name('cart_delete');




Route::match(['get', 'post'], '/cadastrei', [ClienteController::class, 'cadastrar'])->name('cadastrar');

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