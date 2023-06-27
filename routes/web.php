<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;


//Visi produkti
Route::get('/', [ProductController::class, 'index']);

//uzrāda produkta izveidošanas aptauju
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');

//glabas produktu datus
Route::post('/products', [ProductController::class, 'store'])->middleware('auth');

//rediģēšana
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->middleware('auth');

//redigensanas apstiprinasana
Route::put('/products/{id}', [ProductController::class, 'update'])->middleware('auth');

//Dzēst
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware('auth');

//parvalidt produktus
Route::get('/products/manage', [ProductController::class, 'manage'])->middleware('auth');

//Viens produkts
Route::get('/products/{id}', [ProductController::class, 'show']);

//registracija
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//izveidot jaunu lietotāju
Route::post('/users', [UserController::class, 'store']);

//Izlogot lietotaju
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Ielogošanās ekarāns
Route::get('/login', [UserController::class, 'login'])
->name('login')->middleware('guest');

//Lietotāja ielogošanās
Route::post('/users/login', [UserController::class, 'authenticate']);

Route::get('/most-viewed', [ProductController::class, 'mostViewed']);
