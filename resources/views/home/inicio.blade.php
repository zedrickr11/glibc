@extends ('layouts.admin')
@section ('contenido')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Colegio</li>
      <li class="breadcrumb-item"><a href="#">Inicio</a></li>

      <!-- Breadcrumb Menu-->

    </ol>
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-6 col-lg-3">
            <div class="social-box primary">
              <i class="fa fa-user-o"></i>
              <div class="chart-wrapper">
                <canvas id="social-box-chart-1" height="90"></canvas>
              </div>
              <ul>

                  <strong>75</strong>
                  <span>Alumnos</span>


              </ul>
            </div>
            <!--/.social-box-->
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="social-box facebook">
              <i class="fa fa-facebook"></i>
              <div class="chart-wrapper">
                <canvas id="social-box-chart-1" height="90"></canvas>
              </div>
              <ul>
                <li>
                  <strong>89k</strong>
                  <span>friends</span>
                </li>
                <li>
                  <strong>459</strong>
                  <span>feeds</span>
                </li>
              </ul>
            </div>
            <!--/.social-box-->
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="social-box facebook">
              <i class="fa fa-facebook"></i>
              <div class="chart-wrapper">
                <canvas id="social-box-chart-1" height="90"></canvas>
              </div>
              <ul>
                <li>
                  <strong>89k</strong>
                  <span>friends</span>
                </li>
                <li>
                  <strong>459</strong>
                  <span>feeds</span>
                </li>
              </ul>
            </div>
            <!--/.social-box-->
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="social-box facebook">
              <i class="fa fa-facebook"></i>
              <div class="chart-wrapper">
                <canvas id="social-box-chart-1" height="90"></canvas>
              </div>
              <ul>
                <li>
                  <strong>89k</strong>
                  <span>friends</span>
                </li>
                <li>
                  <strong>459</strong>
                  <span>feeds</span>
                </li>
              </ul>
            </div>
            <!--/.social-box-->
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <h4 class="card-title mb-0">Colegio Hispanoamericano Salcajá</h4>
                    <div class="small text-muted">{{date('d-m-Y')}}</div>
                  </div>

                </div>
                <hr class="mb-4">
                <div class="chart-wrapper" >
                  <img src="{{asset('vendors/img/logo.JPG')}}" alt=""  width="1000px" height="1000px">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
