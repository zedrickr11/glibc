@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
      <li class="breadcrumb-item active">Editar</li>
      <!-- Breadcrumb Menu-->

    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">

            <div class="card">
              <div class="card-header">
                <strong>Usuarios</strong>
                <small>Form</small>
              </div>
              <form class="" action="{{route('usuarios.update',$usuario->id)}}" method="post" enctype="multipart/form-data">
                {!!method_field('PUT')!!}
                  {!!csrf_field()!!}

                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-4">

                          <label for="name">Usuario</label>
                          <input readonly type="text" class="form-control" name="name" value="{{$usuario->name}}">
                          {!!$errors->first('name','<span class=text-danger>:message</span>')!!}


                      </div>
                      <div class="form-group col-md-4">

                        <label for="email">Email</label>
                        <input readonly  type="email" class="form-control" name="email" value="{{$usuario->email}}">
                        {!!$errors->first('email','<span class=text-danger>:message</span>')!!}


                      </div>
                      <div class="form-group col-md-4">

                        <label for="password">Contraseña</label>
                        <input required type="password" class="form-control" name="password" value="{{$usuario->password}}">
                        {!!$errors->first('password','<span class=text-danger>:message</span>')!!}


                      </div>

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
