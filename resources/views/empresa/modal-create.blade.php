<div class="modal fade" id="create-modal-company" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{Route('empresa.store')}}" method="post" enctype="multipart/form-data"> <!-- enctype para subir el logo -->
                 @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea type="text" name="description" class="form-control"></textarea>
                        </div>

                        <div class="text-right">
                            <a href="{{Route('empresa.create')}}" >
                                <input type="submit" value="Crear" class="btn btn-primary">
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
