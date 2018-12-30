@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Pagos de Mensualidad</a></li>
      <li class="breadcrumb-item active">Listado</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Alumnos
              </div>
              <div class="card-body">
                <table id="tabla-alumnos" class="display table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Alumno</th>
                      <th>Grado</th>
                      <th>Plan</th>
                      <th>Cuota</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($inscripciones as $inscripcion)
                    <tr>
                      <td>{{ $inscripcion->id_inscripcion }}</td>
                      <td>{{ $inscripcion->primer_nombre }} {{ $inscripcion->segundo_nombre }} {{ $inscripcion->primer_apellido }} {{ $inscripcion->segundo_apellido }}</td>
                      <td>{{ $inscripcion->grado_nombre }} {{ $inscripcion->ciclo_ano }}</td>
                      <td>{{ $inscripcion->plan_nombre }}</td>
                      <td>{{ $inscripcion->cuota }}</td>
                      <td>
                        <a href="{{route('pagomensualidad.pagos', $inscripcion->id_inscripcion)}}">
                          <button type="button" class="btn btn-primary btn-sm" name="button"><span class="icon-wallet"></span>&nbsp; Pagos</button>
                        </a>
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
        $('#tabla-alumnos').DataTable({
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
