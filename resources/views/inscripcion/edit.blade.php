@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Inscripción</a></li>
      <li class="breadcrumb-item active">Editar</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <strong>Inscripción</strong>
                <small></small>
              </div>
              <form class="" action="{{ route('inscripcion.update',$inscripcion->id_inscripcion) }}" method="post">
                {!!method_field('PUT')!!}
                  {!!csrf_field()!!}
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_alumno">Alumno</label>
                    <select name="id_alumno" class="form-control" >
                      @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->id }}" {{ $inscripcion->id_alumno == $alumno->id ? 'selected': null }}>{{ $alumno->primer_nombre }} {{ $alumno->segundo_nombre }} {{ $alumno->primer_apellido }} {{ $alumno->segundo_apellido }}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_alumno','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_detalle">Grado</label>
                    <select name="id_detalle" class="form-control" >
                      @foreach($detalles as $detalle)
                        <option value="{{ $detalle->id }}" {{ $inscripcion->id_detalle == $detalle->id ? 'selected': null }}>{{$detalle->grado->nombre}} {{$detalle->jornada->nombre}} {{$detalle->ciclo->año}}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_detalle','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_plan">Plan</label>
                    <select name="id_plan" class="form-control" >
                      @foreach($planes as $plan)
                        <option value="{{ $plan->id }}" {{ $inscripcion->id_plan == $plan->id ? 'selected': null }}>{{ $plan->nombre }}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_plan','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_persona">Persona encargada</label>
                    <select name="id_persona" class="form-control">
                      @foreach($personas as $persona)
                        <option value="{{ $persona->id_persona }}" {{ $inscripcion->id_persona == $persona->id_persona ? 'selected': null }}>{{ $persona->nombres }}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_persona','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="cuota">Cuota</label>
                    <input type="number" class="form-control" name="cuota" value="{{ $inscripcion->cuota }}">
                    {!!$errors->first('cuota','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="condicion">Estado</label>
                    <select class="form-control" name="condicion">
                      @if ($inscripcion->condicion==1)
                        <option value="1" selected>ACTIVO</option>
                        <option value="0" >INACTIVO</option>
                      @else
                        <option value="1" >ACTIVO</option>
                        <option value="0" selected>INACTIVO</option>
                      @endif
                    </select>
                    {!!$errors->first('condicion','<span class=error>:message</span>')!!}
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
@endsection
