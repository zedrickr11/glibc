<div class="modal fade" id="dangerModal-{{$alumno->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form method="POST" action="{{route('calificar.store' )}}">

  {!!csrf_field()!!}


          <div class="modal-dialog modal-success" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Alumno: {{ $alumno->primer_nombre }} {{ $alumno->segundo_nombre }} {{ $alumno->primer_apellido }}  {{ $alumno->segundo_apellido }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="nota">Nota</label>
                        <input required type="number" min="0" step="0.1" class="form-control" name="nota" placeholder="Ingrese la nota del curso...">
                        {!!$errors->first('nota','<span class=text-danger>:message</span>')!!}
                    </div>
                </div><br>
                <input type="hidden" value="{{ $actividad }}" name="id_actividad">
                <input type="hidden" value="{{$alumno->id}}" name="id_alumno">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
  </form>
          <!-- /.modal-dialog -->
</div>
