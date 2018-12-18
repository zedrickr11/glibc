@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Cuota</a></li>
      <li class="breadcrumb-item active">Editar</li>
      <!-- Breadcrumb Menu-->

    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">

            <div class="card">
              <div class="card-header">
                <strong>Cuota</strong>
                <small></small>
              </div>
              <form class="" action="{{ route('cuota.update',$cuota->id_cuota) }}" method="post">
                {!!method_field('PUT')!!}
                  {!!csrf_field()!!}

                  <div class="card-body">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" name="nombre" value="{{ $cuota->nombre }}">
                      {!!$errors->first('nombre','<span class=text-danger>:message</span>')!!}
                    </div>
                    <div class="form-group">
                      <label for="cantidad">Cantidad</label>
                      <input type="number" min="0" step="0.01" class="form-control" name="cantidad" value="{{ $cuota->cantidad }}">
                      {!!$errors->first('cantidad','<span class=text-danger>:message</span>')!!}
                    </div>
                    <div class="form-group">
                      <label for="condicion">Estado</label>
                      <select class="form-control" name="condicion">
                        @if ($cuota->condicion==1)
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
                <a href="{{ route('cuota.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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
