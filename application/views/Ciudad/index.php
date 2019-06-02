<div class="header"> 
          <h1 class="page-header" id="big-form-title">
                            Ciudades
          </h1>
						<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Adm. de referenciales</a></li>
					  <li class="active">Agregar una zona</li>
					</ol> 
									
</div>


<div id="page-inner">

<div class="card">
                        <div class="card-action">
                            Agregar una Zona
                            <button class="waves-effect waves-light btn" onclick="load_page(ciudad.ciudad_add_g , {}, '#ciudad-form')"><i class="material-icons dp48">add</i></button>
                        </div>
    <div class="card-content">

    <div id="ciudad-form" class="container m-0">
    </div>


    <a  href="#" onclick="load_page(  ciudad.ciudad_list, {}, '#ciudad-table')"><i class="material-icons dp48">replay</i></a>     
    
    <div class="table-responsive"   id="ciudad-table">
    <?php include("list.php"); ?>
    </div>
    
	<div class="clearBoth"></div>
  </div>
    </div>


 
    </div><!-- END PAGE INNER -->