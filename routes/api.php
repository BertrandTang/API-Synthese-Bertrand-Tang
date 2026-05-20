<?php

use App\Http\Controllers\ShoppingListController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/shopping-list', [ShoppingListController::class, 'show']);
    Route::post('/shopping-list/items', [ShoppingListController::class, 'storeItem']);
    Route::put('/shopping-list/items/{item}', [ShoppingListController::class, 'updateItem']);
    Route::delete('/shopping-list/items/{item}', [ShoppingListController::class, 'destroyItem']);
});
