@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Grados</a></li>
      <li class="breadcrumb-item active">Listado</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Grados

              </div>
              <div class="card-body">
                <table id="tabla-grado" class="display table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>Grado</th>
                      <th>Seccion</th>
                      <th>Jornada</th>
                      <th>Nivel</th>

                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($grados as $grado)
                    <tr>
                      <td>{{ $grado->grado }}</td>
                      <td>{{ $grado->seccion }}</td>
                      <td>{{ $grado->jornada }}</td>
                      <td>{{ $grado->carrera }}</td>

                      <td>
                        <a href="{{route('notas.cursos', $grado->id_grado)}}">
                          <button type="button" class="btn btn-primary btn-sm" name="button"> Cursos</button>
                        </a>

                          @if (auth()->user()->hasRole(['admin','director']))
                            <div class="btn-group">
                              <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Reportes
                              </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" target="_blank" href="{{route('notas.cuadrofinal', [$grado->id_grado,1])}}">Primera Unidad</a>
                              <a class="dropdown-item" target="_blank" href="{{route('notas.cuadrofinal', [$grado->id_grado,2])}}">Segunda Unidad</a>
                              <a class="dropdown-item" target="_blank" href="{{route('notas.cuadrofinal', [$grado->id_grado,3])}}">Tercera Unidad</a>
                              <a class="dropdown-item" target="_blank" href="{{route('notas.cuadrofinal', [$grado->id_grado,4])}}">Cuarta Unidad</a>
                              <a class="dropdown-item" target="_blank" href="{{route('notas.cuadrofinal', [$grado->id_grado,5])}}">Quinta Unidad</a>



                              <!--<a class="dropdown-item" href="#">Cuotas</a>
                              <a class="dropdown-item" href="#">Alumnos</a>-->
                            </div>
                              </div>
                          @endif




                      </td>
                    </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
        </div>
    </div>
    <!-- /.conainer-fluid -->
    @push ('scripts')
      <script type="text/javascript">
        $('#tabla-grado').DataTable({
        "pagingType": "full_numbers",
        "language": {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
          },
          "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        }
          });
      </script>

    @endpush
@endsection
