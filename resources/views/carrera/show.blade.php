@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Carrera</a></li>
      <li class="breadcrumb-item active">Ver</li>
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
              <form class="" >
              <div class="card-body">
                <div class="form-group">
                  <label for=""><strong>Nombre</strong></label><br>
                  <label for="">{{ $carrera->nombre }}</label>
                </div>
                <div class="form-group">
                  <label for="condicion"><strong>Estado</strong></label><br>
                  <label for="">
                    @if ($carrera->condicion==1)
                      ACTIVO
                    @else
                      INACTIVO
                    @endif
                  </label>
                </div>
                <div class="form-group">
                  <label for="nivel"><strong>Nivel</strong></label><br>
                  <label for="">
                    {{ $carrera->nivel->nombre }}
                  </label>
                </div>
              </div>
              <div class="card-footer">
                <a href="{{ route('carrera.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
