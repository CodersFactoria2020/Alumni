
<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="{{Route('prueba.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                            <input type="hidden" name="empresa_id" class="" value="{{$empresa->id}}">

                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea type="text" name="description" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                Adjunta documento
                                <input type="file" name="document" id="fileToUpload"/>
                            </div>

                            <div class="text-right">
                                <a href="{{Route('prueba.create')}}" >
                                    <input type="submit" value="Añadir prueba técnica" class="btn btn-primary">
                                </a>
                            </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

