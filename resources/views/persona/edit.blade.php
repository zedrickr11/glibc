@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Sección</a></li>
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
              <form class="" action="{{ route('persona.update',$persona->id_persona) }}" method="post" enctype="multipart/form-data">
                {!!method_field('PUT')!!}
                  {!!csrf_field()!!}

                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" name="nombres" value="{{ $persona->nombres }}">
                        {!!$errors->first('nombres','<span class=text-danger>:message</span>')!!}
                      </div>

                      <div class="form-group col-md-6">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" value="{{ $persona->apellidos }}">
                        {!!$errors->first('apellidos','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-md-6">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" value="{{ $persona->email }}">
                        {!!$errors->first('email','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-md-6">
                        <label for="fechanacimiento">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fechanacimiento" value="{{ $persona->fechanacimiento }}">
                        {!!$errors->first('fechanacimiento','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-md-4">
                        <label for="estado_civil">Estado civil</label>
                        <input type="text" class="form-control" name="estado_civil" value="{{ $persona->estado_civil }}">
                        {!!$errors->first('estado_civil','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-md-4">
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" class="form-control" name="nacionalidad" value="{{ $persona->nacionalidad }}">
                        {!!$errors->first('nacionalidad','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-md-4">
                        <label for="profesion">Profesión</label>
                        <input type="text" class="form-control" name="profesion" value="{{ $persona->profesion }}">
                        {!!$errors->first('profesion','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-md-4">
                        <label for="dpi">Documento de Identifiación</label>
                        <input type="text" class="form-control" name="dpi" value="{{ $persona->dpi }}">
                        {!!$errors->first('dpi','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-md-8">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion" value="{{ $persona->direccion }}">
                        {!!$errors->first('direccion','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-md-4">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" value="{{ $persona->telefono }}">
                        {!!$errors->first('telefono','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-md-4">
                        <label for="telefono_dos">Teléfono alternativo</label>
                        <input type="text" class="form-control" name="telefono_dos" value="{{ $persona->telefono_dos }}">
                        {!!$errors->first('telefono_dos','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-md-4">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" name="celular" value="{{ $persona->celular }}">
                        {!!$errors->first('celular','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-md-4">
                        <label for="foto">Foto</label>
                        @if($persona->foto)
                        <div class="col-6 text-center">
                          <img width="150px" height="150px" src="/personas/fotos/{{$persona->foto}}" alt="">
                        </div>
                        @endif
                        <input type="file" class="form-control" name="foto" >
                        {!!$errors->first('foto','<span class=text-danger>:message</span>')!!}
                      </div>
                    </div>
                  </div>

              <div class="card-footer">
                <a href="{{ route('persona.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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
