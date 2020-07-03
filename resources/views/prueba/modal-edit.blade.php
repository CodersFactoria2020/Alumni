<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @isset($prueba)
                <form action="{{Route('prueba.update', $prueba->id)}}" method="post"> <!-- enctype para subir el logo -->
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" name="title" class="form-control" value="{{$prueba->title}}">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea type="text" name="description" class="form-control">{{$prueba->description}}</textarea>
                        </div>

                        <div class="text-right">
                            <input type="submit" value="Actualizar" class="btn btn-primary">
                        </div>
                    </div>

                </form>
                @endisset
            </div>
        </div>

    </div>
</div>
