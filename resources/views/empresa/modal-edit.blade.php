<div class="modal fade" id="edit-modal-company" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('empresa.update', $empresa->id)}}" method="post"> <!-- enctype para subir el logo -->
                 @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{$empresa->name}}">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea type="text" name="description" class="form-control">{{$empresa->description}}</textarea>
                        </div>

                        <div class="text-right">
                                <input type="submit" value="Actualizar" class="btn btn-primary">
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
