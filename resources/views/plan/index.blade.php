@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Plan</a></li>
      <li class="breadcrumb-item active">Index</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Plan
                <a href="plan/create"> <button type="button" class="pull-right  btn btn-success btn-sm"> <span class="fa fa-plus"></button></a>
              </div>
              <div class="card-body">
                <table id="tabla-plan" class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Plan</th>
                      <th>Cantidad de pagos</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($plan as $cur)
                    <tr>
                      <td>{{ $cur->id }}</td>
                      <td>{{ $cur->nombre }}</td>
                      <td>{{ $cur->cantidad }}</td>
                      <td>
                        @if ($cur->condicion==1)
                          <span class="badge badge-success">Activo</span>
                        @else
                          <span class="badge badge-danger">Inactivo</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{route('plan.edit',$cur->id )}}">
                          <button type="button" class="btn btn-warning btn-sm" name="button"><span class="fa fa-pencil-square-o"></span></button>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dangerModal-{{$cur->id}}">
                          <span class="fa fa-trash-o"></span>
                        </button>
                      </td>
                    </tr>
                    @include('plan.modal')
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
