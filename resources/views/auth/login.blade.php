@extends('shared.layout')
@section('content')
<section class="container my-5">
    <div class="row justify-content-around">
        <div class="col-4">
            <h3 class="text-underline">Se connecter:</h3>
            @if(!empty($error))
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
            @endif
            <form action="TraitementLogin.php" method="post">
                <div class="form-group">
                    <label for="Login">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="Login" name="Login" placeholder="Nom d'utilisateur">
                </div>
                <div class="form-group">
                    <label for="Password">Mot de Passe</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Mot de Passe">
                        <div class="input-group-append">
							<button id="passToggle" class="btn btn-outline-secondary" type="button">
								<i id="passEye" class="fas fa-eye"></i>
							</button>
						</div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Se connecter">
            </form>
        </div>
        <div class="col-4">
            <h3 class="text-underline">S'inscrire:</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="Login">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="Login" name="Login" placeholder="Nom d'utilisateur">
                </div>
                <div class="form-group">
                    <label for="Password">Mot de Passe</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Mot de Passe">
                        <div class="input-group-append">
							<button id="passToggle" class="btn btn-outline-secondary" type="button">
								<i id="passEye" class="fas fa-eye"></i>
							</button>
						</div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="S'incrire">
            </form>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
		$("#passToggle").on("click", function(){
			$("#passEye").toggleClass("fa-eye fa-eye-slash");
			var input = $("#Password");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		})
	</script>
@endsection
