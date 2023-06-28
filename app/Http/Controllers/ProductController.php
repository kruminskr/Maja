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
        (request(['tag', 'search']))->paginate(4)
    ]);
    }

      //uzrāda vienu produktu
      public function show($id)
      {
          $product = Product::findOrFail($id);
      
          $product->increment('view_count');
      
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

            if($request->hasFile('picture')) {
                $formFields['picture'] = $request->file('picture')
                ->store('pictures', 'public');
            }

            $formFields['user_id'] = auth()->id();

            Product::create($formFields);

            return redirect('/')->with
            ('message', 'Product created');
      }

      public function edit($id) {

            $product = Product::findOrFail($id);

            return view('products.edit', ['product' => $product]);
      }

      public function update (Request $request, $id) {
        $product = Product::findOrFail($id);

        if($product->user_id != auth()->id()) {
            abort(403, 'You do not have access to this');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'tags' => 'required',
            'quantity' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')
            ->store('pictures', 'public');
        }

        $product->update($formFields);

        return back()->with
        ('message', 'Product updated');
  }

  public function destroy($id) {

    $product = Product::findOrFail($id);

    if($product->user_id != auth()->id()) {
        abort(403, 'You do not have access to this');
    }

    $product->delete();

    return redirect('/')->with
    ('message', 'Product deleted');
  }

  public function manage() {
    return view('products.manage', ['products' => auth()
    ->user()->products()->get()]);
  }

  public function mostViewed() {
    $mostViewed = Product::orderBy('view_count', 'desc')->take(5)->get();

    return view('products.most_viewed', [
        'mostViewed' => $mostViewed,
    ]);
    }

    public function sortByPriceAsc()
    {
        $products = Product::orderBy('price', 'asc')->get();

        return view('products.asc', ['products' => $products]);
    }

    public function sortByPriceDesc()
    {
        $products = Product::orderBy('price', 'desc')->get();

        return view('products.desc', ['products' => $products]);
    }


}
