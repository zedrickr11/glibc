@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Archivo</a></li>
      <li class="breadcrumb-item active">Editar</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <strong>Curso</strong>
                <small>Form</small>
              </div>
              <form class="" action="{{ route('archivo.update',$archivo->id_archivo) }}" method="post" enctype="multipart/form-data">
                {!!method_field('PUT')!!}
                {!!csrf_field()!!}
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="{{ $archivo->nombre }}">
                  {!!$errors->first('nombre','<span class=text-danger>:message</span>')!!}
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Archivo a subir</label><br>
                    <input type="file" name="archivo">
                    {!!$errors->first('archivo','<span class=text-danger>:message</span>')!!}
                  </div>
                  <div class="col-md-6">
                      <label for="">Archivo Existente: </label><br>
                      <a href="{{route('archivo.downloadArchivo',$archivo->id_archivo )}}">
                        <button type="button" class="btn btn-primary btn-sm" name="button"><span class="icon-arrow-down"></span>&nbsp;Descargar Archivo</button>
                      </a>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <a href="{{ route('archivo.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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
