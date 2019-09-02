@extends('shared.layout')
@section('content')
<form action="{{route('game.add')}}" method="POST">
    @csrf
    <label for="product_name">Name:</label>
    <input type="text" class="form-control" name="product_name" id="product_name">
    <label for="product_description">Description:</label>
    <textarea class="form-control" name="product_description" id="product_description"></textarea>
    <label for="product_price">Price:</label>
    <input type="text" class="form-control" name="product_price" id="product_price">
    <label for="product_stock">Stock:</label>
    <input type="text" class="form-control" name="product_stock" id="product_stock">
    @foreach ($categories as $category)
        <div class='col-6 custom-control custom-checkbox'>
            <input type='checkbox' class='custom-control-input' id="cat{{$category->category_id}}" name='categories[]' value='{{$category->category_id}}'>
            <label class='custom-control-label ml-3' for="cat{{$category->category_id}}">{{$category->category_name}}</label>
        </div>
    @endforeach
    <input type="submit" value="Valider">
</form>
@endsection
