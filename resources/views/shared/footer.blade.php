<footer class="mt-auto pt-3 bg-dark text-light">
    <div class="container-fluid">
        <div class="row">
            <section class="col-4">
                <h5 class="text-underline font-weight-bold">Plan du site :</h5>
                <ul class="list-inside">
                    <li class="site-map"><a class="link-unstyle" href="{{route('index')}}">Accueil</a></li>
                    <li class="site-map"><a class="link-unstyle"
                            href="{{route('listing.category', ['category'=>'PS4'])}}">PS4</a></li>
                    <li class="site-map"><a class="link-unstyle"
                            href="{{route('listing.category', ['category'=>'Xbox One'])}}">Xbox One</a></li>
                    <li class="site-map"><a class="link-unstyle"
                            href="{{route('listing.category', ['category'=>'Nintendo Switch'])}}">Nintendo Switch</a></li>
                </ul>
            </section>
            <section class="col-4 border-left border-right border-gray">
                <h5 class="text-underline font-weight-bold">Contact :</h5>
                <ul class="list-unstyle">
                    <li><span class="font-weight-bold">Email:</span> smartyshop@gmail.com</li>
                    <li>
                        <span class="font-weight-bold">Adresse:</span>
                        <p class="address">
                            <span>28, rue de Napoléon</span>
                            <span>06000 Nice</span>
                        </p>
                    </li>
                </ul>
            </section>
            <section class="col-4">
                <h5 class="text-underline font-weight-bold">Réseau Sociaux :</h5>
                <ul class="list-unstyle">
                    <li>
                        <a class="link-unstyle" href="#"><img class="social-logo"
                                src="{{asset('resources/img/facebook.svg')}}" alt="Logo Facebook">Facebook</a>
                    </li>
                    <li>
                        <a class="link-unstyle" href="#"><img class="social-logo"
                                src="{{asset('resources/img/twitter.svg')}}" alt="Logo Twitter">Twitter</a>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</footer>
