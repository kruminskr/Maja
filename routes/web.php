<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;


//Visi produkti
Route::get('/', [ProductController::class, 'index']);

//uzrāda produkta izveidošanas aptauju
Route::get('/products/create', [ProductController::class, 'create']);

//glabas produktu datus
Route::post('/products', [ProductController::class, 'store']);

//rediģēšana
Route::get('/products/{id}/edit', [ProductController::class, 'edit']);

//redigensanas apstiprinasana
Route::put('/products/{id}', [ProductController::class, 'update']);

//Dzēst
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

//Viens produkts
Route::get('/products/{id}', [ProductController::class, 'show']);

