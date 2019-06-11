<div class="header"> 
          <h1 class="page-header" id="big-form-title">
                            Clientes
          </h1>
						<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Adm. de referenciales</a></li>
					  <li class="active">Agregar un cliente</li>
					</ol> 
									
</div>


<div id="page-inner">
<div class="card">
                        <div class="card-action">
                            Agregar nuevo cliente
                            <button class="waves-effect waves-light btn" onclick="load_page( cliente.cliente_add_g, {}, '#cliente-form')"><i class="material-icons dp48">add</i></button>
                        
                        </div>
                        <div class="card-content">
   

   
    <div id="cliente-form" class="container m-0">
    </div>


    <a  href="#" onclick="load_page(  cliente.cliente_list, {}, '#cliente-table')"><i class="material-icons dp48">replay</i></a>                
    
    <div class="table-responsive" id="cliente-table">
    <?php
    include("list.php");
      ?>
     </div>

	<div class="clearBoth"></div>
  </div>
    </div>


    
    </div><!-- END PAGE INNER -->