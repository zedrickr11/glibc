@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Alumnos</a></li>
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
                <a href="alumno/create"> <button type="button" class="pull-right  btn btn-success btn-sm"> <span class="fa fa-plus"></button></a>
              </div>
              <div class="card-body">
                <table id="tabla-alumno" class="display table table-responsive-sm table-striped dt-responsive dt-bootstrap4">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($alumnos as $alumno)
                    <tr>
                      <td>{{ $alumno->id }}</td>
                      <td>{{ $alumno->primer_nombre }} {{ $alumno->segundo_nombre }} {{ $alumno->primer_apellido }}  {{ $alumno->segundo_apellido }}</td>
                      <td>
                        @if ($alumno->condicion==1)
                          <span class="badge badge-success">Activo</span>
                        @else
                          <span class="badge badge-danger">Inactivo</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{route('alumno.show',$alumno->id)}}">
                          <button type="button" class="btn btn-info btn-sm" name="button"> <span class="fa fa-eye"></span> </button>
                        </a>
                        <a href="{{route('alumno.edit',$alumno->id )}}">
                          <button type="button" class="btn btn-warning btn-sm" name="button"><span class="fa fa-pencil-square-o"></span></button>
                        </a>
                        @if($alumno->condicion)
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dangerModal-{{$alumno->id}}">
                          <span class="fa fa-trash-o"></span>
                        </button>
                        @else
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#successModal-{{$alumno->id}}">
                          <span class="icon-check"></span>
                        </button>
                        @endif
                      </td>
                    </tr>
                    @include('alumno.deshabilitar')
                    @include('alumno.habilitar')
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
      //$('#tabla-alumno').DataTable();
        $('#tabla-alumno').DataTable({
        "order": [[0, "desc"]],
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
