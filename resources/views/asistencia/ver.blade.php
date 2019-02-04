@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Grado</a></li>
      <li class="breadcrumb-item"><a href="#">Curso</a></li>
      <li class="breadcrumb-item">Asistencia</li>

      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Asistencia - <strong>{{$curso->nombre}} {{$grado->nombre}} {{$grado->seccionAsignada->nombre}} {{$grado->carrera->jornada->nombre}}</strong>
                <span class="pull-right" ><strong>Fecha: &nbsp;{{ \Carbon\Carbon::parse($fecha)->format('d-m-Y') }}</strong></span>
              </div>
              <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Alumno</th>
                      <th>Observaciones</th>
                      <th>Asistencia</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php($contador = 0)
                    @foreach ($asistencias as $asistencia)
                    @php($contador++)
                    <tr>
                        <td>{{$contador}}</td>
                        <td>{{ $asistencia->primer_apellido }} {{ $asistencia->segundo_apellido }} {{ $asistencia->primer_nombre }} {{ $asistencia->segundo_nombre }} {{ $asistencia->tercer_nombre }} </td>
                        <td>
                          {{$asistencia->observacion}}
                        </td>
                        <td>
                          @if ($asistencia->condicion==1)
                            <span class="badge badge-success">Asistió</span>
                          @else
                            <span class="badge badge-danger">No Asistió</span>
                          @endif
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <a href="{{route('asistencia.asistencias', [$curso->id_curso, $grado->id_grado])}}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
              </div>
            </div>
          </div>
          </div>
        </div>
    </div>
@endsection
