@extends('shared.layout')
@section('content')
<section class="container-fluid my-3">
    <div class="row">
        <div class="offset-md-1 col-md-5 col-12 offset-0">
            <div class="card">
                <h5 class="card-header">Mes Informations</h5>
                <div class="card-body">
                    <form action="{{route('user.changeinfo')}}" method="post">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-6"><label for="name">Nom</label></div>
                            <div class="col-6"><input type="text" id="name" name="name" class="form-control"
                                    value="{{$user->name}}"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><label for="email">Email</label></div>
                            <div class="col-6"><input type="email" id="email" name="email" class="form-control"
                                    value="{{$user->email}}"></div>
                        </div>
                        <h5 class=" mb-3 text-underline">Changer de mot de passe:</h5>
                        <div class="row mb-2">
                            <div class="col-6"><label for="pass">Mot de passe</label></div>
                            <div class="col-6"><input type="password" id="pass" name="pass" class="form-control"
                                    placeholder="Mot de passe"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><label for="newpass">Nouveau mot de passe</label></div>
                            <div class="col-6"><input type="password" id="newpass" name="newpass" class="form-control"
                                    placeholder="Nouveau mot de passe"></div>
                        </div>
                        <div class="row">
                            <div class="offset-6 col-6">
                                <input type="submit" class="btn btn-outline-primary" value="Modifier">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-12 offset-0">
            <div class="card">
                <h5 class="card-header">Mes commandes</h5>
                <div class="card-body">
                    <table class="w-100">
                    @foreach($orders as $order)
                        <tr>
                            <td class="text-left">Commande du {{$order->order_date}}</td>
                            <td class="text-right">
                                <a href="#" class="btn btn-info">Détails</a>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
