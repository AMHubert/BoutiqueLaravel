<header>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <a href="" class="navbar-brand d-none d-sm-inline-block">
                        <div class="brand-text d-none d-lg-inline-block">
                            <span>Smarty Shop</span> <strong>Dashboard</strong>
                        </div>
                        <!-- For smaller screen -->
                        <div class="brand-text d-none d-sm-inline-block d-lg-none">
                            <strong>Dashboard</strong>
                        </div>
                    </a>
                </div>

                <div class="nav-menu d-flex flex-md-row align-items-md-center">
                    <a href="{{route('admin.logout')}}" class="nav-link logout">
                        <span class="d-none d-sm-inline">Logout </span><i class="fas fa-sign-out-alt ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="page-content d-flex align-items-stretch">
    <nav class="side-navbar">
        <span class="heading">Admin</span>
        <ul class="list-unstyled">
            <li>
                <a href="{{route('admin.game.list')}}">
                    <i class="fas fa-gamepad fa-2x"></i> Jeux
                </a>
            </li>
            <li>
                <a href="{{route('admin.category.list')}}">
                    <i class="fas fa-list fa-2x"></i> Categories
                </a>
            </li>
            <li>
                <a href="{{route('admin.admin.list')}}">
                    <i class="fas fa-user fa-2x"></i> Admins
                </a>
            </li>
        </ul>
        <span class="heading">Extra</span>
        <ul>
            <li>
                <a href="{{route('admin.logout')}}">
                    <i class="fas fa-sign-out-alt fa-2x"></i> Logout
                </a>
            </li>
        </ul>
    </nav>

    <div class="content-inner">
        <section class="page-header">
            <div class="container-fluid">
                <h2 class="mb-0 page-title">Smarty Shop</h2>
            </div>
        </section>
        <main>
            @yield('content')
        </main>
        <footer class="main-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                    <p>Smarty Shop © 2019-2019</p>
                    </div>
                    <div class="col-sm-6 text-right">
                    <p>Design by <a href="https://bootstrapious.com/p/admin-template" class="external">Bootstrapious</a></p>
                    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                    </div>
                </div>
            </div>
        </footer>
    </div>

</div>
