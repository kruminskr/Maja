@extends('layout')

@section('content')
@include('partials._hero')
@include('partials._search')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@if(count($products) == 0)
    <p>No listings found</p>
@else
@foreach($products as $product)
    <x-product-card :product=$product/>
    @endforeach
@endif
</div>

<div class="mt-6 p-4">
    {{$products->links()}}
</div>
@endsection
