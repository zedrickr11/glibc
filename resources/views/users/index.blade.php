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
                <i class="fa fa-align-justify"></i> Usuarios


              </div>
              <div class="card-body">
                <table id="tabla-seccion" class="display table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Correo electrónico</th>
                      <th>Rol</th>

                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td><a href="{{route('usuarios.show',$user->id)}}">{{ $user->persona->nombres }} {{ $user->persona->apellidos }}</a></td> 
                      <td>{{ $user->email }}</td>
                      <td>
                      @foreach ($user->roles as $role)
                           <a href="{{route('usuarios.list',$user->id)}}">{{$role->display_name }}</a>
                      @endforeach
                    </td>


                      <td>

                        <a href="{{route('usuarios.edit',$user->id )}}">
                          <button type="button" class="btn btn-warning btn-sm" name="button"><span class="fa fa-pencil-square-o"></span></button>
                        </a>







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
