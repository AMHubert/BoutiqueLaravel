@extends('shared.layout')
@section('content')
<h1>Listing Page {{$category}}</h1>
<li>
    @foreach ($products as $product)
        <ul>{{$product->product_name}}</ul>
    @endforeach
</li>
@endsection
