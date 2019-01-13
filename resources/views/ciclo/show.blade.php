@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Ciclo Escolar</a></li>
      <li class="breadcrumb-item active">Resumen</li>
      <!-- Breadcrumb Menu-->

    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">

            <div class="card">
              <div class="card-header">
                <strong>Ciclo Escolar</strong>
                <small>Resumen</small>
              </div>


              <div class="card-body">
                <div class="row">
                  <div class="form-group col-lg-6">
                    <label for="nombre">Nombre del ciclo escolar</label><br>
                    <label for=""> <strong>{{ $ciclo->nombre }}</strong> </label>

                  </div>
                  <div class="form-group col-lg-6">
                    <label for="año">Año</label><br>
                    <label for=""> <strong>{{ $ciclo->anio }}</strong> </label>

                  </div>
                  <div class="form-group col-lg-6">
                    <label for="fecha_inicio">Fecha de inicio</label><br>
                    <label for=""> <strong>{{ $ciclo->fecha_inicio }}</strong> </label>
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="fecha_fin">Fecha de finalización</label><br>
                    <label for=""> <strong>{{ $ciclo->fecha_fin }}</strong> </label>

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
                          <div class="col-lg-12">
                            @foreach ($ciclo->carreras as $carrera)

                              <label for=""> <strong>{{ $carrera->nombre }}</strong> </label>
                              <br>

                            @endforeach
                          </div>



                          </div>
                      </div>
                    </div>
                  </div>
                </div>



              </div>
              <div class="card-footer">
                <a href="{{ route('ciclo.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>

              </div>
              </form>
            </div>

          </div>
        </div>
      </div>

    </div>
@endsection
