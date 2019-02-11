<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="" action="{{ route('padre.store') }}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Registrar Padre o Encargado</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="row">
                  <div class="form-group col-md-6">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Nombres..." value="{{ old('nombres') }}">
                    {!!$errors->first('nombres','<span class=text-danger>:message</span>')!!}
                  </div>

                  <div class="form-group col-md-6">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos..." value="{{ old('apellidos') }}">
                    {!!$errors->first('apellidos','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Correo electrónico</label>
                    <input required type="email" class="form-control" name="email" placeholder="Correo electrónico..." value="{{ old('email') }}">
                    {!!$errors->first('email','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="fechanacimiento">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fechanacimiento" value="{{ old('fechanacimiento') }}">
                    {!!$errors->first('fechanacimiento','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="estado_civil">Estado civil</label>
                    <input type="text" class="form-control" name="estado_civil" placeholder="Estado civil..." value="{{ old('estado_civil') }}">
                    {!!$errors->first('estado_civil','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="nacionalidad">Nacionalidad</label>
                    <input type="text" class="form-control" name="nacionalidad" placeholder="Nacionalidad..." value="{{ old('nacionalidad') }}">
                    {!!$errors->first('nacionalidad','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="profesion">Profesión</label>
                    <input type="text" class="form-control" name="profesion" placeholder="Profesión..." value="{{ old('profesion') }}">
                    {!!$errors->first('profesion','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="dpi">Documento de Identifiación</label>
                    <input type="number" required class="form-control" name="dpi" placeholder="Documento de Identifiación..." value="{{ old('dpi') }}">
                    {!!$errors->first('dpi','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-8">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Dirección..." value="{{ old('direccion') }}">
                    {!!$errors->first('direccion','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Teléfono..." value="{{ old('telefono') }}">
                    {!!$errors->first('telefono','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="telefono_dos">Teléfono alternativo</label>
                    <input type="text" class="form-control" name="telefono_dos" placeholder="Teléfono alternativo..." value="{{ old('telefono_dos') }}">
                    {!!$errors->first('telefono_dos','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" name="celular" placeholder="Celular..." value="{{ old('celular') }}">
                    {!!$errors->first('celular','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" name="foto" placeholder="Celular..." value="{{ old('foto') }}">
                    {!!$errors->first('foto','<span class=text-danger>:message</span>')!!}
                  </div>
            </div><br>
            <div class="row">
                <input type="hidden" name="opcion" value="modal">
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</form>
</div>
<!-- /.modal -->