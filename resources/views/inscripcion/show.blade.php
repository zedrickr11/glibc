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
                  <div class="col-xs-10 col-sm-8 col-md-8 col-lg-8">
                    <label for=""><strong>Alumno</strong></label><br>
                    <label for="">{{ $inscripcion->alumno->primer_nombre }} {{ $inscripcion->alumno->segundo_nombre }} {{ $inscripcion->alumno->primer_apellido }} {{ $inscripcion->alumno->segundo_apellido }}</label>
                  </div>
                  <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4">
                    <label for="condicion"><strong>Estado</strong></label><br>
                    <label for=""> 
                        @if ($inscripcion->condicion==1)
                            <span class="badge badge-success">ACTIVO</span>
                        @else
                            <span class="badge badge-danger">INACTIVO</span>
                        @endif
                    </label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-10 col-sm-8 col-md-8 col-lg-8">
                    <label for=""><strong>Grado</strong></label><br>
                    <label for="">{{ $inscripcion->grado->nombre }} Seccion {{ $inscripcion->grado->seccionAsignada->nombre }} Jornada {{ $inscripcion->grado->carrera->jornada->nombre }} Ciclo Escolar {{ $inscripcion->ciclo->anio }} </label>
                  </div>
                  <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4">
                    <label for=""><strong>Plan</strong></label><br>
                    <label for="">{{ $inscripcion->plan->nombre }}</label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-10 col-sm-8 col-md-8 col-lg-8">
                    <label for=""><strong>Persona encargada</strong></label><br>
                    <label for="">{{ $inscripcion->persona->nombres }} {{ $inscripcion->persona->apellidos }}</label>
                  </div>
                  <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4">
                    <label for="condicion"><strong>Pago de inscripcion</strong></label><br>
                    <label for="">Q. {{ $inscripcion->pago_inscripcion }}</label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 offset-md-8">
                    <label for=""><strong>Cuota</strong></label><br>
                    <label for="">Q. {{ $inscripcion->cuota }}</label>
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
