@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Rol</a></li>
      <li class="breadcrumb-item active">Index</li>
      <!-- Breadcrumb Menu-->

    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Rol
                <a href="rol/create"> <button type="button" class="pull-right  btn btn-success btn-sm"> <span class="fa fa-plus"></button></a>

              </div>
              <div class="card-body">
                <table id="tabla-plan" class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Rol</th>
                      <th>Descripción</th>
                      <th>Nombre a mostrar</th>
                      <th>Condicion</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $rol)
                    <tr>
                      <td>{{ $rol->id_rol }}</td>
                      <td>{{ $rol->nombre }}</td>
                      <td>{{ $rol->descripcion }}</td>
                      <td>{{ $rol->display_name }}</td>
                      <td>
                        @if ($rol->condicion==1)
                          <span class="badge badge-success">Activo</span>
                        @else
                          <span class="badge badge-danger">Inactivo</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{route('rol.edit',$rol->id_rol )}}">
                          <button type="button" class="btn btn-warning btn-sm" name="button"><span class="fa fa-pencil-square-o"></span></button>
                        </a>
                        @if($rol->condicion)
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dangerModal-{{$rol->id_rol}}">
                          <span class="fa fa-trash-o"></span>
                        </button>
                        @else
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#successModal-{{$rol->id_rol}}">
                          <span class="icon-check"></span>
                        </button>
                        @endif
                      </td>
                    </tr>
                    @include('rol.deshabilitar')
                    @include('rol.habilitar')
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
        $('#tabla-plan').DataTable({
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
