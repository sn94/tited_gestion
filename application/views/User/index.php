<div class="header"> 
          <h1 class="page-header" id="big-form-title">
                            Usuarios
          </h1>
						<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Usuarios</a></li>
					  <li class="active">Gestionar usuarios</li>
					</ol> 
									
</div>


<div id="page-inner">
<div class="card">
  <div class="card-action">
  Administrar usuarios 
  <button class="waves-effect waves-light btn" onclick="load_page(user.us_add_g, {},'#user-form')"><i class="material-icons dp48">add</i></button>
  </div>
<div class="card-content">

  <div id="user-form" class="container m-0">
  </div>

    <a  href="#" onclick="load_page(user.us_list, {}, '#user-table')"><i class="material-icons dp48">replay</i></a>                
    
    <div class="table-responsive" id="user-table">
    <?php
    include("list.php");
      ?>
     </div>

	<div class="clearBoth"></div>
  </div>
    </div>


    
    </div><!-- END PAGE INNER -->