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
            <form action="{{route('admin.game.add')}}" method="POST" id="gameForm" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="product_name">Nom:</label>
                        <input type="text" class="form-control" name="product_name" id="product_name">
                    </div>
                    <div class="form-group">
                        <label for="product_description">Description:</label>
                        <textarea class="form-control" name="product_description" id="product_description"></textarea>
                    </div>
                    <p>Image Box Art (600x800 recommandé):</p>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="product_imageBoxArt" id="product_imageBoxArt">
                            <label class="custom-file-label" for="product_imageBoxArt">Choose file</label>
                        </div>
                    </div>
                    <p>Image Carré (500x500 recommandé):</p>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="product_imageSquare" id="product_imageSquare">
                            <label class="custom-file-label" for="product_imageSquare">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Prix:</label>
                        <input type="text" class="form-control" name="product_price" id="product_price">
                    </div>
                    <div class="form-group">
                        <label for="product_stock">Stock:</label>
                        <input type="text" class="form-control" name="product_stock" id="product_stock">
                    </div>
                    <p>Categories:</p>
                    <div class="row my-2">
                        @foreach ($categories as $category)
                        <div class='col-6 custom-control custom-checkbox'>
                            <input type='checkbox' class='custom-control-input' id="cat{{$category->category_id}}"
                                name='categories[]' value='{{$category->category_id}}'>
                            <label class='custom-control-label ml-3'
                                for="cat{{$category->category_id}}">{{$category->category_name}}</label>
                        </div>
                        @endforeach
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
                class="fas fa-plus mr-1"></i> Ajouter un jeu</button>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Categorie</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                    <tr>
                        <td>{{$game->product_id}}</td>
                        <td>{{$game->product_name}}</td>
                        <td>{{Str::limit($game->product_description, $limit = 50, $end = '...')}}</td>
                        <td>
                            @foreach ($game->categories as $category)
                            {{$category->category_name}}<br>
                            @endforeach
                        </td>
                        <td>{{$game->product_price}}€</td>
                        <td>{{$game->product_stock}}</td>
                        <td>
                            <button class="btn btn-info">Détails</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $games->links() }}
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){

        $('input[type="file"]').on('change', function(e){
            var label = $(this).next();
            label.text(e.target.files[0].name);
        });

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

        $('#gameForm').validate({
            rules: {
                product_name: "required",
                product_description: "required",
                product_price: "required",
                product_stock: "required",
                'categories[]': "required"
            }
        })
    })
</script>
@endsection
