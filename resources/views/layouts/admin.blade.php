<!--
 * GenesisUI - Bootstrap 4 Admin Template
 * @version v1.8.12
 * @link https://genesisui.com
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license https://genesisui.com/license.html
 -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Prime - Bootstrap 4 Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,jQuery,CSS,HTML,RWD,Dashboard,Vue,Vue.js,React,React.js">
  <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
  <title>GlibColegio</title>

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
    <ul class="nav navbar-nav d-md-down-none mr-auto">

    </ul>
  </header>
  <div class="app-body">
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="icon-speedometer"></i>Escritorio</a>
          </li>
          <li class="divider"></li>
          <li class="nav-title">
            Colegio
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Pagos</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('pagomensualidad') }}"><i class="icon-puzzle"></i> Pagos Mensualidades</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('mensualidad') }}"><i class="icon-puzzle"></i> Mensualidades</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('cuota') }}"><i class="icon-puzzle"></i> Cuotas</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Usuarios</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('rol') }}"><i class="icon-puzzle"></i> Roles</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Configuracion</a>
            <ul class="nav-dropdown-items">
              <li>
                <a class="nav-link" href="{{ url('inscripcion') }}"><i class="icon-speedometer"></i> Inscripciones </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('grado') }}"><i class="icon-notebook"></i> Grados </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('curso') }}"><i class="icon-notebook"></i> Curso </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('ciclo') }}"><i class="icon-notebook"></i> Ciclo Escolar </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('seccion') }}"><i class="icon-notebook"></i> Sección </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('plan') }}"><i class="icon-notebook"></i> Plan </a>
              </li>
              <li>
                <a class="nav-link" href="{{ url('nivel') }}"><i class="icon-speedometer"></i> Niveles </a>
              </li>
              <li>
                <a class="nav-link" href="{{ url('jornada') }}"><i class="icon-speedometer"></i> Jornada </a>
              </li>
              <li>
                <a class="nav-link" href="{{ url('unidad') }}"><i class="icon-speedometer"></i> Unidad </a>
              </li>
              <li>
                <a class="nav-link" href="{{ url('carrera') }}"><i class="icon-speedometer"></i> Carreras </a>
              </li>
              <li>
                <a class="nav-link" href="{{ url('alumno') }}"><i class="icon-speedometer"></i> Alumnos </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('tipo-actividad') }}"><i class="icon-notebook"></i> Tipo actividad </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('mora') }}"><i class="icon-notebook"></i> Mora </a>
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
    <span><a href="#">GlibColegio</a> © 2018 GlibSoftware.</span>
    <span class="ml-auto">Creado por <a href="#">GlibSoftware</a></span>
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
