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

//Viens produkts
Route::get('/products/{id}', [ProductController::class, 'show']);



/* Treniņu funkcijas
Route::get('/hello', function () {
    return response('<h1>hello</h1>');
});

Route::get('/post/{id}', function ($id) {
    ddd($id);
    return response('Sveiks NR. - ' . $id);
})->where('id', '[0-9]+');
*/
