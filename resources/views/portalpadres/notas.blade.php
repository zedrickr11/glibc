@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Portal</a></li>
      <li class="breadcrumb-item active">Notas</li>
      <!-- Breadcrumb Menu-->

    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          @if ($alumno==null)
            <h1>NO TIENES ACCESO</h1>
          @else
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="icon-check"></i>{{ $alumno->primer_nombre }} {{ $alumno->segundo_nombre }} {{ $alumno->primer_apellido }} {{ $alumno->segundo_apellido }}
                <ul class="nav nav-tabs float-right" role="tablist">
                   <li class="nav-item">
                    <a tab="" class="nav-link active" data-toggle="tab" href="#tasks" role="tab">Notas</a>
                  </li>
                  <li class="nav-item">
                    <a tab="" class="nav-link" data-toggle="tab" href="#tickets" role="tab">Reportes</a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <div class="tab-content">
                  <div class="tab-pane active" id="tasks">
                    <table class="table table-hover table-align-middle mb-0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Curso</th>
                          @php($cont=0)
                          @foreach ($unidades as $unidad)
                            <th>{{ $unidad->nombre }}</th>
                              @php($cont++)
                          @endforeach
                          <th>Promedio</th>
                          <th>Nota Final</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php($contador=0)
                        @foreach ($materia as $m)

                      <tr>

                        @php($contador++)
                        <td>{{$contador}}</td>
                        <td>{{ $m->nombre }}</td>
                        @foreach($notas as $nota)

                            @if($nota->id_curso == $m->id_curso )


                                <td>{{$nota->notaf}}</td>



                            @endif

                        @endforeach
                        @foreach ($sumafinal as $sf)
                          @if ( $sf->id_curso==$m->id_curso && $sf->id_alumno==$alumno->id)
                            <td>{{number_format($sf->notaf/$cont, 2, '.', '')}}</td>

                          @endif
                        @endforeach





                      </tr>

                    @endforeach

                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane" id="tickets">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Observación</th>
                          <th>Grado</th>
                          <th>Curso</th>
                          <th>Prof.</th>
                          <th>Fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          @foreach ($records as $record)
                            <td>{{ $record->id_record }}</td>
                            <td>{{ $record->observacion }}</td>
                            <td>{{ $record->grado->nombre }}</td>
                            <td>{{ $record->curso->nombre }}</td>
                            <td>{{ $record->persona->nombres }} {{ $record->persona->apellidos }}</td>
                            <td>{{ $record->fecha }}</td>



                          @endforeach
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
          </div>
        </div>
    </div>

@endsection
