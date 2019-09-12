@extends('admin.adminlayout')
@section('content')
<!-- Modal form -->
<div class="modal" id="addCatModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un jeu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.category.add')}}" method="POST" id="CatForm">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Name:</label>
                        <input type="text" class="form-control" name="category_name" id="category_name">
                    </div>
                    <div class="form-group">
                        <label for="category_description">Description:</label>
                        <textarea class="form-control" name="category_description" id="category_description"></textarea>
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
        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#addCatModal"><i
                class="fas fa-plus mr-1"></i> Ajouter une categorie</button>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->category_id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->category_description}}</td>
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

@section('scripts')
<script>
    $(document).ready(function(){

        jQuery.validator.setDefaults({
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#CatForm').validate({
            rules: {
                category_name: "required",
                category_description: "required"
            }
        })
    })
</script>
@endsection
