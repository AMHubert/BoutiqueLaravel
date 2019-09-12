@extends('admin.adminlayout')
@section('content')

<div class="card">
        <div class="card-header d-flex align-items-center">
            <h4>{{$pageTitle}}</h4>
        </div>
        <div class="card-body">
            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#addGameModal"><i
                    class="fas fa-plus mr-1"></i> Ajouter un admin</button>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                        <tr>
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>
                                <button class="btn btn-info">Détails</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
