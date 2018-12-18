@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Grado</a></li>
      <li class="breadcrumb-item active">Editar</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <strong>Grado</strong>
                <small></small>
              </div>
              <form class="" action="{{ route('grado.update',$grado->id_grado) }}" method="post">
                {!!method_field('PUT')!!}
                  {!!csrf_field()!!}
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="nombre">Nombre*</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $grado->nombre }}">
                    {!!$errors->first('nombre','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" value="{{ $grado->descripcion }}">
                    {!!$errors->first('descripcion','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_persona">Maestro encargado</label>
                    <select name="id_persona" class="form-control">
                      <option value="">Seleccione maestro: </option>
                      @foreach($personas as $persona)
                        <option value="{{ $persona->id_persona }}" {{ $grado->id_persona == $persona->id_persona ? 'selected': null }}>{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_persona','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_ciclo">Ciclo escolar</label>
                    <select name="id_ciclo" class="form-control">
                      <option value="">Seleccione ciclo: </option>
                      @foreach($ciclos as $ciclo)
                        <option value="{{ $ciclo->id_ciclo }}" {{ $grado->id_ciclo == $ciclo->id_ciclo ? 'selected': null }}>{{ $ciclo->año }} </option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_ciclo','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_seccion">Seccion</label>
                    <select name="id_seccion" class="form-control">
                      <option value="">Seleccione seccion: </option>
                      @foreach($secciones as $seccion)
                        <option value="{{ $seccion->id }}" {{ $grado->id_seccion == $seccion->id ? 'selected': null }}>{{ $seccion->nombre }} </option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_seccion','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="condicion">Estado</label>
                    <select class="form-control" name="condicion">
                      @if ($grado->condicion==1)
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
                <a href="{{ route('grado.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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
