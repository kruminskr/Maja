@extends('layout')

@section('content')
<h1>Products</h1>
@if(count($products) == 0)
    <p>No listings found</p>
@else
    @foreach($products as $product)
    <h2>
        <a href="/product/{{$product['id']}}">{{$product['title']}}</a>
    </h2>
    <p>
        {{$product['description']}}
    </p>
    @endforeach
@endif
@endsection
