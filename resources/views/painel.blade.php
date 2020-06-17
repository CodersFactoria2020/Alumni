@extends('Panel.Layout.index')
@section('content')


<!--- ******HAY QUE CAMBIAR Y HARMONIZAR LOS COLORES****** -->
<!-- CONTENIDO DE LA PAGINA -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-grey">
                <div class="inner">
                    <h3>150</h3>
                    <p>Empresas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- FILA -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-grey">
                    <div class="inner">
                    <!-- ********CONTADOR DE USUARIOS********* OPCIONAL
                        @inject('users', 'App\User')
                    <h3>{{$users->count()}}</h3> -->
                    <h3>30</h3>
                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
            </div>  
        </div>
        <!-- FILA -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-grey">
                <div class="inner">
                <h3>150</h3>
                <p>Tags</p>
            </div>
            <div class="icon">
                <i class="fa fa-tags"></i>
            </div>
            <a href="#" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </section>
</div>
@endsection

