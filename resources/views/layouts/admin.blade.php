
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colegio Hispanoamericano Salcaja">
  <meta name="author" content="Glib Software">
  <meta name="keyword" content="">
  <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
  <title>Colegio Hispanoamericano</title>

  <!-- Icons -->
  <link href="{{asset('vendors/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/css/simple-line-icons.min.css')}}" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

  <!-- Styles required by this views -->
  <link href="{{asset('vendors/css/daterangepicker.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/css/gauge.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/css/toastr.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/css/select2.min.css')}}" rel="stylesheet">


</head>

<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'					- Fixed Header

// Brand options
1. '.brand-minimized'       - Minimized brand (Only symbol)

// Sidebar options
1. '.sidebar-fixed'					- Fixed Sidebar
2. '.sidebar-hidden'				- Hidden Sidebar
3. '.sidebar-off-canvas'		- Off Canvas Sidebar
4. '.sidebar-minimized'			- Minimized Sidebar (Only icons)
5. '.sidebar-compact'			  - Compact Sidebar

// Aside options
1. '.aside-menu-fixed'			- Fixed Aside Menu
2. '.aside-menu-hidden'			- Hidden Aside Menu
3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu

// Breadcrumb options
1. '.breadcrumb-fixed'			- Fixed Breadcrumb

// Footer options
1. '.footer-fixed'					- Fixed footer

-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img src="/personas/fotos/{{ auth()->user()->persona->foto }}" class="img-avatar" alt="{{ auth()->user()->persona->foto }}">
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>{{ auth()->user()->name }}</strong>
          </div>
      <div class="divider"></div>

          <a class="dropdown-item" href="/logout"><i class="fa fa-lock"></i> Cerrar Sesión</a>
        </div>
      </li>
    </ul>

  </header>
  <div class="app-body">
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}"><i class="icon-speedometer"></i>Escritorio</a>
          </li>
          <li class="divider"></li>
          <li class="nav-title">
            Colegio
          </li>
          @if (auth()->user()->hasRole(['admin']))
          <li class="nav-item">

              <a class="nav-link" href="{{ url('ciclo') }}"><i class="icon-puzzle"></i> Ciclo Escolar </a>


          </li>
        @endif
          <li class="nav-item">

              <a class="nav-link" href="{{ url('inscripcion') }}"><i class="icon-puzzle"></i> Inscripciones </a>


          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('alumno') }}"><i class="icon-puzzle"></i> Alumnos </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('persona') }}"><i class="icon-puzzle"></i> Profesores </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('padre') }}"><i class="icon-puzzle"></i> Padres o Encargados </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('notas') }}"><i class="icon-puzzle"></i> Notas </a>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Pagos</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('pagomensualidad') }}"><i class="fa fa-caret-right"></i> Mensualidades</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('cuota') }}"><i class="fa fa-caret-right"></i> Cuotas Especiales</a>
              </li>
            </ul>
          </li>

          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Configuración</a>
            <ul class="nav-dropdown-items">

              <li class="nav-item">
                <a class="nav-link" href="{{ url('grado') }}"><i class="fa fa-caret-right"></i> Grados </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('curso') }}"><i class="fa fa-caret-right"></i> Curso </a>
              </li>
              <li>
                <a class="nav-link" href="{{ url('carrera') }}"><i class="fa fa-caret-right"></i> Carreras </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('seccion') }}"><i class="fa fa-caret-right"></i> Sección </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('plan') }}"><i class="fa fa-caret-right"></i> Plan </a>
              </li>

              <li>
                <a class="nav-link" href="{{ url('jornada') }}"><i class="fa fa-caret-right"></i> Jornada </a>
              </li>
              <li>
                <a class="nav-link" href="{{ url('unidad') }}"><i class="fa fa-caret-right"></i> Unidad </a>
              </li>
              
              <li>
                <a class="nav-link" href="{{ url('mora') }}"><i class="fa fa-caret-right"></i> Mora </a>
              </li>
              <li>
                <a class="nav-link" href="{{ url('mensualidad') }}"><i class="fa fa-caret-right"></i> Mensualidad </a>
              </li>
            </ul>
          </li>


        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
    <!-- Main content -->
    <main class="main">

      @yield('contenido')
      <!-- /.conainer-fluid -->
    </main>

  </div>
  <footer class="app-footer">
    <span><a href="#">Hispanoamericano</a> © {{ date('Y') }} GlibSoftware.</span>
    <!--<span class="ml-auto">Creado por <a href="#">GlibSoftware</a></span>-->
  </footer>

  <!-- Bootstrap and necessary plugins -->
  <script src="{{asset('vendors/js/jquery.min.js')}}"></script>
  <script src="{{asset('vendors/js/popper.min.js')}}"></script>
  <script src="{{asset('vendors/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('vendors/js/pace.min.js')}}"></script>

  <!-- Prime main scripts -->

  <script src="{{asset('js/app.js')}}"></script>

  <!-- Plugins and scripts required by this views -->
  <script src="{{asset('vendors/js/toastr.min.js')}}"></script>
  <script src="{{asset('vendors/js/gauge.min.js')}}"></script>
  <script src="{{asset('vendors/js/moment.min.js')}}"></script>
  <script src="{{asset('vendors/js/daterangepicker.min.js')}}"></script>
  <script src="{{asset('vendors/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendors/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('vendors/js/select2.min.js')}}"></script>

  <!-- Custom scripts required by this view -->
  <script src="{{asset('js/views/main.js')}}"></script>

  @stack('scripts')

</body>
</html>
