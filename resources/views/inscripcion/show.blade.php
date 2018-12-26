@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Detalles de Inscripción</a></li>
      <li class="breadcrumb-item active">Editar</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <strong>Detalles de Inscripción</strong>
                <small></small>
              </div>
              <form class="">
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for=""><strong>Alumno</strong></label><br>
                    <label for="">{{ $inscripcion->alumno->primer_nombre }} {{ $inscripcion->alumno->segundo_nombre }} {{ $inscripcion->alumno->primer_apellido }} {{ $inscripcion->alumno->segundo_apellido }}</label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for=""><strong>Grado</strong></label><br>
                    <label for="">{{ $inscripcion->grado->nombre }} {{ $inscripcion->grado->seccionAsignada->nombre }} </label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for=""><strong>Plan</strong></label><br>
                    <label for="">{{ $inscripcion->plan->nombre }}</label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for=""><strong>Persona encargada</strong></label><br>
                    <label for="">{{ $inscripcion->persona->nombres }} {{ $inscripcion->persona->apellidos }}</label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for=""><strong>Cuota</strong></label><br>
                    <label for="">Q. {{ $inscripcion->cuota }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="condicion"><strong>Estado</strong></label><br>
                    <label for=""> 
                        @if ($inscripcion->condicion==1)
                            ACTIVO
                        @else
                            INACTIVO
                        @endif
                    </label>
                  </div>
                </div><br>
              </div>
              <div class="card-footer">
                <a href="{{ route('inscripcion.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
