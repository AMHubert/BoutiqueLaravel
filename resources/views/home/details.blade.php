@extends('shared.layout')
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-4">
            <img src="{{asset('resources/img/game/gameBoxArt/'.$product->product_image)}}" class="details-img" alt="Image de {{$product->product_name}}">
        </div>
        <div class="col-6">
            <h3 class="text-underline">{{$product->product_name}} :</h3>
            @if($category_name)
                <h4>Plateforme : {{$category_name}}</h4>
            @endif
            <h4>Description :</h4>
            <p>{!! $product->product_description !!}</p>
            <h4>Prix :</h4>
            <p>{{$product->product_price}}€</p>
            @if($product->product_stock === 0)
            <div class="mr-3 d-inline-flex">
                <p>Non disponible</p>
            </div>
            <input type="button" class="btn btn-success" value="Ajouter au panier" disabled>
            @else
            <form class="form-inline" action="{{route('cart.add')}}" method="post">
                @csrf
                <input type="hidden" name="productId" value="{{$product->product_id}}">
                <input type="hidden" name="productCat" value="{{$category_name}}">
                <div class="qte-input mr-3 d-inline-flex">
                    <label class="mr-2" for="quantity">Qte:</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" min="1" value="1">
                </div>
                <input type="submit" class="btn btn-success" value="Ajouter au panier">
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $("input[type='number']").inputSpinner()
</script>
@endsection
