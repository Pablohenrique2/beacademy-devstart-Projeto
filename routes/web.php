<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/', [StoreController::class, 'index'])->name('home');

Route::prefix('produtos')->group(function () {
    Route::match(['get', 'post'], '', [StoreController::class, 'products'])->name('produtos');
    Route::match(['get', 'post'], '/{idcategory?}/produtos', [StoreController::class, 'products'])->name('categoria.id');
    Route::match(['get', 'post'], '/pesquisa', [StoreController::class, 'products_search'])->name('produtos.search');
    Route::match(['get', 'post'], '/criar', [StoreController::class, 'create'])->middleware('can:admin')->name('produtos.criar');
    Route::match(['get', 'post'], '/list', [StoreController::class, 'list'])->middleware('can:admin')->name('produtos-list');
    Route::match(['get', 'post'], '/{id}', [StoreController::class, 'show'])->name('produtos.id');
    Route::match(['get', 'post'], '/editar/{id}', [StoreController::class, 'edit'])->name('produtos-edit');
    Route::delete('/{id}', [StoreController::class, 'destroy'])->middleware('can:admin')->name('produtos-delete-id');
    Route::put('/update/{id}', [StoreController::class, 'update'])->middleware('can:admin')->name('produtos-update');
});
Route::prefix('categoria')->group(function () {
    Route::match(['get', 'post'], '', [CategoryController::class, 'index'])->name('category.index');
    Route::match(['get', 'post'], '/create', [CategoryController::class, 'create'])->name('category.create');
    Route::match(['get', 'post'], '/store', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::match(['get', 'post'], '/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
});

Route::prefix('carrinho')->group(
    function () {

        Route::match(['get', 'post'], '', [CartController::class, 'viewCart'])->name('viewcart');
        Route::match(['get', 'post'], '/adicionar', [CartController::class, 'addcart'])->name('addcart');
        Route::delete('/delete', [CartController::class, 'deleteCart'])->name('cartdelete');
        Route::match(['get', 'post'], '/concluir', [CartController::class, 'concludeCart'])->name('concludeCart');
        Route::match(['get', 'post'], '/compras', [CartController::class, 'shoppingCart'])->name('shoppingCart');
        Route::match(['get', 'post'], '/cancelar', [CartController::class, 'cancelCart'])->name('cancelCart');
    }
);

Route::post('/bdproduto', [StoreController::class, 'store'])->name('bdproduto');
Route::match(['get', 'post'], '/contato', [StoreController::class, 'contact'])->name('index.contact');