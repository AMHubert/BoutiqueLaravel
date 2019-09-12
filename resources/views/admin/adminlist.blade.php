@extends('admin.adminlayout')
@section('content')

<!-- Modal form -->
<div class="modal" id="addGameModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un jeu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.admin.add')}}" method="POST" id="gameForm">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="admin_name">Nom:</label>
                            <input type="text" class="form-control" name="admin_name" id="admin_name">
                        </div>
                        <div class="form-group">
                            <label for="admin_email">Email:</label>
                            <input type="text" class="form-control" name="admin_email" id="admin_email">
                        </div>
                        <div class="form-group">
                            <label for="admin_pass">Mot de passe:</label>
                            <input type="text" class="form-control" name="admin_pass" id="admin_pass">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

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
