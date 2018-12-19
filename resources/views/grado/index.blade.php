@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
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
                <a href="grado/create"> <button type="button" class="pull-right  btn btn-success btn-sm"> <span class="fa fa-plus"></button></a>
              </div>
              <div class="card-body">
                <table id="tabla-grado" class="display table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Seccion</th>
                      <th>Ciclo</th>
                      <th>Maestro Guia</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($grados as $grado)
                    <tr>
                      <td>{{ $grado->nombre }}</td>
                      <td>{{ $grado->seccionAsignada->nombre }}</td>
                      <td>{{ $grado->ciclo->año }}</td>
                      <td>{{ $grado->persona->nombres }} {{ $grado->persona->apellidos }}</td>
                      <td>
                        @if ($grado->condicion==1)
                          <span class="badge badge-success">Activo</span>
                        @else
                          <span class="badge badge-danger">Inactivo</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{route('grado.asignacion', $grado->id_grado)}}">
                          <button type="button" class="btn btn-primary btn-sm" name="button"> Cursos</button>
                        </a>
                        <a href="{{route('grado.edit', $grado->id_grado)}}">
                          <button type="button" class="btn btn-warning btn-sm" name="button"><span class="fa fa-pencil-square-o"></span></button>
                        </a>
                        @if($grado->condicion)
                        <!--<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dangerModal-{{$grado->id_grado}}">
                          <span class="fa fa-trash-o"></span>
                        </button>-->
                        @else
                        <!--<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#successModal-{{$grado->id_grado}}">
                          <span class="icon-check"></span>
                        </button>-->
                        @endif
                      </td>
                    </tr>
                    @include('grado.deshabilitar')
                    @include('grado.habilitar')
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
