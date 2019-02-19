@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Cursos</a></li>
      <li class="breadcrumb-item active">Listado</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Cursos

              </div>
              <div class="card-body">
                <table id="tabla-grado" class="display table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>Curso</th>


                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cursos as $curso)
                    <tr>
                      <td>{{ $curso->nombre }}</td>


                      <td>
                        @if (!auth()->user()->hasRole(['admin']))
                          <a href="{{ route('notas.actividades',[$id_grado,$curso->id_curso]) }}">
                            <button type="button" class="btn btn-primary btn-sm" name="button"> Actividades</button>
                          </a>
                        @endif

                        <div class="btn-group">
                          <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Reportes
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" target="_blank" href="">Primera Unidad</a>
                            <a class="dropdown-item" target="_blank" href="">Segunda Unidad</a>
                            <a class="dropdown-item" target="_blank" href="">Tercera Unidad</a>
                            <a class="dropdown-item" target="_blank" href="">Cuarta Unidad</a>
                            <a class="dropdown-item" target="_blank" href="">Quinta Unidad</a>



                            <!--<a class="dropdown-item" href="#">Cuotas</a>
                            <a class="dropdown-item" href="#">Alumnos</a>-->
                          </div>
                        </div>


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
