<footer class="mt-auto pt-3 bg-dark text-light">
    <div class="container-fluid">
        <div class="row">
            <section class="col-6 col-xl-4 d-none d-lg-block">
                <h5 class="text-underline font-weight-bold">Plan du site :</h5>
                <ul class="list-inside">
                    <li class="site-map"><a class="link-unstyle" href="{{route('index')}}">Accueil</a></li>
                    <li class="site-map"><a class="link-unstyle"
                            href="{{route('listing.category', ['category'=>'ps4'])}}">PS4</a></li>
                    <li class="site-map"><a class="link-unstyle"
                            href="{{route('listing.category', ['category'=>'xbox-one'])}}">Xbox One</a></li>
                    <li class="site-map"><a class="link-unstyle"
                            href="{{route('listing.category', ['category'=>'nintendo-switch'])}}">Nintendo Switch</a></li>
                </ul>
            </section>
            <section class="col-6 col-xl-4  border-left border-right border-gray">
                <h5 class="text-underline font-weight-bold">Contact :</h5>
                <ul class="list-unstyled">
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
            <section class="col-6 col-xl-4 ">
                <h5 class="text-underline font-weight-bold">Réseau Sociaux :</h5>
                <ul class="list-unstyled">
                    <li class="my-2">
                        <a class="link-unstyle" href="#"><img class="social-logo"
                                src="{{asset('resources/img/facebook.svg')}}" alt="Logo Facebook">Facebook</a>
                    </li>
                    <li class="my-2">
                        <a class="link-unstyle" href="#"><img class="social-logo"
                                src="{{asset('resources/img/twitter.svg')}}" alt="Logo Twitter">Twitter</a>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</footer>
