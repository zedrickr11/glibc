@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Mensualidad</a></li>
      <li class="breadcrumb-item active">Nuevo</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <strong>Mensualidad</strong>
                <small></small>
              </div>
              <form class="" action="{{ route('mensualidad.store') }}" method="post">
                {!! csrf_field() !!}
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Nombre...">
                  {!!$errors->first('nombre','<span class=text-danger>:message</span>')!!}
                </div>
                <div class="form-group">
                  <label for="dia_limite">Dia limite de pago</label>
                  <input type="number" min="0" step="0.01" class="form-control" name="dia_limite" placeholder="Dia limite de pago...">
                  {!!$errors->first('dia_limite','<span class=text-danger>:message</span>')!!}
                </div>
                <div class="form-group">
                  <label for="condicion">Estado</label>
                  <select class="form-control" name="condicion">
                    <option value="1">ACTIVO</option>
                    <option value="0">INACTIVO</option>
                  </select>
                  {!!$errors->first('condicion','<span class=text-danger>:message</span>')!!}
                </div>
              </div>
              <div class="card-footer">
                <a href="{{ route('mensualidad.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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
