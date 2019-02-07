@extends ('layouts.admin')
@section ('contenido')

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Maestros</a></li>
      <li class="breadcrumb-item active">Detalles del maestro</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <strong>Detalles del Maestro</strong>
                <small></small>
              </div>
              <form class="">
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for=""><strong>Nombres:</strong></label><br>
                    <label for="">{{ $persona->nombres }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for=""><strong>Apellidos:</strong></label><br>
                    <label for="">{{ $persona->apellidos }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label for=""><strong>Estado civil:</strong></label><br>
                    <label for="">{{ $persona->estado_civil }}</label>
                  </div>

                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for=""><strong>Teléfono:</strong></label><br>
                    <label for="">{{ $persona->telefono }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for=""><strong>Teléfono alternativo:</strong></label><br>
                    <label for="">{{ $persona->telefono_dos }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for=""><strong>Celular:</strong></label><br>
                    <label for="">{{ $persona->celular }}</label>
                  </div>


                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for=""><strong>Dirección:</strong></label><br>
                    <label for="">{{ $persona->direccion }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <label for=""><strong>DPI:</strong></label><br>
                    <label for="">{{ $persona->dpi }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label for=""><strong>Fecha de nacimiento:</strong></label>
                    <input type="date" class="form-control" disabled value="{{ $persona->fechanacimiento }}">
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for=""><strong>Correo electrónico:</strong></label><br>
                    <label for="">{{ $persona->email }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for=""><strong>Nacionalidad:</strong></label><br>
                    <label for="">{{ $persona->nacionalidad }}</label>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for=""><strong>Profesión:</strong></label><br>
                    <label for="">{{ $persona->profesion }}</label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label for=""><strong>Foto:</strong></label><br>
                  </div>

                </div><br>
                <div class="row">
                  @if($persona->foto)
                  <div class="col-6 text-center">
                    <img width="150px" height="150px" src="/personas/fotos/{{$persona->foto}}" alt="">
                  </div>
                  @endif

                </div>
              </div>
              <div class="card-footer">
                <a href="{{ route('padre.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
