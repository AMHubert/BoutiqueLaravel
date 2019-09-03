@extends('shared.layout')
@section('content')
    <div class="container-fluid">
        <h1>Hello World !</h1>
        <ul>
        @foreach ($products as $product)
            @foreach ($product->categories as $category)
                <li>{{$category->category_name}}</li>
            @endforeach
        @endforeach
        </ul>
    </div>
@endsection

@section('scripts')
@endsection
