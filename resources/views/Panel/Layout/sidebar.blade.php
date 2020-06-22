<!-- *******************HAY QUE CAMBIAR COLORES DE LA BARRA LATERAL***************** -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->


  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> <!-- *****FOTO DEL ADMIN****** -->
      </div>
      <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a> <!-- *******NOMBRE DEL ADMIN****** -->
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="{{route('user.index')}}" class="nav-link">
            <i class="fa fa-user"></i>
            <p>Users</p>
          </a>
        </li>

        <!-- ********** OPCIONAL *********** -->
        <!-- AQUI PODEIS PONER LO QUE QUERAIS QUE EL ADMIN CONTROLE/TENGA ACESO-->
        <li class="nav-item">
          <a href="{{route('profile.index')}}" class="nav-link">
            <i class="fa fa-address-card"></i>             
             <p>Profiles</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('role.index')}}" class="nav-link">
            <i class="fa fa-sitemap"></i>             
            <p>Roles</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('event.index')}}" class="nav-link">
            <i class="fa fa-calendar"></i>             
            <p>Events</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('profile.assistance')}}" class="nav-link">
            <i class="fa fa-address-book"></i>             
            <p>My Events</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link">
            <i class="fa fa-user-circle"></i>
            <p>My profile</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('/logout') }}" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
