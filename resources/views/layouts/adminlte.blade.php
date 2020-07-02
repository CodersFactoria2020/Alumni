<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Alumni| Panel de Control</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/app.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">

      </li>
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>-->

    </ul>
    <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <!-- *********** Enlace para registrarse *********-->
                                <!--@if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif-->

                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right logoutpanel" aria-labelledby="navbarDropdown">




                                            @if (auth()->user()->roles[0]->name==="Admin")
                                                <a class="dropdown-item" href="{{ route('admin') }}">
                                                   Mi perfil
                                                </a>
                                            @endif

                                             <a class="dropdown-item" href="{{ route('home') }}">
                                                   Volver a Alumni
                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesion') }}
                                            </a>


                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                            @endguest
                        </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="http://www.factoriaf5.org/wp-content/uploads/2018/12/logo-ff5simplon-negativo-02-e1544704915542.png)" alt="Factoría F5" style="max-height: 30px" class="brand-image img-responsive elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Alumni</span>
    </a>

      <!-- Sidebar -->
      <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://avatars3.githubusercontent.com/u/61828943?s=460&v=4" style="max-height: 30px" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!--<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel de Control
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Dashboard Manager</p>
                </a>
              </li>
            </ul>
          </li>-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Empresa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('empresa.create')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Crear Empresa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('empresa.index')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Editar Empresa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('empresa.index')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Eliminar Empresa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('empresa.index')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Lista de Empresas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Eventos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('event.create')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Crear Evento</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('event.index')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Editar Evento</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('event.index')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Eliminar Evento</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('event.index')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Lista de Eventos</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Ofertas de Empleo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('jobOffers.index')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon" ></i>
                  <p>Crear Oferta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('jobOffers.index')}}"class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Editar Oferta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('jobOffers.index')}}"class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Eliminar Oferta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('jobOffers.index')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Lista de Ofertas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Proyectos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('projects.index')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Crear Proyecto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('projects.index')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Editar Proyecto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('projects.index')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Eliminar Proyecto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('projects.index')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Lista de Proyectos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-laptop-code"></i>
              <p>
                Pruebas Técnicas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Crear Prueba</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Editar Prueba</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Eliminar Prueba</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Lista de Pruebas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fas fa-microphone-alt"></i>
              <p>
                Foro
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  @yield('content')


  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.3
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>

<script src="./js/app.js"></script>

</body>
</html>
