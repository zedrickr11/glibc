@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
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
                <i class="fa fa-align-justify"></i> Asignacion de cursos - <strong>{{$grado->nombre}} {{ $grado->seccionAsignada->nombre }} {{ $grado->carrera->jornada->nombre }}</strong>
                <div class="d-flex justify-content-end">
                  <button type="button" class=" btn btn-primary" data-toggle="modal" data-target="#primaryModal">
                    <i class="icon-check"></i>&nbsp;Asignar Curso
                  </button>&nbsp;
                  <button type="button" class=" btn btn-success" data-toggle="modal" data-target="#successModalCurso">
                    <span class="icon-plus">&nbsp;Registrar Curso
                  </button>
                </div>
              <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>Nombre del curso</th>
                      <th>Descripcion</th>
                      <th>Maestro</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cursos_asignados as $curso)
                    <tr>
                      <td>{{ $curso->nombre }}</td>
                      <td>{{ $curso->descripcion }}</td>
                      <td>
                        @foreach($personas as $persona)
                          @if($curso->pivot->id_persona == $persona->id_persona)
                            {{ $persona->nombres }} {{ $persona->apellidos }}
                          @endif
                        @endforeach
                      </td>
                      <td>
                        <button type="button" numero="{{ $curso->pivot->id_asignacion_curso }}" class="btn btn-warning btn-sm botonmodal" data-toggle="modal" data-target="#warningModal-{{$curso->pivot->id_asignacion_curso}}">
                          <span class="fa fa-pencil-square-o"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dangerModal-{{$curso->pivot->id_asignacion_curso}}">
                          <span class="fa fa-trash-o"></span>
                        </button>
                      </td>
                    </tr>
                    @include('grado.deleteasignacion')
                    @include('grado.editasignacion')
                    @endforeach
                  </tbody>
                </table>
                @include('grado.asignarcurso')
                @include('grado.addcurso')
              </div>
              <div class="card-footer">
                <a href="{{ route('grado.index') }}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-toggle-left"></i> Atrás</button></a>
              </div>
            </div>
          </div>
          </div>
        </div>
    </div>
    @push ('scripts')
      <script type="text/javascript">
      $('.botonmodal').click(function () {
        var StateName = $(this).attr("numero");
        $('#id_persona_editar-' + StateName).select2({
          theme: "bootstrap",
          dropdownParent: $("#warningModal-" + StateName)
        });
        $('#id_curso_editar-' + StateName).select2({
          theme: "bootstrap",
          dropdownParent: $("#warningModal-" + StateName)
        });
      });
      $('#id_persona_asignar').select2({
        theme: "bootstrap",
        dropdownParent: $("#primaryModal")
      });
      $('#id_curso_asignar').select2({
        theme: "bootstrap",
        dropdownParent: $("#primaryModal")
      });
      $('#id_carrera').select2({
        theme: "bootstrap",
        dropdownParent: $("#successModalCurso")
      });
      </script>
    @endpush
    <!-- /.conainer-fluid -->
@endsection
