<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ShoppingListController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::middleware('User:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/list', [ShoppingListController::class, 'show'])->name('list.show');
    Route::post('/items', [ShoppingListController::class, 'storeItem'])->name('items.store');
    Route::put('/items/{item}', [ShoppingListController::class, 'updateItem'])->name('items.update');
    Route::delete('/items/{item}', [ShoppingListController::class, 'destroyItem'])->name('items.destroy');
});
