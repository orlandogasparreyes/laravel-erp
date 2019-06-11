<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione Paquete - Ruta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" method="POST" action="{{ route('envio.store') }}">
                    {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="paquete">Paquete Cliente</label>
                            <select multiple class="form-control" name="paquete[]" id="paquete">
                                @foreach ($idpaquetes as $p)
                                <option value="{{$p->id}}">{{$p->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ruta">Ruta</label>
                            <select class="form-control" name="ruta" id="ruta">
                                <option selected>Ruta</option>
                                @foreach ($rutas as $r)
                                <option value="{{$r->id}}">{{$r->ruta}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>