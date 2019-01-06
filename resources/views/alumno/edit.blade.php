@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Alumno</a></li>
      <li class="breadcrumb-item active">Editar</li>
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
              <form class="" action="{{ route('alumno.update',$alumno->id) }}" method="post" enctype="multipart/form-data">
                {!!method_field('PUT')!!}
                  {!!csrf_field()!!}
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for="primer_nombre">Primer Nombre*</label>
                    <input type="text" class="form-control" name="primer_nombre" value="{{ $alumno->primer_nombre }}">
                    {!!$errors->first('primer_nombre','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for="segundo_nombre">Segundo Nombre</label>
                    <input type="text" class="form-control" name="segundo_nombre" value="{{ $alumno->segundo_nombre }}">
                    {!!$errors->first('segundo_nombre','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for="tercer_nombre">Tercer Nombre</label>
                    <input type="text" class="form-control" name="tercer_nombre" value="{{ $alumno->tercer_nombre }}">
                    {!!$errors->first('tercer_nombre','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="primer_apellido">Primer Apellido*</label>
                    <input type="text" class="form-control" name="primer_apellido" value="{{ $alumno->primer_apellido }}">
                    {!!$errors->first('primer_apellido','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="segundo_apellido">Segundo Apellido</label>
                    <input type="text" class="form-control" name="segundo_apellido" value="{{ $alumno->segundo_apellido }}">
                    {!!$errors->first('segundo_apellido','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="carnet">No. Carné</label>
                    <input type="text" class="form-control" name="carnet" value="{{ $alumno->carnet }}">
                    {!!$errors->first('carnet','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="codigo_alumno">Codigo de Alumno</label>
                    <input type="text" class="form-control" name="codigo_alumno" value="{{ $alumno->codigo_alumno }}">
                    {!!$errors->first('codigo_alumno','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for="telefono">Telefono</label>
                    <input type="number" class="form-control" name="telefono" value="{{ $alumno->telefono }}">
                    {!!$errors->first('telefono','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for="fechanacimiento">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fechanacimiento" value="{{ $alumno->fechanacimiento }}">
                    {!!$errors->first('fechanacimiento','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for="genero">Genero</label>
                    <select class="form-control" name="genero">
                      @if($alumno->genero== 'masculino')
                        <option value="masculino" selected>Masculino</option>
                        <option value="femenino">Femenino</option>
                      @else
                        <option value="masculino">Masculino</option>
                        <option value="femenino" selected>Femenino</option>
                      @endif
                    </select>
                    {!!$errors->first('genero','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" name="direccion" value="{{ $alumno->direccion }}">
                    {!!$errors->first('direccion','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_persona">Persona encargada</label>
                    <select name="id_persona" class="form-control select2-single" id="select-busqueda">
                      @foreach($personas as $persona)
                        <option value="{{ $persona->id_persona }}" {{ $alumno->id_persona == $persona->id_persona ? 'selected': null }}>{{ $persona->nombres }} {{ $persona->apellidos }}</option>
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
                </div><br>
                <div class="row">
                  @if($alumno->foto)
                  <div class="col-6 text-center">
                    <img width="150px" height="150px" src="/fotos/{{$alumno->foto}}" alt="">
                  </div>
                  @endif
                  @if($alumno->fe_edad)
                  <div class="col-6">
                    <a target="_blank" class="btn btn-sm btn-primary" href="/alumno/downloadFeEdad/{{$alumno->fe_edad}}"><i class="icon-doc"></i>&nbsp; Descargar Fe Edad</a>
                  </div>
                  @endif
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
