@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Portal</a></li>
      <li class="breadcrumb-item active">Unidades</li>
      <!-- Breadcrumb Menu-->

    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="offset-md-1">

          </div>
          <div class="col-md-2 col-sm-4">
            <div class="card">
              <div class="card-body text-center">
                <div class="text-muted small text-uppercase font-weight-bold">PRIMERA UNIDAD</div>
                <div class="h2 py-3"> <a href="{{route('portalpadres.notas',[$idAlumno,$id,1])}}"> <span class="fa fa-eye"></span> </a> </div>
                <div class="chart-wrapper">
                  <canvas id="chart-1" class="chart chart-bar" height="40" width="80"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-4">
            <div class="card">
              <div class="card-body text-center">
                <div class="text-muted small text-uppercase font-weight-bold">SEGUNDA UNIDAD</div>
                <div class="h2 py-3"> <a href="{{route('portalpadres.notas',[$idAlumno,$id,2])}}"> <span class="fa fa-eye"></span> </a></div>
                <div class="chart-wrapper">
                  <canvas id="chart-2" class="chart chart-bar" height="40" width="80"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-4">
            <div class="card">
              <div class="card-body text-center">
                <div class="text-muted small text-uppercase font-weight-bold">TERCERA UNIDAD</div>
                <div class="h2 py-3"> <a href="{{route('portalpadres.notas',[$idAlumno,$id,3])}}"> <span class="fa fa-eye"></span> </a></div>
                <div class="chart-wrapper">
                  <canvas id="chart-3" class="chart chart-bar" height="40" width="80"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-4">
            <div class="card">
              <div class="card-body text-center">
                <div class="text-muted small text-uppercase font-weight-bold">CUARTA UNIDAD</div>
                <div class="h2 py-3"> <a href="{{route('portalpadres.notas',[$idAlumno,$id,4])}}"> <span class="fa fa-eye"></span> </a></div>
                <div class="chart-wrapper">
                  <canvas id="chart-4" class="chart chart-bar" height="40" width="80"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-4">
            <div class="card">
              <div class="card-body text-center">
                <div class="text-muted small text-uppercase font-weight-bold">QUINTA UNIDAD</div>
                <div class="h2 py-3"> <a href="{{route('portalpadres.notas',[$idAlumno,$id,5])}}"> <span class="fa fa-eye"></span> </a></div>
                <div class="chart-wrapper">
                  <canvas id="chart-5" class="chart chart-bar" height="40" width="80"></canvas>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
    </div>
@push('scripts')
  <!-- Custom scripts required by this view -->
  <script src="{{asset('js/views/widgets.js')}}"></script>
@endpush
@endsection
