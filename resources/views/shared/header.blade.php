<header>
    <nav class="nav navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">
            <img class="brandLogo" src="resources/img/brandLogo.png" alt="Smarty Shop logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catégories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <a class="dropdown-item" href="listing/{{$category->category_id}}">{{$category->category_name}}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
        <div class="form-inline ml-auto">
            <form action="search.php" method="post">
                <div class="input-group mr-3">
                    <input type="text" class="form-control" name="search" placeholder="Recherche" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-light btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            @if ($isLogged)
                <a class="btn btn-light mr-3" href="#"><i class="fas fa-user"></i> Mon Compte</a>
                <a class="btn btn-light mr-3" href="logout.php"><i class="fas fa-sign-out-alt"></i> Se Deconnecter</a>
            @else
                <a class="btn btn-light mr-3" href="login.php"><i class="fas fa-sign-in-alt"></i> Se Connecter</a>
            @endif
            <a class="btn btn-light mr-3" href="cart.php"><i class="fas fa-shopping-cart"></i> Panier</a>
        </div>
    </nav>
</header>
