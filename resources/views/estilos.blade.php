@extends('layouts.web')
@section('content')
<body>
    <div class="container">
        <div class="card-list">
            <h3>Empresa</h3>
            <p class="cancel">En esta seccion los/as coders podran añadir empresas en las que hayan trabajado. Mediante su
                su descripcion y pruebas técnicas ayudaran otros/as a elegir puestos de trabajo
            </p>
            <div class="butonbox">
                <input class="button-1" type="submit" value="Crear empresa">
            </div>
        </div>
        <br>

        <div class="card-empresa-xs">
            <div class="img-empresa"></div>
            <div class="card-central">
                <h5>Nombre de la Empresa</h5>
                <p>Descripcion resumida de la empresa</p>
                <div class="tag">
                    <a href="">PHP </a>
                </div>
            </div>
            <div class="card-info">
                <h5>Puntuacion</h5>
                <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
            </div>
        </div>
        <br>

        <div class="card-list">
            <h3>Oferta numero 1 <span class="small">created at 15-0-2020</span>
               <a href="#"><i class="fa fa-trash icons"></i></a>
               <a href="#"><i class="fa fa-edit icons"> </i></a>
            </h3>

            <div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias magni vel ut quos iusto eius quam
                culpa, id quidem deserunt corrupti quis obcaecati nam voluptas odio unde nemo delectus asperiores.</p>
            </div>

            <div class>
                <p><b>Location:</b>  123 Sloan Street, London<br>  <b>Job Position: </b> Junior Developer
                </p>
            </div>
        </div>
        <br>
        <!-- CARD CREATE -->
        <div class="card card-ce">
            <div>
                <h3>Crear Empresa</h3>
            </div>
            <br>
            <p class="cancel"><b>Añade una empresa en la que hayas trabajado y quieras<br>
                compartir con el resto de coders</b>
            </p>
            <br>
            <label for=""><b>Nombre</b></label>
            <input type="text" class="form-control input-ce">
            <br>
            <label for=""><b>Descripcion</b></label>
            <textarea class="form-control input-ce" name="" id="" cols="30" rows="3"></textarea>
            <div class="butonbox">
                <input class="button-1" type="submit" value="Crear">
            </div>
        </div> <!-- END CARD -->

        <br>

        <!-- SEARCH BAR -->
        <div class="input-group search">
            <input type="text" class="form-control" placeholder="Search..."/>
            <div class="input-group-append">
                <button class="btn btn-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
            </div>
        </div> <!-- END SEARCH BAR -->

        <br>
        <!-- DROPDOWN -->
        <select required class="form-control selecttags" name="" id="">
            <option value="" hidden><span >Tags</span>  </option>
            <option value="">Tag1</option>
            <option value="">Tag2</option>
        </select> <!-- END DROPDOWN -->

        <br>

        <!-- PAGINATION -->
        <div>
            <ul class="pagination">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a class="active" href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">»</a></li>
            </ul>
        </div> <!-- END PAGINATION -->

        <br>

        <!-- CHECKBOX -->
        <div>
            <label class="check">One
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
            </label>
        </div> <!-- END CHECKBOX -->

        <br>
        <!-- BUTTON --> 
        <div>
            <input class="button-1" type="submit" value="Holi">
        </div>
        
        <br>

        <!-- TAGS -->
        <div class="tag">
            <a href="">PHP </a>
        </div>
        <br>
        <div class="tag">
            <a href="">JAVA </a>
        </div> <!-- END TAGS -->

        <br>


        <!-- TABLE -->         
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Customer <b>Details</b></h2></div>
                            <div class="col-sm-4">
                                <div class="search-box">
                                <div class="input-group search">

                                    <input type="text" class="form-control" placeholder="Search..."/>
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre <i class="fa fa-sort"></i></th>
                                <th>Ubicacion</th>
                                <th>Ciudad <i class="fa fa-sort"></i></th>
                                <th>Pin Code</th>
                                <th>Pais <i class="fa fa-sort"></i></th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Thomas Hardy</td>
                                <td>89 Chiaroscuro Rd.</td>
                                <td>Portland</td>
                                <td>97219</td>
                                <td>USA</td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <a href="#" class="icons-table" title="" data-toggle="tooltip" data-original-title="View"><i class="fa fa-info"></i></a>
                                        </div>
                                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                                            <a href="#" class="icons-table" title="" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Third group">
                                            <a href="#" class="icons-table" title="" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Maria Anders</td>
                                <td>Obere Str. 57</td>
                                <td>Berlin</td>
                                <td>12209</td>
                                <td>Germany</td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <a href="#" class="icons-table" title="" data-toggle="tooltip" data-original-title="View"><i class="fa fa-info"></i></a>
                                        </div>
                                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                                            <a href="#" class="icons-table" title="" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Third group">
                                            <a href="#" class="icons-table" title="" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- END TABLE -->
    </div>    

</body>
@endsection
