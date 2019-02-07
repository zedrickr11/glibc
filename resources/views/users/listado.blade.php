@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
      <li class="breadcrumb-item active">Index</li>
      <!-- Breadcrumb Menu-->

    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-header">
                </i> <a href="{{route('usuarios.index')}}">
                  <button type="button" name="atras" class="btn btn-warning btn-sm"><span class="fa fa-arrow-left"></span> </button>
                </a>Roles de: {{ $user->name }}


              </div>
              <div class="card-body">
                <table id="tabla-seccion" class="display table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>#</th>

                      <th>Rol</th>

                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($listado as $user)
                    <tr>
                      <td>{{ $user->id}}</td>
                      <td>{{ $user->nombre}}</td>




                      <td>
                        <form style="display: inline" method="POST" action="{{route('usuarios.destroy', $user->id)}}">
                        {!!method_field('DELETE')!!}
                        {!!csrf_field()!!}
                          <button type="submit" class="btn btn-danger btn-sm" name="button"><span class="fa fa-trash"></span> </button>
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
        $('#tabla-seccion').DataTable({
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
