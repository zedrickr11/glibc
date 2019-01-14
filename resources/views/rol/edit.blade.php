@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Rol</a></li>
      <li class="breadcrumb-item active">Editar</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <strong>Rol</strong>
                <small></small>
              </div>
              <form class="" action="{{ route('rol.update',$rol->id_rol) }}" method="post">
                {!!method_field('PUT')!!}
                  {!!csrf_field()!!}
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" name="nombre" value="{{ $rol->nombre }}">
                      {!!$errors->first('nombre','<span class=text-danger>:message</span>')!!}
                    </div>
                    <div class="form-group">
                      <label for="descripcion">Descripción</label>
                      <input type="text" class="form-control" name="descripcion" value="{{ $rol->descripcion }}">
                      {!!$errors->first('descripcion','<span class=text-danger>:message</span>')!!}
                    </div>
                    <div class="form-group">
                      <label for="display_name">Nombre a mostrar</label>
                      <input type="text" class="form-control" name="display_name" value="{{ $rol->display_name }}">
                      {!!$errors->first('display_name','<span class=text-danger>:message</span>')!!}
                    </div>
                  </div>
              <div class="card-footer">
                <a href="{{ route('rol.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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
