<!-- Modal Update Form -->
<div class="modal" id="updateGameModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier un jeu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.game.update')}}" method="POST" id="gameForm" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$game->product_id}}">
                    <div class="form-group">
                        <label for="product_name_update">Nom:</label>
                        <input type="text" class="form-control" name="product_name" id="product_name_update" value="{{$game->product_name}}">
                    </div>
                    <div class="form-group">
                        <label for="product_description_update">Description:</label>
                        <textarea class="form-control update" name="product_description" id="product_description_update">{{$game->product_description}}</textarea>
                    </div>
                    <p>Image Box Art (600x800 recommandé):</p>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="product_imageBoxArt" id="product_imageBoxArt_update">
                            <label class="custom-file-label" for="product_imageBoxArt_update">Choose file</label>
                        </div>
                    </div>
                    <p>Image Carré (500x500 recommandé):</p>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="product_imageSquare" id="product_imageSquare_update">
                            <label class="custom-file-label" for="product_imageSquare_update">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_price_update">Prix:</label>
                        <input type="text" class="form-control" name="product_price" id="product_price_update" value="{{$game->product_price}}">
                    </div>
                    <div class="form-group">
                        <label for="product_stock_update">Stock:</label>
                        <input type="text" class="form-control" name="product_stock" id="product_stock_update" value="{{$game->product_stock}}">
                    </div>
                    <p>Categories:</p>
                    <div class="row my-2">
                        @foreach ($categories as $category)
                        <div class='col-6 custom-control custom-checkbox'>
                            <input type='checkbox' class='custom-control-input' id="cat{{$category->category_id}}_update"
                                name='categories[]' value='{{$category->category_id}}'
                                {{ $game->categories->contains('category_id', $category->category_id) ? 'checked' : '' }}>
                            <label class='custom-control-label ml-3'
                                for="cat{{$category->category_id}}_update">{{$category->category_name}}</label>
                        </div>
                        @endforeach
                    </div>
                    <p>Autres:</p>
                    <div class="row my-2">
                        <div class="col-6 custom-control custom-checkbox">
                            <input type='checkbox' class='custom-control-input' id="product_highlight_update" name="product_highlight">
                            <label class='custom-control-label ml-3' for="product_highlight_update">Produit phare</label>
                        </div>
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
<!-- End Modal Update Form -->
