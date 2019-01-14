@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Persona</a></li>
      <li class="breadcrumb-item active">Nuevo</li>
      <!-- Breadcrumb Menu-->

    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">

            <div class="card">
              <div class="card-header">
                <strong>Persona</strong>
                <small>Form</small>
              </div>
              <form class="" action="{{ route('persona.store') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}

              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Nombres...">
                    {!!$errors->first('nombres','<span class=text-danger>:message</span>')!!}
                  </div>

                  <div class="form-group col-md-6">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos...">
                    {!!$errors->first('apellidos','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" name="email" placeholder="Correo electrónico...">
                    {!!$errors->first('email','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="fechanacimiento">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fechanacimiento">
                    {!!$errors->first('fechanacimiento','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="estado_civil">Estado civil</label>
                    <input type="text" class="form-control" name="estado_civil" placeholder="Estado civil...">
                    {!!$errors->first('estado_civil','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="nacionalidad">Nacionalidad</label>
                    <input type="text" class="form-control" name="nacionalidad" placeholder="Nacionalidad...">
                    {!!$errors->first('nacionalidad','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="profesion">Profesión</label>
                    <input type="text" class="form-control" name="profesion" placeholder="Profesión...">
                    {!!$errors->first('profesion','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="dpi">Documento de Identifiación</label>
                    <input type="text" class="form-control" name="dpi" placeholder="Documento de Identifiación...">
                    {!!$errors->first('dpi','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-8">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Dirección...">
                    {!!$errors->first('direccion','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Teléfono...">
                    {!!$errors->first('telefono','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="telefono_dos">Teléfono alternativo</label>
                    <input type="text" class="form-control" name="telefono_dos" placeholder="Teléfono alternativo...">
                    {!!$errors->first('telefono_dos','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" name="celular" placeholder="Celular...">
                    {!!$errors->first('celular','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="form-group col-md-4">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" name="foto" placeholder="Celular...">
                    {!!$errors->first('foto','<span class=text-danger>:message</span>')!!}
                  </div>
                </div>




              </div>

              <div class="card-footer">
                <a href="{{ route('padre.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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
