@extends('shared.layout')
@section('content')
<main class="flex-shrink-0">
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
</main>
@endsection

@section('scripts')
@endsection
