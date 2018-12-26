<div class="modal fade" id="warningModal-{{$curso->pivot->id_asignacion_curso}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="" action="{{ route('grado.editasignacion', $curso->pivot->id_asignacion_curso) }}" method="post">
{!!method_field('PUT')!!}
{!!csrf_field()!!}
    <div class="modal-dialog modal-warning" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Editar asignacion de curso </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_persona">Maestro</label>
                    <select style="width:100%;" name="id_persona" class="form-control select2-single" id="id_persona_editar-{{$curso->pivot->id_asignacion_curso}}">
                        @foreach($personas as $persona)
                            <option value="{{ $persona->id_persona }}" {{ $curso->pivot->id_persona == $persona->id_persona ? 'selected': null }}>{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                        @endforeach
                    </select>
                    {!!$errors->first('id_persona','<span class=text-danger>:message</span>')!!}
                </div>
            </div><br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_curso">Curso</label>
                    <select style="width:100%;" name="id_curso" class="form-control select2-single" id="id_curso_editar-{{$curso->pivot->id_asignacion_curso}}">
                        @foreach($cursos as $cu)
                            <option value="{{ $cu->id_curso }}" {{ $curso->pivot->id_curso == $cu->id_curso ? 'selected': null }}>{{ $cu->nombre }}</option>
                        @endforeach
                    </select>
                    {!!$errors->first('id_curso','<span class=text-danger>:message</span>')!!}
                </div>
            </div><br>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-warning">Guardar</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</form>
</div>
<!-- /.modal -->