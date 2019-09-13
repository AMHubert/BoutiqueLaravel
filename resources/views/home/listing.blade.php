@extends('shared.layout')
@section('content')
<section class="container my-3">
    @if (!empty($search))
        <h3>Votre recherche: {{$search}}</h3>
    @endif
    @foreach ($products as $product)
        @if($loop->index % 4 === 0)
            <div class="row card-y-spacer">
        @endif
        <div class="col-3">
            <div class="card text-center h-100">
                <div class="card-list-img">
                    <img src="{{asset('resources/img/game/gameBoxArt/'.$product->product_image)}}" class="card-img-top game-img" alt="Image de {{$product->product_name}}">
                    @if($product->product_stock === 0)
                        <div class="out-stock">
                            <div class="overlay-text">Non disponible</div>
                        </div>
                    @endif
                </div>
                <div class="card-body d-inline-flex justify-content-center flex-wrap">
                    @if(!$isSearch)
                    <h5 class="card-title w-100">{{$product->product_name}}</h5>
                    <a href="{{route('product.details', ['categoryName' => str_replace(" ", "-", $category_name), 'productId' => $product->product_id])}}"
                        class="btn btn-primary align-self-end  stretched-link">Détails <i class="fas fa-angle-double-right"></i></a>
                    @else
                    <h5 class="card-title w-100">{{$product->product_name}} ({{$product->category_name}})</h5>
                    <a href="{{route('product.details', ['categoryName' => str_replace(" ", "-", $product->category_name), 'productId' => $product->product_id])}}"
                        class="btn btn-primary align-self-end stretched-link">Détails <i class="fas fa-angle-double-right"></i></a>
                    @endif
                </div>
            </div>
        </div>
        @if($loop->iteration % 4 === 0 || $loop->last)
            </div>
        @endif
    @endforeach
</section>
@endsection
