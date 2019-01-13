@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Actividades</a></li>
      <li class="breadcrumb-item active">Listado</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Actividades
                  <a href="{{ route('actividad.create',[$grado,$curso,$id_asignacion->id_asignacion_curso]) }}"> <button type="button" class="pull-right  btn btn-success btn-sm"> <span class="fa fa-plus"></button></a>
              </div>
              <div class="card-body">
                <table id="tabla-grado" class="display table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>Actividad</th>
                      <th>Descripción</th>
                      <th>Nota</th>
                      <th>Fecha de entrega</th>
                      <th>Unidad</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($actividades as $act)
                    <tr>
                      <td>{{ $act->nombre }}</td>
                      <td>{{ $act->descripcion }}</td>
                      <td>{{ $act->valor_nota }}</td>
                      <td>{{ $act->fecha }}</td>
                      <td>{{ $act->unidad->nombre }}</td>

                      <td>
                        <a href="{{ route('notas.alumnos',[$grado,$act->id_actividad]) }}">
                          <button type="button" class="btn btn-primary btn-sm" name="button"> Calificar</button>
                        </a>
                        <a href="{{ route('actividad.edit',[$grado,$curso,$id_asignacion->id_asignacion_curso,$act->id_actividad]) }}">
                          <button type="button" class="btn btn-warning btn-sm" name="button"> Editar</button>
                        </a>
                        <form style="display: inline" method="POST" action="{{route('actividad.destroy',$act->id_actividad)}}">
                        {!!method_field('DELETE')!!}
                        {!!csrf_field()!!}
                          <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>

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
