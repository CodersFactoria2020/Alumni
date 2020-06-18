@extends('Dashboard.Layout.index')
@section('content')


<!--- ******HAY QUE CAMBIAR Y HARMONIZAR LOS COLORES****** -->
<!-- CONTENIDO DE LA PAGINA -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-grey">
                        <div class="inner">
                            @inject('events', 'App\Event')
                            <h3>{{$events->count()}}</h3>
                            <p>Events</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <a href="{{route('event.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>  
                    </div>

        </div>
    </section>
</div>
@endsection

