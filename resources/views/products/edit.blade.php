@extends('layout')
@section('content')
<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
        @lang('messages.existing')
        </h2>
        <p class="mb-4">@lang('messages.edit') {{$product->title}}</p>
    </header>

    <form method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2">@lang('messages.title')</label>
            <input type="text"class="border border-gray-200 rounded p-2 w-full"
                name="title"placeholder="@lang('messages.title-example')"value="{{$product->title}}"/>
                @error('title')
                <p class=" text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="price"class="inline-block text-lg mb-2">@lang('messages.price')</label>
            <input type="number" class="border border-gray-200 rounded p-2 w-full"
                name="price"placeholder="2700"value="{{$product->price}}"/>
            @error('price')
                <p class=" text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">
            @lang('messages.tags')
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full"
                name="tags"placeholder="@lang('messages.tags-example')"value="{{$product->tags}}"/>
            @error('tags')
                <p class=" text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="picture" class="inline-block text-lg mb-2">
            @lang('messages.picture')
            </label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="picture"/>
                <img class="w-48 mr-6 mb-6" src="{{$product->picture ? asset('storage/' . $product->picture) : asset('/images/default.png')}}"
                alt=""/>
            @error('picture')
                <p class=" text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="price"class="inline-block text-lg mb-2">@lang('messages.quantity')</label>
            <input type="number"class="border border-gray-200 rounded p-2 w-full"
                name="quantity"placeholder="@lang('messages.quantity-example')"value="{{$product->quantity}}"/>
            @error('quantity')
                <p class=" text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <label for="description"class="inline-block text-lg mb-2">
            @lang('messages.description')
            </label>
            <textarea  class="border border-gray-200 rounded p-2 w-full"
                name="description"rows="10"placeholder="@lang('messages.description-example')">{{$product->description}}</textarea>
            @error('description')
                <p class=" text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            @lang('messages.update')
            </button>

            <a href="/" class="text-black ml-4"> @lang('messages.back') </a>
        </div>
    </form>
</div>
@endsection
