
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
                <div class="col-md-10">
                  <label for=""><h5><strong>Alumno: </strong></h5></label>
                  <label for=""><h5>&nbsp; {{ $inscripcion->alumno->primer_nombre }} {{ $inscripcion->alumno->segundo_nombre }} {{ $inscripcion->alumno->tercer_nombre }} {{ $inscripcion->alumno->primer_apellido }} {{ $inscripcion->alumno->segundo_apellido }}</h5></label>
                </div>
                <div class="col-md-2">
                  <label for=""><h5><strong>Plan: </strong></h5></label>
                  <label for=""><h5>&nbsp; <span id="plan">{{ $inscripcion->plan->cantidad }}</span></h5></label>
                </div>
                <div class="col-md-10">
                  <label for=""><h5><strong>Grado: </strong></h5></label>
                  <label for=""><h5>&nbsp; {{$inscripcion->grado->nombre}} Seccion {{$inscripcion->grado->seccionAsignada->nombre}} {{$inscripcion->grado->carrera->jornada->nombre}}  </h5></label>
                </div>
                <div class="col-md-2">
                  <label for=""><h5><strong>Cuota: </strong></h5></label>
                  <label for=""><h5>&nbsp;Q. <span id="cuota">{{ $inscripcion->cuota }}</span></h5></label>
                </div>
                <div class="col-md-2 offset-md-10">
                  <label for=""><h5><strong>Mora: </strong></h5></label>
                  <label for=""><h5>&nbsp;Q. <span id="moracantidad">{{ $mora->cantidad }}</span></h5></label>
                </div>
              </div><br>
              <div class="row">
              <div class="col-md-12">
                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th style="width: 15%">Mensualidad</th>
                      <th style="width: 15%">Fecha de pago</th>
                      <th style="width: 10%">Mora</th>
                      <th style="width: 15%">Monto</th>
                      <th style="width: 15%">Estado</th>
                      <th style="width: 15%">Total a pagar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($pagos) > 0)
                    @foreach ($pagos as $pago)
                    <tr>
                      <td>{{ $pago->mensualidad->nombre }}</td>
                      <td>{{ $pago->fecha }}</td>
                      <td class="mora">{{ $pago->mora }}</td>
                      <td class="monto">{{ $pago->monto }}</td>
                      <td>
                        @if ($pago->monto == null)
                          @if(\Carbon\Carbon::parse($pago->mensualidad->dia_limite . '-' . ($pago->mensualidad->id_mensualidad + 1) . '-' . $ano) <  \Carbon\Carbon::parse($date))
                            <span class="badge badge-danger estado">Atrasado</span>
                          @else
                            <span class="badge badge-secondary estado">Pendiente</span>
                          @endif
                        @elseif($pago->monto && $pago->fecha)
                          @if($pago->monto < $inscripcion->cuota)
                            <span class="badge badge-warning estado">Faltante</span>
                          @elseif($pago->monto == $inscripcion->cuota)
                            <span class="badge badge-success estado">Pagado</span>
                          @endif
                        @endif
                      </td>
                      <td>
                        @if ($pago->monto == null)
                          @if(\Carbon\Carbon::parse($pago->mensualidad->dia_limite . '-' . ($pago->mensualidad->id_mensualidad + 1) . '-' . $ano) <  \Carbon\Carbon::parse($date))
                            Q. {{number_format($inscripcion->cuota + $mora->cantidad, 2, '.', ',')}}
                          @else
                            Q. {{ $inscripcion->cuota }}
                          @endif
                        @elseif($pago->monto && $pago->fecha)
                          Q. {{ ($inscripcion->cuota + $pago->mora) - ($pago->monto + $pago->mora) }}
                        @endif
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="7" align="center"><strong>No se han registrado pagos: </strong></td>
                    </tr>
                    @endif
                    <tr style="background-color: #CEECF5;">
                      <td colspan="6" align="right" style="color:red;"><strong> Saldo: </strong></td>
                      <td id="saldo" style="color:red;"></td>
                    </tr>
                    <tr style="background-color: #CEECF5;">
                      <td colspan="6" align="right"><strong> Cantidad pagada: </strong></td>
                      <td id="pagado"></td>
                    </tr>
                    <tr style="background-color: #CEECF5;">
                      <td colspan="6" align="right"><strong> Total a pagar: </strong></td>
                      <td id="total"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>
              </div>
              
            </div>
          </div>
          </div>
        </div>
    </div>

    @push ('scripts')
    <!-- /.conainer-fluid -->
    <script type="text/javascript">
      var totalMensualidad = 0;
      var totalMora = 0;
      var totalPagado = 0;

      var moracantidad = 0;
      var cuotacantidad = 0;
      var plancantidad = 0;

      var morapendiente = 0;
      var total = 0;
      var saldo = 0;
      
      moracantidad = parseFloat($("#moracantidad").html());
      cuotacantidad = parseFloat($("#cuota").html());
      plancantidad = parseFloat($("#plan").html());

      $(".monto").each(function(){
        totalMensualidad+=parseFloat($(this).html()) || 0;
      });
      $(".mora").each(function(){
        totalMora+=parseFloat($(this).html()) || 0;
      });
      $(".estado").each(function(){
        if($(this).html() == "Atrasado"){
          morapendiente = morapendiente + moracantidad;
        }
      });
      
      total = (plancantidad * cuotacantidad) + totalMora + morapendiente;
      totalPagado = totalMensualidad + totalMora;
      saldo = total - totalPagado;

      $("#pagado").text("Q. " + totalPagado);
      $("#saldo").text("Q. " + saldo);
      $("#total").text("Q. " + total);
      </script>
      @endpush