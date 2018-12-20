<div class="modal fade" id="successModalCurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form class="" action="{{ route('curso.store') }}" method="post">
    {!! csrf_field() !!}
        <div class="modal-dialog modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Registrar curso</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="nombre">Nombre del curso*</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre del curso...">
                        {!!$errors->first('nombre','<span class=text-danger>:message</span>')!!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="Ingrese descripcion del curso...">
                        {!!$errors->first('descripcion','<span class=text-danger>:message</span>')!!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="condicion">Estado</label>
                        <select class="form-control" name="condicion">
                            <option value="1">ACTIVO</option>
                            <option value="0">INACTIVO</option>
                        </select>
                        {!!$errors->first('condicion','<span class=text-danger>:message</span>')!!}
                    </div>
                </div><br>
                <input type="hidden" name="opcion" value="modal">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
    </form>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->