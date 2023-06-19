@props(['product'])

<x-card>
    <div class="flex">
    <img
        class="hidden w-48 mr-6 md:block"
        src="{{asset('images/default.png')}}"
        alt=""
        />
    <div>
        <h3 class="text-2xl">
            <a href="/products/{{$product['id']}}">{{$product['title']}}</a>
        </h3>
        <div class="text-xl font-bold mb-4">{{$product['price']}} $</div>
        <x-product-tags :tagsCsv="$product->tags" />
        </div>
    </div>
</x-card>