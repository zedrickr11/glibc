@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Grado</a></li>
      <li class="breadcrumb-item active">Cursos</li>
      <!-- Breadcrumb Menu-->
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Listado de los cursos asignados - {{$grado->nombre}}
                <button type="button" class="pull-right btn btn-primary" data-toggle="modal" data-target="#primaryModal-{{$grado->id_grado}}">
                  <span class="fa fa-plus"> Asignar Curso
                </button>
              </div>
              <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Maestro guia</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($grado->cursos as $curso)
                    <tr>
                      <td>{{ $curso->nombre }}</td>
                      <td>{{ $curso->descripcion }}</td>
                      <td></td>
                      <td>
                        @if($curso->condicion)
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dangerModal-{{$curso->id_curso}}">
                          <span class="fa fa-trash-o"></span>
                        </button>
                        @else
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#successModal-{{$curso->id_curso}}">
                          <span class="icon-check"></span>
                        </button>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @include('grado.asignacion')
              </div>
            </div>
          </div>
          </div>
        </div>
    </div>
    <!-- /.conainer-fluid -->
@endsection
