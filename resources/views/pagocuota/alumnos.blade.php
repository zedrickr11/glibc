@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Cuotas</a></li>
      <li class="breadcrumb-item"><a href="#">Grados</a></li>
      <li class="breadcrumb-item"><a href="#">Alumnos</a></li>
      <li class="breadcrumb-item active">Listado</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Alumnos <strong> </strong>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    <label for=""><h5><strong>Cuota: </strong></h5></label>
                    <label for=""><h5>&nbsp; {{ $cuota->nombre }}</h5></label>
                  </div>
                  <div class="col-md-2">
                    <label for=""><h5><strong>Monto: </strong></h5></label>
                    <label for=""><h5>&nbsp;Q. {{ $cuota->cantidad }}</h5></label>
                  </div>
                  <div class="col-md-10">
                    <label for=""><h5><strong>Grado: </strong></h5></label>
                    <label for=""><h5>&nbsp; {{$grado->nombre}} Seccion {{$grado->seccionAsignada->nombre}} {{$grado->carrera->jornada->nombre}}  </h5></label>
                  </div>
                </div><br>

                <div class="row">
                  <div class="col-md-12">
                    <table id="tabla-grado" class="display table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th style="width: 50%">Nombre del Alumno </th>
                          <th style="width: 15%">Monto pagado</th>
                          <th style="width: 15%">Estado</th>
                          <th style="width: 20%">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($alumnos as $alumno)
                        <tr>
                          <td>{{ $alumno->primer_apellido }} {{ $alumno->segundo_apellido }} {{ $alumno->primer_nombre }} {{ $alumno->segundo_nombre }} {{ $alumno->tercer_nombre }}</td>
                          <td>
                            @foreach ($pagos as $pago)
                              @if($pago->id_inscripcion == $alumno->id_inscripcion)
                                {{ $pago->monto }}
                              @endif
                            @endforeach
                          </td>
                          <td>
                            @php($a = 0)
                            @php($b = 0)
                            @php($faltante = 0)
                            @php($montoanterior = 0)
                            @foreach ($pagos as $pago)
                              @if($pago->id_inscripcion == $alumno->id_inscripcion)
                                @php ($a++)
                                @if($pago->monto == $cuota->cantidad)
                                  <span class="badge badge-success">Pagado</span>
                                @elseif($pago->monto < $cuota->cantidad)
                                  @php ($b++)
                                  @php ($faltante = $cuota->cantidad - $pago->monto)
                                  @php ($montoanterior = $pago->monto)
                                  <span class="badge badge-warning">Faltante</span>
                                @endif
                              @endif
                            @endforeach
                            @if($a == 0)
                              <span class="badge badge-secondary">Pendiente</span>
                            @endif
                          </td>
                          <td>
                            @if($a == 0)
                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#primaryModal-{{$alumno->id_inscripcion}}">
                                <i class="icon-check"></i>&nbsp;Registrar pago
                              </button>
                            @endif
                            @if($b != 0)
                              <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#warningModal-{{$alumno->id_inscripcion}}">
                                <i class="icon-check"></i>&nbsp;Modificar pago
                              </button>
                            @endif
                            
                            <!--<button type="submit" inscripcion="{{ $alumno->id_inscripcion }}" cuota="{{$cuota->id_cuota}}" class="btn btn-sm btn-primary payment">Pagar</button>-->
                          </td>
                        </tr>
                        @include('pagocuota.modificarpago')
                        @include('pagocuota.hacerpago')
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <a href="{{route('pagocuota.grados', $cuota->id_cuota )}}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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

      $(document).ready(function(){
        $('.payment').click(function(){
          var idInscripcion = $(this).attr("inscripcion");
          var idCuota = $(this).attr("cuota");
          //alert("Inscripcion: " + idInscripcion + "Cuota: " + idCuota);

          $.post('/pagocuota', { id_inscripcion: idInscripcion, id_cuota: idCuota, _token: $('input[name=_token]').val() }, function(data){
            console.log(data);
          });
        });
      });

      </script>

    @endpush
@endsection
