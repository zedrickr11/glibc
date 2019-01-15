@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Inscripción</a></li>
      <li class="breadcrumb-item active">Nueva</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <strong>Registrar Inscripción</strong>
                <small></small>
              </div>
              <form class="" action="{{ route('inscripcion.store') }}" method="post">
              {!! csrf_field() !!}
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-8 col-sm-8 col-md-10 col-lg-10">
                    <label for="id_alumno">Alumno</label>
                    <select name="id_alumno" class="form-control select2-single" id="id_alumno">
                      <option value="">Seleccione alumno: </option>
                      @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->id }}" {{ old('id_alumno') == $alumno->id ? 'selected': '' }}>{{ $alumno->primer_nombre }} {{ $alumno->segundo_nombre }} {{ $alumno->primer_apellido }} {{ $alumno->segundo_apellido }}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_alumno','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
                    <label for=""></label><br>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#largeModal">
                      <span class="fa fa-plus">&nbsp;Nuevo</span>
                    </button>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_ciclo">Ciclo escolar</label>
                    <select name="id_ciclo" class="form-control select2-single" id="id_ciclo">
                      <option value="">Seleccione Ciclo: </option>
                      @foreach($ciclos as $ciclo)
                        <option value="{{ $ciclo->id_ciclo }}">{{$ciclo->anio}}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_ciclo','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_grado">Grado</label>
                    <select name="id_grado" placeholder="Seleccione grado" class="form-control select2-single" id="id_grado">
                      <option value="">Seleccione grado:</option>
                    </select>
                    {!!$errors->first('id_grado','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_plan">Plan</label>
                    <select name="id_plan" class="form-control select2-single" id="id_plan">
                      <option value="">Seleccione plan: </option>
                      @foreach($planes as $plan)
                        <option value="{{ $plan->id }}" {{ old('id_plan') == $plan->id ? 'selected': '' }}>{{ $plan->nombre }}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_plan','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_persona">Persona encargada</label>
                    <select name="id_persona" class="form-control select2-single" id="id_persona">
                      <option value="">Seleccione encargado: </option>
                      @foreach($personas as $persona)
                        <option value="{{ $persona->id_persona }}" {{ old('id_persona') == $persona->id_persona ? 'selected': '' }}>{{ $persona->nombres }} {{ $persona->apellidos}}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_persona','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="pago_inscripcion">Pago inscripcion</label>
                    <input type="number" class="form-control" value="{{ old('pago_inscripcion') }}" name="pago_inscripcion">
                    {!!$errors->first('pago_inscripcion','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="cuota">Cuota Mensual</label>
                    <input type="number" class="form-control" value="{{ old('cuota') }}" name="cuota">
                    {!!$errors->first('cuota','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
              </div>
              <div class="card-footer">
                <a href="{{ route('inscripcion.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Guardar</button>
                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Cancelar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('inscripcion.alumno')
    @push ('scripts')
      <script type="text/javascript">
      $('#id_alumno').select2({
        theme: "bootstrap"
      });
      $('#id_grado').select2({
        theme: "bootstrap"
      });
      $('#id_plan').select2({
        theme: "bootstrap"
      });
      $('#id_persona').select2({
        theme: "bootstrap"
      });
      $('#id_persona_modal').select2({
        theme: "bootstrap",
        dropdownParent: $("#largeModal")
      });
      $('#id_ciclo').select2({
        theme: "bootstrap"
      });

      $("#id_ciclo").change(event => {
        $.get(`/grados/${event.target.value}`, function(response, state){
          //console.log(response);
          $("#id_grado").empty();
          response.forEach(element => {
            $("#id_grado").append(`<option value=${element.id_grado}> ${element.grado_nombre} ${element.seccion_nombre} ${element.jornada_nombre} </option>`);
          });
        });
      });
      </script>
    @endpush
@endsection
