<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
//Visi produkti
Route::get('/', function () {
    return view('products', [
        'products' => Product::all()
    ]);
});
//Viens produkts
Route::get('product/{id}', function ($id) {
    return view('product', [
        'products' => Product::find($id)
    ]);
});
/* Treniņu funkcijas
Route::get('/hello', function () {
    return response('<h1>hello</h1>');
});

Route::get('/post/{id}', function ($id) {
    ddd($id);
    return response('Sveiks NR. - ' . $id);
})->where('id', '[0-9]+');
*/
