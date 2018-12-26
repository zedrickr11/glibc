<div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form class="" action="{{ route('grado.addasignacion') }}" method="post">
    {!! csrf_field() !!}
        <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Asignar curso</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_grado" value="{{$grado->id_grado}}">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="id_persona">Maestro</label>
                        <select style="width:100%;" name="id_persona" class="form-control select2-single" id="id_persona_asignar">
                            <option value="">Seleccione maestro: </option>
                            @foreach($personas as $persona)
                                <option value="{{ $persona->id_persona }}">{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                            @endforeach
                        </select>
                        {!!$errors->first('id_persona','<span class=text-danger>:message</span>')!!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="id_curso">Curso</label>
                        <select style="width:100%;" name="id_curso" class="form-control select2-single" id="id_curso_asignar">
                            <option value="">Seleccione curso: </option>
                            @foreach($cursos as $curso)
                                <option value="{{ $curso->id_curso }}">{{ $curso->nombre }}</option>
                            @endforeach
                        </select>
                        {!!$errors->first('id_curso','<span class=text-danger>:message</span>')!!}
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