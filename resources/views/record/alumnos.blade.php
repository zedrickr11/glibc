@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Grado</a></li>
      <li class="breadcrumb-item"><a href="#">Curso</a></li>
      <li class="breadcrumb-item active">Alumnos</li>
      <!-- Breadcrumb Menu-->
    </ol>
    
    @if(Session::has('flash_message'))
      <div class="col-md-6 offset-md-6">
        <div class="alert alert-success" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong> {{session('flash_message')}}</strong>
        </div>
      </div>
    @endif

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Alumnos <strong>{{$curso->nombre}} {{$grado->nombre}} {{$grado->seccionAsignada->nombre}} {{$grado->carrera->jornada->nombre}}</strong>
            </div>
              <div class="card-body">
                <table id="tabla-alumno" class="display table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Alumno</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php($cont = 0)
                    @foreach ($alumnos as $alumno)
                    @php($cont++)
                    <tr>
                      <td>{{ $cont }}</td>
                      <td>
                         {{ $alumno->primer_apellido }}  {{ $alumno->segundo_apellido }} {{ $alumno->primer_nombre }} {{ $alumno->segundo_nombre }} {{ $alumno->tercer_nombre }}
                      </td>
                      <td>
                        <button type="button" class=" btn btn-primary btn-sm" data-toggle="modal" data-target="#primaryModal-{{$alumno->id_alumno}}">
                          <i class="icon-check"></i>&nbsp; Reportar
                        </button>
                      </td>
                    </tr>
                    @include('record.reporte')
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <a href="{{route('record.cursos', $grado->id_grado)}}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
              </div>
            </div>
          </div>
          </div>
        </div>
    </div>
    <!-- /.conainer-fluid -->
    @push ('scripts')
      <script type="text/javascript">

        $('div.alert').not('.alert-important').delay(3000).slideUp(300);

        $('#tabla-alumno').DataTable({
        "order": [[1, "asc"]],
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
