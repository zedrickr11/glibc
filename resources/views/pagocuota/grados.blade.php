@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Cuotas</a></li>
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
                <i class="fa fa-align-justify"></i> Grados - <strong> Cuota {{ $cuota->nombre }}</strong>
              </div>
              <div class="card-body">
                <table id="tabla-grado" class="display table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Seccion</th>
                      <th>Jornada</th>
                      <th>Nivel</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($grados as $grado)
                    <tr>
                      <td>{{ $grado->grado_nombre }}</td>
                      <td>{{ $grado->seccion_nombre }}</td>
                      <td>{{ $grado->nombre_jornada }}</td>
                      <td>{{ $grado->carrera }}</td>
                      <td>
                        <a href="{{route('pagocuota.alumnos', ['idCuota' => $cuota->id_cuota, 'idGrado' => $grado->id_grado])}}">
                          <button type="button" class="btn btn-primary btn-sm" name="button"><span class="icon-wallet"></span>&nbsp; Pagos</button>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <a href="{{ route('cuota.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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
        "order": [[3, "desc"]],
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
