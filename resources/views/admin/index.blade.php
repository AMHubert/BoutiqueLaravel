@extends('admin.adminlayout')
@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center">
        <h4>{{$pageTitle}}</h4>
    </div>
    <div class="card-body">
        <p>Bienvenue sur l'espace d'administration</p>
        <div class="row justify-content-center">
            <div class="col-3">
                <a class="btn btn-primary" href="{{route('admin.game.list')}}">Liste des Jeux</a>
            </div>
            <div class="col-3">
                <a class="btn btn-primary" href="{{route('admin.category.list')}}">Liste des Catégories</a>
            </div>
            <div class="col-3">
                <a class="btn btn-primary" href="{{route('admin.admin.list')}}">Liste des Admins</a>
            </div>
        </div>
    </div>
</div>
@endsection
