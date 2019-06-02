<div class="header"> 
          <h1 class="page-header" id="big-form-title">
                            Usuarios
          </h1>
						<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Usuarios</a></li>
					  <li class="active">Asignar permisos</li>
					</ol> 
									
</div>


<div id="page-inner">
<div class="card">
  <div class="card-action">
  Asignar permisos
   </div>
<div class="card-content">

  <div id="user-form" class="container m-0">
  </div>
 
<?php  echo form_open("user/permisos", array("name"=>"user-form","class"=>"col s12")  ) ;?>

   <div class="row">
      <div class="input-field col s4">
        <button class="waves-effect waves-light btn" type="button" onclick= "load_page( user.us_permisos_p, this, '#user-form')" >Guardar</button>
        </div>
        </div>


    <input type="hidden"  name="usuario_id"  value="<?=  $usuario_id  ?>"  ?>
    <div class="table-responsive" id="user-table">
    <?php
    include("list_permisos.php");
      ?>
     </div>

</form>

	<div class="clearBoth"></div>
  </div>
    </div>


    
    </div><!-- END PAGE INNER -->