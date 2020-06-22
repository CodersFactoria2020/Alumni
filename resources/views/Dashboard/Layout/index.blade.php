<!DOCTYPE html>
<html>

  @includeIf('Panel.Layout.head')
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      @includeIf('Dashboard.Layout.header')

      @includeIf('Dashboard.Layout.sidebar')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Profile Dashboard</h1>
            </div><!-- COLUMNA -->
          </div><!-- FILA -->
      </div><!-- /.container-fluid -->
    </div>

    @yield('content')


    @includeIf('Dashboard.Layout.footer')

    @include('Dashboard.Layout.javascript')
  </body>
</html>