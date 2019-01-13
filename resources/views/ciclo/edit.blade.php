@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Ciclo</a></li>
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
                <small></small>
              </div>
              <form class="" action="{{ route('ciclo.update',$ciclo->id_ciclo) }}" method="post">
                {!!method_field('PUT')!!}
                  {!!csrf_field()!!}
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="nombre">Nombre del ciclo escolar</label>
                        <input type="text" class="form-control" name="nombre" value="{{ $ciclo->nombre }}">
                        {!!$errors->first('nombre','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="anio">Año</label>
                        <input type="number" class="form-control" name="anio" value="{{ $ciclo->anio }}">
                        {!!$errors->first('anio','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="fecha_inicio">Fecha de inicio</label>
                        <input type="date" class="form-control" name="fecha_inicio" value="{{ $ciclo->fecha_inicio }}">
                        {!!$errors->first('fecha_inicio','<span class=text-danger>:message</span>')!!}
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="fecha_fin">Fecha de finalización</label>
                        <input type="date" class="form-control" name="fecha_fin" value="{{ $ciclo->fecha_fin }}" >
                        {!!$errors->first('fecha_fin','<span class=text-danger>:message</span>')!!}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="card  border-default">
                          <div class="card-header bg-default">
                            <h5>Carreras</h5>
                          </div>
                          <div class="card-body">
                            <div class="row">


                            @foreach ($carreras as $id=>$nombre)
                              <div class="col-lg-6">
                                  <label for=""> {{ $nombre }} </label>
                              </div>
                              <div class="col-lg-6">
                                <label class="switch switch-icon switch-pill switch-primary">
                                  <input
                                  {{ $ciclo->carreras->pluck('id')->contains($id) ? 'checked' : '' }}
                                  type="checkbox"
                                  value="{{ $id }}" 
                                  class="switch-input"
                                  name="id_carrera[]" >
                                  <span class="switch-label" data-on="" data-off=""></span>
                                  <span class="switch-handle"></span>
                                </label>
                              </div>


                            <br>
                            @endforeach
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>



                  </div>

              <div class="card-footer">
                <a href="{{ route('ciclo.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
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
