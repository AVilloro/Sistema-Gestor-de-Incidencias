<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="76x76" href="/images/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/images/icono.ico">
    <title>
      IMS - Gestión de Incidencias
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="/css/panel/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/panel/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" type="text/css" href="/css/leftbar.css" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!--<link rel="stylesheet" href="//bootswatch.com/3/flatly/bootstrap.css">-->

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/fondo_edit.css') }}">
    @yield('styles')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a class="simple-text logo-normal">
        <img src="/images/logo.png" style="width: 90px; margin-left: 33%;">
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        @if (auth()->check())
      		<div class="panel-footer" align="center" style="background: transparent; border-color: transparent; margin-top: 20px;">
      				<div class="user-box">
      					<form action="{{ url('/profile/image') }}" id="avatarForm">
      						{{ csrf_field() }}
      						<input type="file" style="display: none" id="avatarInput">
      					</form>
      					<div class="wrap">
      						<div class="user-img">
      							@if(auth()->user()->image)
      								<img src="{{ asset('images/users/'.auth()->id().'.'.auth()->user()->image ) }}" alt="user-img" id="avatarImage" title="{{ auth()->user()->name }}" class="img-circle  img-responsive">
      							@else
      								<img src="{{ asset('images/users/0.jpg') }}" alt="user-img" id="avatarImage" title="{{ auth()->user()->name }}" class="img-circle img-responsive">
      							@endif
      						</div>
      						<div class="text_over_image" id="textToEdit">Editar</div>
      					</div>
      					<h5 style="color: white;">{{ auth()->user()->name }}</h5>
      				</div>
      		</div>
      	@endif
        <!-- test-->
        @if (auth()->check())
        <ul class="nav">
          <li @if(request()->is('home')) class="active" @endif>
            <a href="/home"><p>Inicio</p></a>

          </li>

          {{-- @if (! auth()->user()->is_client) --}}
          {{-- <li @if(request()->is('ver')) class="active" @endif> --}}
          {{-- <a href="/ver">Ver incidencias</a> --}}
          {{-- </li> --}}
          {{-- @endif --}}

          <li @if(request()->is('reportar')) class="active" @endif>
            <a href="/reportar"><p>Reportar incidencia</p></a>
          </li>

          @if (auth()->user()->is_admin)
          <li role="presentation" class="dropdown">
            <a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <p>Administración</p>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/usuarios" style="color: grey;">Usuarios</a></li>
              <li><a href="/proyectos" style="color: grey;">Proyectos</a></li>
            </ul>
          </li>
          @endif
        @else
          <li @if(request()->is('/')) class="active" @endif><a href="/">Bienvenido</a></li>
          <li @if(request()->is('instrucciones')) class="active" @endif><a href="/instrucciones">Instrucciones</a></li>
          <li @if(request()->is('acerca-de')) class="active" @endif><a href="/acerca-de">Créditos</a></li>
        </ul>
        @endif
        <!-- test -->

          <li>
            <a href="/instrucciones">
              <p>Instrucciones</p>
            </a>
          </li>
            <li>

              <a class="nav-link" href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  <p>Cerrar sesión</p>
              </a>

              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
        </ul>
      </div>
    </div>

    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="/home">Panel de administración</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="col-md-9">
            @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav>
            <ul>
              <li>
                <a href="/acerca-de" style="color: white;">
                  Quiénes somos
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright" style="color: white;">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Diseñado por
            <a href="" target="_blank">Alba Villoro Jordán</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="/js/panel/core/jquery.min.js"></script>
  <script src="/js/panel/core/popper.min.js"></script>
  <script src="/js/panel/core/bootstrap.min.js"></script>
  <script src="/js/panel/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="/js/panel/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="/js/panel/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/js/panel/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="/js/panel/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
    <!-- Scripts -->
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>


    <!-- Upload image profile -->
    <script type="text/javascript" src="{{ asset('js/image-profile.js') }}"></script>
    @yield('scripts')
</body>
</html>
