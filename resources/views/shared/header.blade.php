<header>
    <nav class="nav navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{route('index')}}">
            <img class="brandLogo" src="{{asset('resources/img/brandLogo.png')}}" alt="Smarty Shop logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index')}}">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catégories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <a class="dropdown-item" href="{{route('listing.category', ['categoryName'=> str_replace(" ", "-", $category->category_name)])}}">{{$category->category_name}}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        {{-- </div> --}}
        <div class="form-inline ml-auto">
            <form action="{{route('listing.search')}}" method="post">
                @csrf
                <div class="input-group mr-3">
                    <input type="text" class="form-control" name="search" placeholder="Recherche" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-light btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            @auth
                <a class="btn btn-light mr-3" href="{{route('home.account')}}"><i class="fas fa-user"></i> Mon Compte</a>
                <a class="btn btn-light mr-3" href="{{route('user.logout')}}"><i class="fas fa-sign-out-alt"></i> Se Deconnecter</a>
            @endauth
            @guest
            <div class="btn-group mr-3" role="group" aria-label="Login / Register">
                <a class="btn btn-light" href="{{route('login')}}">Se Connecter</a>
                <a class="btn btn-light btn-group-separator" href="{{route('register')}}">S'enregistrer</a>
            </div>
            @endguest
            <a class="btn btn-light mr-3" href="{{route('cart.page')}}"><i class="fas fa-shopping-cart"></i> Panier</a>
        </div>
    </div> <!-- nav bar -->
    </nav>
</header>
