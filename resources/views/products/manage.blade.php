@extends('layout')
@section('content')
<x-card class="p-10">
<header>
    <h1 class="text-3xl text-center font-bold my-6 uppercase">Manage Prodcuts</h1>
</header>

<table class="w-full table-auto rounded-sm">
    <tbody>
        @unless($products->isEmpty())
        @foreach($products as $product)
        <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <a href="">{{$product->title}}</a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <a href="/products/{{$product->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                    Edit</a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <form method="POST" action="/products/{{$product->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash">Delete</i></button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr class="border-grey-300">
            <td class=""px-4 py-8 border-t border-b border-grey-300 text-lg>
                <p class="text-center">No products found</p>
            </td>
        </tr>
        @endunless
        </tbody>
    </table>
</x-card>
<x-card style="display: flex; justify-content: center; align-items: center;">
  <a href="/products/create" class="bg-black text-white py-2 px-5">Create a new product</a>
</x-card>
@endsection