<!-- Sidebar Menu -->
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
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
          </li>
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