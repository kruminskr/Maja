<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    //uzrāda visus produktus
    public function index(Request $request) {    
        return view('products.index', [
        'products' => Product::latest()->filter
        (request(['tag', 'search']))->get()
    ]);
    }

      //uzrāda vienu produktu
      public function show($id)
      {
          $product = Product::findOrFail($id);
      
          return view('products.show', [
              'product' => $product
          ]);
      }

      public function create() {
        return view('products.create');
      }

      public function store(Request $request) {
            $formFields = $request->validate([
                'title' => ['required', Rule::unique('products','title')] ,
                'price' => 'required',
                'tags' => 'required',
                'quantity' => 'required',
                'description' => 'required'
            ]);

            Product::create($formFields);

      }
}
