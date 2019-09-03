@extends('shared.layout')
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-4">
            <img src="resources/img/game/gameBoxArt/{$product->_image}" class="details-img" alt="Image de {$product->_name}">
        </div>
        <div class="col-6">
            <h3 class="text-underline">{$product->_name} :</h3>
            @if($product->_platform)
                <h4>Plateforme : {$product->_platform}</h4>
            {/if}
            <h4>Description :</h4>
            <p>{$product->_description}</p>
            <h4>Prix :</h4>
            <p>{$product->_price}€</p>
            {if $product->_stock === 0}
            <div class="mr-3 d-inline-flex">
                <p>Non disponible</p>
            </div>
            <input type="button" class="btn btn-success" value="Ajouter au panier" disabled>
            {else}
            <form class="form-inline" action="addToCart.php" method="post">
                <input type="hidden" name="productId" value="{$product->_id}">
                <div class="qte-input mr-3 d-inline-flex">
                    <label class="mr-2" for="quantity">Qte:</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" min="1" value="1">
                </div>
                <input type="submit" class="btn btn-success" value="Ajouter au panier">
            </form>
            {/if}
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $("input[type='number']").inputSpinner()
</script>
@endsection
