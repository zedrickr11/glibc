@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Pagos de Cuotas</a></li>
      <li class="breadcrumb-item active">Listado</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Pagos Registrados
              </div>
              <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <label for=""><h5><strong>Alumno: </strong></h5></label>
                  <label for=""><h5>&nbsp; {{ $inscripcion->alumno->primer_nombre }} {{ $inscripcion->alumno->segundo_nombre }} {{ $inscripcion->alumno->tercer_nombre }} {{ $inscripcion->alumno->primer_apellido }} {{ $inscripcion->alumno->segundo_apellido }}</h5></label>
                </div>
                <div class="col-md-12">
                  <label for=""><h5><strong>Grado: </strong></h5></label>
                  <label for=""><h5>&nbsp; {{$inscripcion->grado->nombre}} Seccion {{$inscripcion->grado->seccionAsignada->nombre}} {{$inscripcion->grado->carrera->jornada->nombre}}  </h5></label>
                </div>
              </div><br>
              <div class="row">
              <div class="col-md-12">
                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th style="width: 25%">Cuota</th>
                      <th style="width: 15%">Cantidad a pagar</th>
                      <th style="width: 15%">Fecha de pago</th>
                      <th style="width: 15%">Monto Pagado</th>
                      <th style="width: 15%">Estado</th>
                      <th style="width: 15%">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cuotas as $cuota)
                    <tr>
                      <td>{{ $cuota->nombre }}</td>
                      <td>{{ $cuota->cantidad }}</td>
                      <td>
                        @foreach($pagos as $pago)
                          @if ($pago->id_cuota == $cuota->id_cuota)
                            {{$pago->fecha}}
                          @endif
                        @endforeach
                      </td>
                      <td>
                        @foreach($pagos as $pago)
                          @if ($pago->id_cuota == $cuota->id_cuota)
                            {{$pago->monto}}
                          @endif
                        @endforeach
                      </td>
                      <td>
                        @if(count($pagos) > 0)
                          @php($a = 0)
                          @foreach($pagos as $pago)
                            @if ($pago->id_cuota == $cuota->id_cuota)
                              @php ($a++)
                              @if($pago->monto == $cuota->cantidad)
                                <span class="badge badge-success">Pagado</span>
                              @elseif($pago->monto < $cuota->cantidad)
                                <span class="badge badge-danger">Faltante</span>
                              @endif
                            @endif
                          @endforeach
                          @if($a == 0)
                            <span class="badge badge-secondary">Pendiente</span>
                          @endif
                        @else
                          <span class="badge badge-secondary">Pendiente</span>
                        @endif
                      </td>
                      <td>
                        @if(count($pagos) > 0)
                          @php($b = 0)
                          @foreach($pagos as $pago)
                            @if ($pago->id_cuota == $cuota->id_cuota)
                              @php ($b++)
                            @endif
                          @endforeach
                          @if($b == 0)
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#primaryModal-{{$cuota->id_cuota}}">
                              <i class="icon-check"></i>&nbsp;Registrar pago
                            </button>
                          @endif
                        @else
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#primaryModal-{{$cuota->id_cuota}}">
                            <i class="icon-check"></i>&nbsp;Registrar pago
                          </button>
                        @endif
                      </td>
                    </tr>
                    @include('pagocuota.registrarpago')
                    @endforeach
                  </tbody>
                </table>
              </div>
              </div>
              </div>
              <div class="card-footer">
                <a href="{{ route('pagocuota.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
              </div>
            </div>
          </div>
          </div>
        </div>
    </div>
    <!-- /.conainer-fluid -->
    @push ('scripts')
      <script type="text/javascript">
        $('#tabla-pagos').DataTable({
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
