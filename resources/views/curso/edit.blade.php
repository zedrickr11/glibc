@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Curso</a></li>
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
              <form class="" action="{{ route('curso.update',$curso->id_curso) }}" method="post">
                {!!method_field('PUT')!!}
                {!!csrf_field()!!}
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="{{ $curso->nombre }}">
                  <span class="help-block">{{ $errors->first('nombre') }}</span>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" class="form-control" name="descripcion" value="{{ $curso->descripcion }}">
                  <span class="help-block">{{ $errors->first('descripcion') }}</span>
                </div>
                <div class="form-group">
                  <fieldset >
                    <label for="id_carrera">Carrera</label>
                    <select name="id_carrera" class="form-control select2-single" id="id_carrera">
                      @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}" {{ $curso->id_carrera == $carrera->id ? 'selected': null }}>{{ $carrera->nombre }} {{ $carrera->jornada->nombre }}</option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_carrera','<span class=text-danger>:message</span>')!!}
                  </fieldset>
                </div>
              </div>
              <div class="card-footer">
                <a href="{{ route('curso.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Guardar</button>
                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Cancelar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @push ('scripts')
      <script type="text/javascript">
      $('#id_carrera').select2({
        theme: "bootstrap"
      });
      </script>
    @endpush
@endsection
