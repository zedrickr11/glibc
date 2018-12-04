@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Ciclo</a></li>
      <li class="breadcrumb-item active">Editar</li>
      <!-- Breadcrumb Menu-->

    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">

            <div class="card">
              <div class="card-header">
                <strong>Ciclo</strong>
                <small>Form</small>
              </div>
              <form class="" action="{{ route('ciclo.update',$ciclo->id_ciclo) }}" method="post">
                {!!method_field('PUT')!!}
                  {!!csrf_field()!!}

                  <div class="card-body">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" name="nombre" value="{{ $ciclo->nombre }}">
                      {!!$errors->first('nombre','<span class=text-danger>:message</span>')!!}
                    </div>
                    <div class="form-group">
                      <label for="año">Año</label>
                      <input type="number" class="form-control" name="año" value="{{ $ciclo->año }}">
                      {!!$errors->first('año','<span class=text-danger>:message</span>')!!}
                    </div>
                    <div class="form-group">
                      <label for="fecha_inicio">Fecha de inicio</label>
                      <input type="date" class="form-control" name="fecha_inicio" value="{{ $ciclo->fecha_inicio }}" >
                      {!!$errors->first('fecha_inicio','<span class=text-danger>:message</span>')!!}
                    </div>
                    <div class="form-group">
                      <label for="fecha_fin">Fecha de finalización</label>
                      <input type="date" class="form-control" name="fecha_fin" value="{{ $ciclo->fecha_fin }}" >
                      {!!$errors->first('fecha_fin','<span class=text-danger>:message</span>')!!}
                    </div>
                    <div class="form-group">
                      <label for="condicion">Estado</label>
                      <select class="form-control" name="condicion">
                        @if ($ciclo->condicion==1)
                          <option value="1" selected>ACTIVO</option>
                          <option value="0" >INACTIVO</option>
                        @else
                          <option value="1" >ACTIVO</option>
                          <option value="0" selected>INACTIVO</option>
                        @endif
                      </select>
                      {!!$errors->first('condicion','<span class=error>:message</span>')!!}
                    </div>

                  </div>

              <div class="card-footer">
                <a href="{{ route('ciclo.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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
