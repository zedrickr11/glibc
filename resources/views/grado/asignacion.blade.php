<div class="modal fade" id="primaryModal-{{$grado->id_grado}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('grado.addcursos', $grado->id_grado )}}">
    {!! csrf_field() !!}
        <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Asignacion de curso</h4>
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
                        <label for="id_persona">Maestro guia</label>
                        <select name="id_persona" class="form-control">
                            <option value="">Seleccione maestro: </option>
                            @foreach($personas as $persona)
                            <option value="{{ $persona->id_persona }}">{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                            @endforeach
                        </select>
                        {!!$errors->first('id_persona','<span class=text-danger>:message</span>')!!}
                    </div>
                </div><br>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
    </form>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->