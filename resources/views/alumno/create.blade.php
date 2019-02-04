@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Alumno</a></li>
      <li class="breadcrumb-item active">Nuevo</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <strong>Alumno</strong>
                <small></small>
              </div>
              <form class="" action="{{ route('alumno.store') }}" method="post" enctype="multipart/form-data">
              {!! csrf_field() !!}
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for="primer_nombre">Primer Nombre*</label>
                    <input type="text" class="form-control" name="primer_nombre" value="{{ old('primer_nombre') }}" placeholder="Ingrese primer nombre...">
                    {!!$errors->first('primer_nombre','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for="segundo_nombre">Segundo Nombre</label>
                    <input type="text" class="form-control" name="segundo_nombre" value="{{ old('segundo_nombre') }}" placeholder="Ingrese segundo nombre...">
                    {!!$errors->first('segundo_nombre','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for="tercer_nombre">Tercer Nombre</label>
                    <input type="text" class="form-control" name="tercer_nombre" value="{{ old('tercer_nombre') }}" placeholder="Ingrese tercer nombre...">
                    {!!$errors->first('tercer_nombre','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="primer_apellido">Primer Apellido*</label>
                    <input type="text" class="form-control" name="primer_apellido" value="{{ old('primer_apellido') }}" placeholder="Ingrese primer apellido...">
                    {!!$errors->first('primer_apellido','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="segundo_apellido">Segundo Apellido</label>
                    <input type="text" class="form-control" name="segundo_apellido" value="{{ old('segundo_apellido') }}" placeholder="Ingrese segundo apellido...">
                    {!!$errors->first('segundo_apellido','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_persona">Persona encargada</label>
                    <select name="id_persona" class="form-control select2-single" id="select-busqueda">
                      <option value="">Seleccione encargado: </option>
                      @foreach($personas as $persona)
                        <option value="{{ $persona->id_persona }}" {{ old('id_persona') == $persona->id_persona ? 'selected': '' }}>{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_persona','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="carnet">No. Carnet</label>
                    <input type="text" class="form-control" name="carnet" value="{{ old('carnet') }}" placeholder="Ingrese numero de carné...">
                    {!!$errors->first('carnet','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="codigo_alumno">Codigo de alumno</label>
                    <input type="text" class="form-control" name="codigo_alumno" value="{{ old('codigo_alumno') }}" placeholder="Ingrese el codigo del alumno...">
                    {!!$errors->first('codigo_alumno','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for="telefono">Telefono</label>
                    <input type="number" class="form-control" value="{{ old('telefono') }}" name="telefono">
                    {!!$errors->first('telefono','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for="fechanacimiento">Fecha de nacimiento</label>
                    <input type="date" class="form-control" value="{{ old('fechanacimiento') }}" name="fechanacimiento">
                    {!!$errors->first('fechanacimiento','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for="genero">Genero</label>
                    <select class="form-control" name="genero">
                      <option value="masculino" {{ old('genero') == "masculino" ? 'selected': '' }}>Masculino</option>
                      <option value="femenino" {{ old('genero') == "femenino" ? 'selected': '' }}>Femenino</option>
                    </select>
                    {!!$errors->first('genero','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" value="{{ old('direccion') }}" name="direccion">
                    {!!$errors->first('direccion','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="papeleria">Papelería</label>
                    <select class="form-control" name="papeleria">
                      <option value="" {{ old('papeleria') == "" ? 'selected': '' }}>Seleccione opcion: </option>
                      <option value="1" {{ old('papeleria') == "1" ? 'selected': '' }}>Completa</option>
                      <option value="2" {{ old('papeleria') == "2" ? 'selected': '' }}>Incompleta</option>
                      <option value="3" {{ old('papeleria') == "3" ? 'selected': '' }}>Entregada</option>
                    </select>
                    {!!$errors->first('papeleria','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="observacion">Descripción de la papelería:</label>
                    <textarea name="observacion" id="" class="form-control" rows="6" placeholder="Descripción de la papelería del alumno...">{{ old('observacion') }}</textarea>
                    {!!$errors->first('observacion','<span class=text-danger>:message</span>')!!}
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
              </div>
              <div class="card-footer">
                <a href="{{ route('alumno.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Guardar</button>
                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Cancelar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @push ('scripts')
      <script type="text/javascript">
      $('#select-busqueda').select2({
        theme: "bootstrap"
      });
      </script>
    @endpush
@endsection
