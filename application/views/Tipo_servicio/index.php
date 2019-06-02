<div class="header"> 
          <h1 class="page-header" id="big-form-title">
                            Tipos de servicio
          </h1>
						<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Adm. de referenciales</a></li>
					  <li class="active">Agregar un servicio</li>
					</ol> 
									
</div>


<div id="page-inner">

<div class="card">
                        <div class="card-action">
                            Agregar un Servicio
                            <button class="waves-effect waves-light btn" onclick="load_page(tiposervicio.tiposer_add_g, {}, '#tiposer-form')"><i class="material-icons dp48">add</i></button>
                        </div>
    <div class="card-content">

    <div id="tiposer-form" class="container m-0">
    </div>


    <a  href="#" onclick="load_page(tiposervicio.tiposer_list, {}, '#tiposervicio-table')"><i class="material-icons dp48">replay</i></a>     
    
    <div class="table-responsive"   id="tiposervicio-table">
    <?php include("list.php"); ?>
    </div>
    
	<div class="clearBoth"></div>
  </div>
  </div></div><!-- END CARD -->


    </div><!-- END PAGE INNER -->