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

       <!-- <table class="table t-width">
            <tr>
                <th>Empresa</th>
                <th>Descripcion</th>
            </tr>
            <tr>
                <td>FactoriaF5</td>
                <td>Super cool
                    <a href="#"><i class="fa fa-trash icons"></i></a>
                    <a href="#"><i class="fa fa-edit icons"> </i></a>
                </td>
            </tr>
        </table>-->
        <!-- *****************CARD CREATE************ -->
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
        </div>
        <br><br>
        <!-- SEARCH BAR -->
        <div class="input-group search">
            <input type="text" class="form-control" placeholder="Search..."/>
            <div class="input-group-append">
                <button class="btn btn-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <br><br>
        <!-- DROPDOWN -->
        <select required class="form-control selecttags" name="" id="">
            <option value="" hidden><span >Tags</span>  </option>
            <option value="">Tag1</option>
            <option value="">Tag2</option>
        </select>
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
        </div>
        <br>
        <!-- CHECKBOX -->
        <div>
            <label class="check">One
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
            </label>
        </div>
        <br>
        <!-- TAGS -->
        <div class="tag">
            <a href="">PHP </a>
        </div>
        <br>
        <div class="tag">
            <a href="">JAVA </a>
        </div>
        
    </div>
        
</body>
@endsection
