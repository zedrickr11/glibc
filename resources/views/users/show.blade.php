@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Roles</a></li>
      <li class="breadcrumb-item active">Nuevo</li>
      <!-- Breadcrumb Menu-->

    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">

            <div class="card">
              <div class="card-header">
                <strong>Roles</strong>
                <small>Form</small>
              </div>
              <form class="" action="{{route('usuarios.role')}}" method="post">
                {!! csrf_field() !!}
                  <input  type="hidden" class="form-control" name="user_id" value="{{$usuario->id}}">
              <div class="card-body">
                <div class="form-group">
                  <label for="id_persona">Persona encargada</label>
                  <select name="role_id" class="form-control select2-single" id="select-busqueda">
                    <option value="">Seleccione un rol: </option>
                    @foreach($role as $rol)
                      <option value="{{$rol->id}}">{{$rol->display_name}}</option>
                       @endforeach
                  </select>
                  {!!$errors->first('role_id','<span class=text-danger>:message</span>')!!}
                </div>


              </div>
              <div class="card-footer">
                <a href="{{ route('usuarios.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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
