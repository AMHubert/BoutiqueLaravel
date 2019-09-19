@extends('shared.layout')
@section('content')
  <section class="content my-5">
    <div class="text-center">
      <h1 class="display-4">
        <img src="resources/img/brandBig.png" alt="Smarty Shop" height="150">
      </h1>
      <p class="lead">Le bon choix en terme d'achat de jeux vidéo</p>
      <hr class="my-4">
      <p>Découvrer nos jeux disponibles</p>
      <div>
        @foreach($categories as $category)
            @if($category->category_homepage)
            <a class="btn btn-primary btn-lg" href="{{route('listing.category', ['categoryName'=> str_replace(" ", "-", $category->category_name)])}}" role="button">{{$category->category_name}}</a>
            @endif
        @endforeach
      </div>
    </div>

    <section class="card-container">

        @foreach($productsCat as $product)
          <div class="card" style="width: 18rem;">
            <img src="{{asset('resources/img/game/gameBoxArt/'.$product->product_image)}}" class="card-img-top" alt="Image de {{$product->product_name}}" loading="lazy">
            <div class="card-body">
                <h5 class="card-title">{{$product->product_name}} ({{$product->category_name}})</h5>
                <p class="card-text">{!! $product->product_description !!}</p>
                {{-- <i href="{{route('product.details', ['categoryName' => str_replace(" ", "-", $product->category_name), 'productId' => $product->product_id])}}" class="btn btn-primary">Détails <i class="fas fa-angle-double-right"></i></i> --}}
            </div>
            <div class="card-footer">
                <a href="{{route('product.details', ['categoryName' => str_replace(" ", "-", $product->category_name), 'productId' => $product->product_id])}}" class="btn btn-primary">Détails <i class="fas fa-angle-double-right"></i></a>
            </div>
          </div>
        @endforeach

    </section>
  </section>
@endsection
