@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Inscripción</a></li>
      <li class="breadcrumb-item active">Nuevo</li>
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
              <form class="" action="{{ route('inscripcion.store') }}" method="post">
              {!! csrf_field() !!}
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-8 col-sm-8 col-md-10 col-lg-10">
                    <label for="id_alumno">Alumno</label>
                    <select name="id_alumno" class="form-control">
                      <option value="">Seleccione alumno: </option>
                      @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->id }}">{{ $alumno->primer_nombre }} {{ $alumno->segundo_nombre }} {{ $alumno->primer_apellido }} {{ $alumno->segundo_apellido }}</option>
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
                    <label for="id_detalle">Detalles del Grado</label>
                    <select name="id_detalle" class="form-control">
                      <option value="">Seleccione grado: </option>
                      @foreach($detalles as $detalle)
                        <option value="{{ $detalle->id }}">{{$detalle->grado->nombre}} {{$detalle->jornada->nombre}} {{$detalle->ciclo->año}}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_detalle','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_plan">Plan</label>
                    <select name="id_plan" class="form-control">
                      <option value="">Seleccione plan: </option>
                      @foreach($planes as $plan)
                        <option value="{{ $plan->id }}">{{ $plan->nombre }}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_plan','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_persona">Persona encargada</label>
                    <select name="id_persona" class="form-control">
                      <option value="">Seleccione encargado: </option>
                      @foreach($personas as $persona)
                        <option value="{{ $persona->id_persona }}">{{ $persona->nombres }} {{ $persona->apellidos}}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_persona','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="cuota">Cuota</label>
                    <input type="number" class="form-control" name="cuota">
                    {!!$errors->first('cuota','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="condicion">Estado</label>
                    <select class="form-control" name="condicion">
                      <option value="1">ACTIVO</option>
                      <option value="0">INACTIVO</option>
                    </select>
                    {!!$errors->first('condicion','<span class=text-danger>:message</span>')!!}
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
@endsection
