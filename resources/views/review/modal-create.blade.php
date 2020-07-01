<div class="modal fade" id="create-modal-review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">REVIEW</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div>
                        <h4>Añadir review de esta empresa</h4>
                    </div>
                        <form action="{{Route('review.store')}}" method="post">
                            @csrf
                             <input type="hidden" name="empresa_id" class="" value="{{$empresa->id}}">
                                <div class="form-group">
                                            <label>Puntuación</label>
                                                <select class="col-md-1 form-control" name="score" id="">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Comentario (opcional)</label>
                                    <textarea type="text" name="comment" class="form-control"></textarea>
                                </div>
                                <div class="text-right">
                                    <a href="{{Route('review.create')}}" >
                                        <input type="submit" value="Añadir review" class="btn btn-primary">
                                    </a>
                                </div>

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
