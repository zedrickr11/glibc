@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">GlibColegio</li>
      <li class="breadcrumb-item"><a href="#">Curso</a></li>
      <li class="breadcrumb-item active">Index</li>
      <!-- Breadcrumb Menu-->

    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Curso
                <a href="curso/create"> <button type="button" class="btn btn-success"> Nuevo</button></a>

              </div>
              <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Curso</th>
                      <th>Descripción</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($curso as $cur)
                    <tr>
                      <td>{{ $cur->id_curso }}</td>
                      <td>{{ $cur->nombre }}</td>
                      <td>{{ $cur->descripcion }}</td>
                      <td>{{ $cur->condicion }}</td>

                      <td>

                        <a href="{{route('curso.edit',$cur->id_curso )}}">
                          <button type="button" class="btn btn-warning btn-sm" name="button">Editar</button>
                        </a>

                        <a href="{{route('curso.show',$cur->id_curso)}}">
                          <button type="button" class="btn btn-info btn-sm" name="button">Ver</button>
                        </a>
                   <form style="display: inline" method="POST" action="{{route('curso.destroy', $cur->id_curso )}}">
                   {!!method_field('DELETE')!!}
                   {!!csrf_field()!!}
                     <button type="submit" class="btn btn-danger btn-sm" name="button">Eliminar</button>
                   </form>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
          </div>

          </div>
        </div>

    </div>
    <!-- /.conainer-fluid -->
@endsection
