<!DOCTYPE html>
<html>

  @includeIf('Panel.Layout.head')
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      @includeIf('Panel.Layout.header')

      @includeIf('Panel.Layout.sidebar')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard {{$user->roles[0]->name}}</h1>
            </div><!-- COLUMNA -->
          </div><!-- FILA -->
      </div><!-- /.container-fluid -->
    </div>

    @yield('content')


    @includeIf('Panel.Layout.footer')

    @include('Panel.Layout.javascript')
  </body>
</html>
