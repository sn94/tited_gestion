<div class="header"> 
          <h1 class="page-header" id="big-form-title">
                          Veh&iacute;culos
          </h1>
						<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Adm. de referenciales</a></li>
					  <li class="active">Agregar un Veh&iacute;culo</li>
					</ol> 
									
</div>


<div id="page-inner">


<div class="card">
                        <div class="card-action">
                            Agregar un Veh&iacute;culo
                            <button class="waves-effect waves-light btn" onclick="load_page(20)"><i class="material-icons dp48">add</i></button>
                       
                        </div>
    <div class="card-content">
  

    <div id="vehiculo-form" class="container m-0">
    </div>

    <a  href="#" onclick="load_page(23)"><i class="material-icons dp48">replay</i></a>     
    
    <div class="table-responsive"   id="vehiculo-table">
    <?php include("list.php"); ?>
    </div>
    
	<div class="clearBoth"></div>
  </div>
    </div>


 

    
    </div><!-- END PAGE INNER -->