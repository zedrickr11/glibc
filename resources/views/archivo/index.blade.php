@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Archivos</a></li>
      <li class="breadcrumb-item active">Listado</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Archivos Subidos
                @if(auth()->user()->hasRole(['admin']))
                  <a href="archivo/create"> <button type="button" class="pull-right  btn btn-success btn-sm"> <span class="fa fa-plus"></button></a>
                @endif
              </div>
              <div class="card-body">
                <table id="tabla-curso" class="display table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>Nombre del archivo</th>
                      <th>Link de Descarga</th>
                      @if(auth()->user()->hasRole(['admin']))
                      <th>Opciones</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($archivos as $archivo)
                    <tr>
                      <td>{{ $archivo->nombre }}</td>
                      <td><a href="{{route('archivo.downloadArchivo',$archivo->id_archivo )}}">Descargar Archivo</a> </td>
                      @if(auth()->user()->hasRole(['admin']))
                      <td>
                          <a href="{{route('archivo.edit',$archivo->id_archivo )}}">
                            <button type="button" class="btn btn-warning btn-sm" name="button"><span class="fa fa-pencil-square-o"></span></button>
                          </a>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dangerModal-{{$archivo->id_archivo}}">
                            <span class="fa fa-trash-o"></span>
                          </button>
                      </td>
                      @endif
                    </tr>
                    @include('archivo.modal')
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
        $('#tabla-curso').DataTable({
        "order": [[0, "asc"]],
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
