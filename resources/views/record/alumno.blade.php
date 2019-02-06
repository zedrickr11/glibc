@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item active">Record</li>
      <!-- Breadcrumb Menu-->
    </ol>
    
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Record de <strong>{{$inscripcion->alumno->primer_nombre}} {{$inscripcion->alumno->segundo_nombre}} {{$inscripcion->alumno->tercer_nombre}} {{$inscripcion->alumno->primer_apellido}} {{$inscripcion->alumno->segundo_apellido}}</strong>
            </div>
            
            <div class="card-body">

              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#reportes" role="tab" aria-controls="reportes"><i class="icon-book-open"></i> Reportes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#asistencias" role="tab" aria-controls="asistencias"><i class="icon-list"></i> Asistencias</a>
                </li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane active" id="reportes" role="tabpanel">
                  <a target="_blank" href="{{route('record.reportespdf',$inscripcion->id_inscripcion )}}">
                    <button type="button" class="btn btn-primary btn-sm" name="button"><span class="icon-doc"></span> Generar Reporte</button>
                  </a><br><br>
                  <table id="tabla" class="display table table-responsive-sm table-striped">
                    <thead>
                      <tr>
                        <th style="width: 40%;">Observacion</th>
                        <th style="width: 20%;">Curso</th>
                        <th style="width: 20%;">Maestro</th>
                        <th style="width: 15%;">Fecha/Hora</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($reportes) > 0)
                        @foreach ($reportes as $reporte)
                        <tr>
                          <td>
                            {{$reporte->observacion}}
                          </td>
                          <td>
                            {{$reporte->curso->nombre}}
                          </td>
                          <td>
                            {{$reporte->persona->nombres}} {{$reporte->persona->apellidos}}
                          </td>
                          <td>
                            {{ \Carbon\Carbon::parse($reporte->fecha)->format('d-m-Y H:i') }}
                          </td>
                        </tr>
                        @endforeach
                      @else
                        <tr>
                          <td colspan="4" align="center"><strong>El alumno no tiene ningun reporte</strong></td>
                        </tr>
                      @endif
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane" id="asistencias" role="tabpanel">
                  <a target="_blank" href="{{route('record.inasistenciaspdf',$inscripcion->id_inscripcion )}}">
                    <button type="button" class="btn btn-primary btn-sm" name="button"><span class="icon-doc"></span> Generar Reporte</button>
                  </a><br><br>
                  <table id="tabla" class="display table table-responsive-sm table-striped">
                    <thead>
                      <tr>
                        <th style="width: 20%;">Estado</th>
                        <th style="width: 20%;">Fecha</th>
                        <th style="width: 40%;">Observación</th>
                        <th style="width: 20%;">Curso</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($inasistencias) > 0)
                        @foreach ($inasistencias as $inasistencia)
                        <tr>
                          <td>
                            @if($inasistencia->condicion == 0)
                              <span class="badge badge-danger">No asistió</span>
                            @endif
                            @if($inasistencia->condicion == 1)
                              <span class="badge badge-success">Asistió</span>
                            @endif
                          </td>
                          <td>
                            {{ \Carbon\Carbon::parse($inasistencia->fecha)->format('d-m-Y') }}
                          </td>
                          <td>
                            {{$inasistencia->observacion}}
                          </td>
                          <td>
                            {{$inasistencia->id_asignacion_curso}}
                          </td>
                        </tr>
                        @endforeach
                      @else
                        <tr>
                          <td colspan="4" align="center"><strong>El alumno no tiene ninguna inasistencia</strong></td>
                        </tr>
                      @endif
                    </tbody>
                  </table>
                </div>

            </div>
            </div>
              </div>
              <div class="card-footer">
                <a href="{{ route('inscripcion.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
              </div>
            </div>
          </div>
          </div>
        </div>
    </div>
    
@endsection
