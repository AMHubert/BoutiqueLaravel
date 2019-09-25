<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smarty Shop - Admin Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('resources/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('resources/fontawesome/css/all.min.css')}}">
    <!-- Script -->
    <script src="{{asset('resources/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('resources/js/bootstrap-all.js')}}"></script>
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('resources/css/style.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>
    <div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <h1>Espace admin</h1>
                                </div>
                                <p>Smarty Shop</p>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <form action="{{route('admin.login-verify')}}" method="post" class="form-validate">
                                    @csrf
                                    @if (!empty($msg))
                                        <div class="alert alert-danger" role="alert">
                                            {{$msg}}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <input id="login-username" class="input-material" type="text"
                                            name="loginEmail" required>
                                        <label for="login-username" class="label-material">Email</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="login-password" class="input-material" type="password"
                                            name="loginPassword" required>
                                        <label for="login-password" class="label-material">Mot de passe</label>
                                    </div>
                                    <input type="submit" id="login" href="{{route('admin.login-verify')}}" class="btn btn-primary" value="Login" >
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights text-center">
            <p>Design by <a href="https://bootstrapious.com/p/admin-template" class="external">Bootstrapious</a></p>
        </div>
    </div>
    <!-- JavaScript files-->

    <!-- Main File-->
    <script>
        var materialInputs = $('input.input-material');
        // activate labels for prefilled values
        materialInputs.filter(function() { return $(this).val() !== ""; }).siblings('.label-material').addClass('active');

        // move label on focus
        materialInputs.on('focus', function () {
            $(this).siblings('.label-material').addClass('active');
        });

        // remove/keep label on blur
        materialInputs.on('blur', function () {
            $(this).siblings('.label-material').removeClass('active');
            if ($(this).val() !== '') {
                $(this).siblings('.label-material').addClass('active');
            } else {
                $(this).siblings('.label-material').removeClass('active');
            }
        });
    </script>
</body>
</html>
