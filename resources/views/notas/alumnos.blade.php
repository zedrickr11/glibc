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
            
              <a href="{{ route('notas.actividades',[$grado,$curso]) }}"> <button type="button" class="btn btn-sm btn-warning"><i class="fa fa-toggle-left"></i> Atrás</button></a>


            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i>  Alumnos
            </div>
              <div class="card-body">
                <table id="tabla-alumno" class="display table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Nota</th>
                      <th>Opciones</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($alumnos as $alumno)
                    <tr>
                      <td>{{ $alumno->id }}</td>
                      <td>{{ $alumno->primer_nombre }} {{ $alumno->segundo_nombre }} {{ $alumno->primer_apellido }}  {{ $alumno->segundo_apellido }}</td>
                      <td>
                        @foreach ($nota as $n )
                          @if( $alumno->id==$n->id )
                            {{ $n->nota }}
                          @endif
                        @endforeach

                      </td>
                      <td>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#dangerModal-{{$alumno->id}}">
                          Nota
                        </button>

                      </td>

                    </tr>
                    @include('notas.nota')
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
        $('#tabla-alumno').DataTable({
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
