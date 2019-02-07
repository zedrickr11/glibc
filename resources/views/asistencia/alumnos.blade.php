@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Grado</a></li>
      <li class="breadcrumb-item"><a href="#">Curso</a></li>
      <li class="breadcrumb-item">Tomar Asistencia</li>

      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Tomar asistencia - <strong>{{$curso->nombre}} {{$grado->nombre}} {{$grado->seccionAsignada->nombre}} {{$grado->carrera->jornada->nombre}}</strong>
                <span class="pull-right" ><strong>Fecha: &nbsp;{{ \Carbon\Carbon::now()->format('d-m-Y') }}</strong></span>
              </div>
              <div class="card-body">
                <div id="cu" cu="{{$curso->id_curso}}" ></div>
                <div id="gr" gr="{{$grado->id_grado}}" ></div>
                <div id="as" as="{{$asignacion_curso->id_asignacion_curso}}" ></div>
                <div class="row">
                  <div class="col-md-3 offset-md-9">
                    <label for="">Seleccionar todos: &nbsp;</label>
                    <label class="switch switch-icon switch-pill switch-primary">
                      <input id="marcarTodo" type="checkbox" class="switch-input" name="todos" >
                      <span class="switch-label" data-on="" data-off=""></span>
                      <span class="switch-handle"></span>
                    </label>
                  </div>
                </div>
                <form class="" action="{{ route('asistencia.store') }}" method="post">
                {!! csrf_field() !!}
                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="width: 40%;" >Alumno</th>
                      <th style="width: 40%;">Observaciones</th>
                      <th style="width: 20%;">Asistencia</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php($contador = 0)
                    @foreach ($alumnos as $alumno)
                    @php($contador++)
                    <tr class="asistencia">
                        <td>{{$contador}}</td>
                        <td>
                          {{ $alumno->primer_apellido }} {{ $alumno->segundo_apellido }} {{ $alumno->primer_nombre }} {{ $alumno->segundo_nombre }} {{ $alumno->tercer_nombre }} 
                          <input type="hidden" class="alumno" value="{{ $alumno->id_alumno }}" name="alumno">
                        </td>
                        <td>
                          <input type="text" class="form-control observacion" name="observacion" placeholder="Observacion...">
                        </td>
                        <td>
                        <!--<input type="checkbox" class="asistio" name="" >-->

                          <label class="switch switch-icon switch-pill switch-primary">
                            <input type="checkbox" class="switch-input asistio" name="asistio" >
                            <span class="switch-label" data-on="" data-off=""></span>
                            <span class="switch-handle"></span>
                          </label>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
                <button id="enviar" type="button" class="pull-right  btn btn-primary"> <span class="fa fa-dot-circle-o">&nbsp;Guardar</button>
                </form>
              </div>
              <div class="card-footer">
                <a href="{{route('asistencia.asistencias', [$curso->id_curso, $grado->id_grado])}}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
              </div>
            </div>
          </div>
          </div>
        </div>
    </div>
  
    @push ('scripts')
      <script type="text/javascript">
        $(document).ready(function() {

          $('#enviar').click(function(){
            var datos = [];
            var curso = $('#cu').attr("cu");
            var grado = $('#gr').attr("gr");
            var asignacion = $('#as').attr("as");

            $('.asistencia').each(function(){
              var alumno = "";
              var obs = "";
              var asis = "";

              alumno = $(this).find(".alumno").val();
              obs = $(this).find(".observacion").val();

              if($(this).find(".asistio").is(':checked')){
                asis = 1;
              }
              else{
                asis = 0;
              }
              
              datos.push({"alumno": alumno, "observacion": obs, "asistencia": asis });
            });
            
            $.post('/asistencia', { curso: curso, grado: grado, asignacion: asignacion, asistencias: datos, _token: $('input[name=_token]').val() }, function(data){
              if(data.success == true){
                $(location).attr('href', '/asistencia/' + data.curso + '/' + data.grado);
              }
              else{
                alert("Ocurrio un error al guardar");
              }
            });

          });

          $('#marcarTodo').change(function(){
            if($(this).is(':checked')){
              $('.asistencia input[type=checkbox]').prop('checked', true);
            } else {
              $('.asistencia input[type=checkbox]').prop('checked', false);
            }
          });
          
        });    
      </script>
    @endpush
@endsection
