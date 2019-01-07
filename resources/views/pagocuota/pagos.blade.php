@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
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
                      <th style="width: 15%">Cuota</th>
                      <th style="width: 15%">Cantidad a pagar</th>
                      <th style="width: 10%">Fecha de pago</th>
                      <th style="width: 15%">Monto</th>
                      <th style="width: 15%">Estado</th>
                      <th style="width: 15%">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cuotas as $cuota)
                    <tr>
                      <td>{{ $cuota->nombre }}</td>
                      <td>{{ $cuota->cantidad }}</td>
                      <td></td>
                      <td></td>
                      <td>
                        @foreach($pagos as $pago)
                          @if ($pago->id_cuota == $cuota->id_cuota)
                            @if($pago->monto == $cuota->cantidad)
                              <span class="badge badge-danger">Pagado</span>
                            @elseif($pago->monto < $cuota->cantidad)
                              <span class="badge badge-danger">Faltante</span>
                            @endif
                          @else
                            <span class="badge badge-secondary">Pendiente</span>
                          @endif
                        @endforeach
                      </td>
                      <td>
                        @foreach($pagos as $pago)
                          @if ($pago->id_cuota == $cuota->id_cuota)
                            @if($pago->monto == $cuota->cantidad)
                              <span class="badge badge-danger">Pagado</span>
                            @elseif($pago->monto < $cuota->cantidad)
                              <span class="badge badge-danger">Faltante</span>
                            @endif
                          @else
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#primaryModal-{{$cuota->id_cuota}}">
                            <i class="icon-check"></i>&nbsp;Registrar pago
                          </button>
                          @endif
                        @endforeach
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

      var totalMensualidad = 0;
      var totalMora = 0;
      var totalPagado = 0;

      var moracantidad = 0;

      var morapendiente = 0;
      var total = 0;
      var saldo = 0;
      
      moracantidad = $("#moracantidad").html()

      $(".monto").each(function(){
        totalMensualidad+=parseFloat($(this).html()) || 0;
      });
      $(".mora").each(function(){
        totalMora+=parseFloat($(this).html()) || 0;
      });
      $(".estado").each(function(){
        if($(this).html() == "Atrasado"){
          morapendiente = morapendiente + parseFloat(moracantidad);
        }
      });
      
      total = (parseFloat($("#plan").html()) * parseFloat($("#cuota").html())) + totalMora + morapendiente;
      totalPagado = totalMensualidad + totalMora;
      saldo = total - totalPagado;

      $("#pagado").text("Q. " + totalPagado);
      $("#saldo").text("Q. " + saldo);
      $("#total").text("Q. " + total);
      </script>
    @endpush
@endsection
