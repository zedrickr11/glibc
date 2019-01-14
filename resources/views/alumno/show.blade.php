@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Alumnos</a></li>
      <li class="breadcrumb-item active">Detalles del alumno</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <strong>Detalles del Alumno</strong>
                <small></small>
              </div>
              <form class="">
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for=""><strong>Primer Nombre:</strong></label><br>
                    <label for="">{{ $alumno->primer_nombre }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for=""><strong>Segundo Nombre:</strong></label><br>
                    <label for="">{{ $alumno->segundo_nombre }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for=""><strong>Tercer Nombre:</strong></label><br>
                    <label for="">{{ $alumno->tercer_nombre }}</label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for=""><strong>Primer Apellido:</strong></label><br>
                    <label for="">{{ $alumno->primer_apellido }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for=""><strong>Segundo Apellido:</strong></label><br>
                    <label for="">{{ $alumno->segundo_apellido }}</label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for=""><strong>Carné:</strong></label><br>
                    <label for="">{{ $alumno->carnet }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for=""><strong>Codigo de alumno:</strong></label><br>
                    <label for="">{{ $alumno->codigo_alumno }}</label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for=""><strong>Telefono:</strong></label><br>
                    <label for="">{{ $alumno->telefono }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for=""><strong>Fecha de nacimiento:</strong></label>
                    <input type="date" class="form-control" disabled value="{{ $alumno->fechanacimiento }}">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for=""><strong>Genero:</strong></label><br>
                    <label for="">
                        @if($alumno->genero== 'masculino')
                            Masculino
                        @elseif($alumno->genero == 'femenino')
                            Femenino
                        @endif
                    </label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                    <label for=""><strong>Direccion:</strong></label><br>
                    <label for="">{{ $alumno->direccion }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for="condicion"><strong>Estado:</strong></label><br>
                    <label for="">
                        @if ($alumno->condicion==1)
                            ACTIVO
                        @else
                            INACTIVO
                        @endif
                    </label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for=""><strong>Persona encargada:</strong></label><br>
                    <label for="">{{ $alumno->persona->nombres }}</label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for=""><strong>Foto del estudiante:</strong></label><br>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for=""><strong>Fe de edad:</strong></label><br>
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
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
