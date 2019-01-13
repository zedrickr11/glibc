@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Carrera</a></li>
      <li class="breadcrumb-item active">Nuevo</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <strong>Carrera</strong>
                <small></small>
              </div>
              <form class="" action="{{ route('carrera.store') }}" method="post">
                {!! csrf_field() !!}
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Nombre...">
                  {!!$errors->first('nombre','<span class=text-danger>:message</span>')!!}
                </div>

                <fieldset class="form-group">
                  <label for="nivel">Jornada</label>
                  <select name="id_jornada" class="form-control select2-single" id="jornada">
                    <option disabled selected>Seleccione una jornada </option>
                    @foreach($jornada as $jor)
                      <option value="{{ $jor->id_jornada }}">{{ $jor->nombre }}</option>
                    @endforeach
                  </select>
                  {!!$errors->first('id_nivel','<span class=text-danger>:message</span>')!!}
                </fieldset>
              </div>
              <div class="card-footer">
                <a href="{{ route('carrera.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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
      $('#jornada').select2({
        theme: "bootstrap"
      });
      </script>

    @endpush
@endsection
