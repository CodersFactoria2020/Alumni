@extends('layouts.adminlte')

@section('content')

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-3 text-dark">Panel de Control</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>Empleo</h3>

                        <p>Empleo</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
                <div class="inner">
                    @inject('events', 'App\Event')
                    <h3>{{$events->count()}}</h3>
                    <p>Eventos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-calendar"></i>
                </div>
                <a href="{{route('event.index')}}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>Proyectos</h3>
                        <p>Proyectos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document"></i>
                    </div>
                    <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>Pruebas</h3>
                        <p>Pruebas Técnicas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-laptop"></i>
                    </div>
                    <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
    </div> 

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary">
              <div class="card card-outline box-profile ">
                    <div class="text-center pt-4">
                        <img class="profile-user-img img-fluid img-circle"
                            src="https://avatars3.githubusercontent.com/u/61828943?s=460&v=4"
                            alt="User profile picture" >
                    </div>

                    <h3 class="profile-username text-center">{{Auth::user()->name }}</h3>

                    <p class="text-muted text-center">
                        @isset (Auth::user()->roles[0]->name)
                            {{Auth::user()->roles[0]->name}}
                        @endisset
                    </p>

                    <!--<strong><i class="fas fa-book mr-1"></i>email</strong>-->

                    <p class="text-muted text-center">{{Auth::user()->email }}</p>

                    <hr>
                   
                    <a href="{{route('user.edit', Auth::user()->id)}}" class="btn btn-primary btn-block bg-orange"><b>Editar</b></a>
                    
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header bg-orange">
                <h3 class="card-title bg-orange">Perfile Usuario</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @isset(Auth::user()->profile->id)
                    <strong><i class="fas fa-book mr-1"></i>Nickname</strong>

                    <p class="text-muted">{{Auth::user()->profile->nickname}}</p>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Web</strong>

                    <p class="text-muted">{{Auth::user()->profile->web}}</p>

                    <strong><i class="fas fa-book mr-1"></i>Description</strong>

                    <p class="text-muted">{{Auth::user()->profile->aboutme}}</p>

                    <strong><i class="fas fa-book mr-1"></i>Social</strong>

                    <p class="text-muted">{{Auth::user()->profile->social}}</p>
                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                    <p class="text-muted">
                    <span class="tag tag-danger">UI Design</span>
                    <span class="tag tag-success">Coding</span>
                    <span class="tag tag-info">Javascript</span>
                    <span class="tag tag-warning">PHP</span>
                    <span class="tag tag-primary">Node.js</span>
                    </p>
                    <hr>
                    <strong><i class="fas fa-file-alt mr-1"></i> Notes</strong>

                    <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                @endisset
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills ">
                  <li class="nav-item"><a class="nav-link active bg-orange" href="#activity" data-toggle="tab">Actividad</a></li>
                  <li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Eventos</a></li>
                  <li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Empleo</a></li>
                  <li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Pruebas Técnicas</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Actualizar Perfil</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">

                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>  

</div> 



@endsection

