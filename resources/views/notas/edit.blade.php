@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Grado</a></li>
      <li class="breadcrumb-item active">Nuevo</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <strong>Nueva Actividad</strong>
                <small></small>
              </div>
              <form class="" action="{{ route('actividad.update',[$actividad->id_actividad,$grado,$curso]) }}" method="post">
                {!!method_field('PUT')!!}
              {!! csrf_field() !!}
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="nombre">Nombre*</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del grado..." value="{{ $actividad->nombre }}">
                    {!!$errors->first('nombre','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <input type="hidden" name="id_asignacion_curso" value="{{ $id_asignacion }}">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" placeholder="Ingrese una descripción..." value="{{ $actividad->descripcion }}">
                    {!!$errors->first('descripcion','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="valor_nota">Nota</label>
                    <input type="number" class="form-control" name="valor_nota" placeholder="Nota..." value="{{ $actividad->valor_nota }}">
                    {!!$errors->first('valor_nota','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="fecha">Fecha de entrega</label>
                    <input type="date" class="form-control" name="fecha" value="{{ $actividad->fecha }}" >
                    {!!$errors->first('fecha','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_tipo_actividad">Tipo de Actividad*</label>
                    <select name="id_tipo_actividad" class="form-control select2-single" id="id_persona">
                      <option value="">Seleccione: </option>
                      @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id_tipo_actividad }}">{{ $tipo->nombre }}</option>
                      @endforeach
                      @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id_tipo_actividad }}" {{ $actividad->id_tipo_actividad == $tipo->id_tipo_actividad ? 'selected': null }}>{{ $tipo->nombre }} </option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_tipo_actividad','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="id_unidad">Unidad*</label>
                    <select name="id_unidad" class="form-control select2-single" id="id_carrera">
                      <option value="">Seleccione unidad: </option>
                      @foreach($unidades as $unidad)
                        <option value="{{ $unidad->id_unidad }}" {{ $actividad->id_unidad == $unidad->id_unidad ? 'selected': null }}>{{ $unidad->nombre }} </option>
                      @endforeach
                    </select>
                    {!!$errors->first('id_unidad','<span class=text-danger>:message</span>')!!}
                  </div>
                </div><br>

              </div>
              <div class="card-footer">
                <a href="{{ route('notas.actividades',[$grado,$curso]) }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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
      $('#id_persona').select2({
        theme: "bootstrap"
      });
      $('#id_carrera').select2({
        theme: "bootstrap"
      });
      $('#id_seccion').select2({
        theme: "bootstrap"
      });
      </script>
    @endpush
@endsection
