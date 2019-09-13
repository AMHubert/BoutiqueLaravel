@extends('shared.layout')
@section('content')
<section class="container-fluid">
	@if(count($cart) == 0)
	<div class="container">
		<h1 class="display-4">Oops il semble que votre panier soit vide</h1>
		<p class="lead">Pas de problème les portes sont toujours ouverte pour commander.</p>
		<hr class="my-4">
		<a class="btn btn-primary btn-lg" href="{{route('index')}}">Accueil</a>
	</div>
	@else
	<div class="cart-container">
		<div class="row">
			<div class="col-9">
				<table class="table table-striped table-hover w-100">
					<thead class="thead-dark">
						<tr>
							<th></th>
							<th>Plateforme</th>
							<th>Produit</th>
							<th>Prix Unitaire</th>
							<th>Qte</th>
							<th>Prix</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
                        @foreach ($cart as $item)
						<tr id="cart-list" class="border">
							<td>
								<a href="{{route('product.details', ['categoryName'=> $item[0]->_category, 'productId'=>$item[0]->_id])}}">
									<img class="cart-game-img" src="{{asset('resources/img/game/gameSquare/'.$item[0]->_img)}}" alt="Image de {{$item[0]->_name}}">
								</a>
							</td>
							<td>{{$item[0]->_category}}</td>
							<td>{{$item[0]->_name}}</td>
							<td>{{$item[0]->_price}}€</td>
							<td class="quantity-cell">
								<form action="updateQte.php" method="post">
									<input type="hidden" name="productId" value="{{$item[0]->_id}}">
									<input type="number" class="form-control-sm" name="quantity" value="{{$item[1]}}" min="1">
								</form>
							</td>
							<td>{{number_format($item[1]*$item[0]->_price, 2, ',', ' ')}}€</td>
							<td>
								<a href="removeProduct.php?id={{$item[0]->_id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-3">
				<div class="card">
					<h4 class="card-header text-underline font-weight-bold">Total:</h4>
					<div class="card-body text-center">
						<p class="card-text cart-total">{{number_format($priceTotal, 2, ',', ' ')}}€</p>
						<p class="card-text">Prix HT: {{number_format($priceTotalExclTax, 2, ',', ' ')}}€</p>
						<a href="{{route('cart.checkout')}}" class="btn btn-success">Passer la commande</a>
					</div>
				</div>
				<p class="msg-tax">Panier affiché TTC sur la base d'une TVA à {{$VATPercent}}%.</p>
			</div>
		</div>
	</div>
	@endif
</section>
@endsection

@section('scripts')
<script>
    $("input[type='number']").inputSpinner();
	$("input[type='number']").each(function( index ) {
		$(this).on("change", function(){
			$(this).parent().submit();
		});
	});
</script>
@endsection
