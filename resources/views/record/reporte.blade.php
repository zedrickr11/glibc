<div class="modal fade" id="primaryModal-{{$alumno->id_alumno}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form class="" action="{{ route('record.store') }}" method="post">
    {!! csrf_field() !!}
        <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Reportar Alumno</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="observacion">Observación</label>
                        <textarea name="observacion" id="" class="form-control" rows="10" placeholder="Descripción reporte para el alumno...">{{ old('observacion') }}</textarea>
                        {!!$errors->first('observacion','<span class=text-danger>:message</span>')!!}
                    </div>
                        <input type="hidden" name="id_alumno" value="{{$alumno->id_alumno}}">
                        <input type="hidden" name="id_grado" value="{{$grado->id_grado}}">
                        <input type="hidden" name="id_curso" value="{{$curso->id_curso}}">
                        <input type="hidden" name="id_persona" value="{{$idPersona}}">
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