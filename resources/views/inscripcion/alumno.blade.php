<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="" action="{{ route('alumno.store') }}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Agregar un nuevo alumno</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for="primer_nombre">Primer Nombre*</label>
                    <input type="text" class="form-control" name="primer_nombre" placeholder="Ingrese primer nombre...">
                    {!!$errors->first('primer_nombre','<span class=text-danger>:message</span>')!!}
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for="segundo_nombre">Segundo Nombre</label>
                    <input type="text" class="form-control" name="segundo_nombre" placeholder="Ingrese segundo nombre...">
                    {!!$errors->first('segundo_nombre','<span class=text-danger>:message</span>')!!}
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for="tercer_nombre">Tercer Nombre</label>
                    <input type="text" class="form-control" name="tercer_nombre" placeholder="Ingrese tercer nombre...">
                    {!!$errors->first('tercer_nombre','<span class=text-danger>:message</span>')!!}
                </div>
            </div><br>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="primer_apellido">Primer Apellido*</label>
                    <input type="text" class="form-control" name="primer_apellido" placeholder="Ingrese primer apellido...">
                    {!!$errors->first('primer_apellido','<span class=text-danger>:message</span>')!!}
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="segundo_apellido">Segundo Apellido</label>
                    <input type="text" class="form-control" name="segundo_apellido" placeholder="Ingrese segundo apellido...">
                    {!!$errors->first('segundo_apellido','<span class=text-danger>:message</span>')!!}
                </div>
            </div><br>
            <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="carnet">No. Carnet</label>
                    <input type="text" class="form-control" name="carnet" placeholder="Ingrese numero de carné...">
                    {!!$errors->first('carnet','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="codigo_alumno">Codigo de alumno</label>
                    <input type="text" class="form-control" name="codigo_alumno" placeholder="Ingrese el codigo del alumno...">
                    {!!$errors->first('codigo_alumno','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for="telefono">Telefono</label>
                    <input type="number" class="form-control" name="telefono">
                    {!!$errors->first('telefono','<span class=text-danger>:message</span>')!!}
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for="fechanacimiento">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fechanacimiento">
                    {!!$errors->first('fechanacimiento','<span class=text-danger>:message</span>')!!}
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for="genero">Genero</label>
                    <select class="form-control" name="genero">
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                    {!!$errors->first('genero','<span class=text-danger>:message</span>')!!}
                </div>
            </div><br>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" name="direccion">
                    {!!$errors->first('direccion','<span class=text-danger>:message</span>')!!}
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for="condicion">Estado</label>
                    <select class="form-control" name="condicion">
                        <option value="1">ACTIVO</option>
                        <option value="0">INACTIVO</option>
                    </select>
                    {!!$errors->first('condicion','<span class=text-danger>:message</span>')!!}
                </div>
            </div><br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_persona">Persona encargada</label>
                    <select name="id_persona" class="form-control">
                        <option value="">Seleccione encargado: </option>
                        @foreach($personas as $persona)
                        <option value="{{ $persona->id_persona }}">{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                        @endforeach
                    </select>
                    {!!$errors->first('id_persona','<span class=text-danger>:message</span>')!!}
                </div>
            </div><br>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="">Foto del estudiante</label><br>
                    <input type="file" name="foto">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="">Fe de edad</label><br>
                    <input type="file" name="fe_edad">
                </div>
            </div>
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