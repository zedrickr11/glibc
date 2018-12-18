@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Inscripciones</a></li>
      <li class="breadcrumb-item active">Listado</li>
      <!-- Breadcrumb Menu-->

    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Inscripciones
                <a href="inscripcion/create"> <button type="button" class="pull-right  btn btn-success btn-sm"> <span class="fa fa-plus"></button></a>
              </div>
              <div class="card-body">
                <table id="tabla-inscripcion" class="display table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>Alumno</th>
                      <th>Grado</th>
                      <th>Jornada</th>
                      <th>Cuota</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($inscripciones as $inscripcion)
                    <tr>
                      <td>{{ $inscripcion->alumno->primer_nombre }} {{ $inscripcion->alumno->segundo_nombre }} {{ $inscripcion->alumno->primer_apellido }}  {{ $inscripcion->alumno->segundo_apellido }}</td>
                      <td>{{ $inscripcion->detalle->grado->nombre }}</td>
                      <td>{{ $inscripcion->detalle->jornada->nombre }}</td>
                      <td>{{ $inscripcion->cuota }}</td>
                      <td>
                        <a href="{{route('inscripcion.show',$inscripcion->id_inscripcion)}}">
                          <button type="button" class="btn btn-info btn-sm" name="button"> <span class="fa fa-eye"></span> </button>
                        </a>
                        <a href="{{route('inscripcion.edit',$inscripcion->id_inscripcion )}}">
                          <button type="button" class="btn btn-warning btn-sm" name="button"><span class="fa fa-pencil-square-o"></span></button>
                        </a>
                        @if($inscripcion->condicion)
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dangerModal-{{$inscripcion->id_inscripcion}}">
                          <span class="fa fa-trash-o"></span>
                        </button>
                        @else
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#successModal-{{$inscripcion->id_inscripcion}}">
                          <span class="icon-check"></span>
                        </button>
                        @endif
                      </td>
                    </tr>
                    @include('inscripcion.deshabilitar')
                    @include('inscripcion.habilitar')
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
        $('#tabla-inscripcion').DataTable({
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
