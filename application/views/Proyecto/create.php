
<div class="header"> 
          <h1 class="page-header" id="big-form-title">
                            Proyectos
          </h1>
						<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Proyectos</a></li>
					  <li class="active">Nuevo</li>
					</ol> 
									
</div>


<div id="page-inner">

<div class="card">
                        <div class="card-action">
                            Crear proyecto
                            <button class="waves-effect waves-light btn" onclick="load_page(proyecto.pro_add_g)"><i class="material-icons dp48">add</i></button>
                        
                         </div>
                        <div class="card-content">
    
    
    
  <div id="proyecto-form" class="container m-0">


    <?php  
    if(validation_errors()){ ?>
    <div class="text-danger">
    <?=validation_errors() ?>
    </div>
    <?php }  ?>

    <?php  echo form_open("proyecto/create", array("name"=>"proyecto-form","class"=>"col s12")  ) ;?>
    <?php include("form/no_populate.php"); ?>

    <div class="row">
      <div class="col s2">
          <button type="button" class="waves-effect waves-light btn" onclick= "load_page( proyecto.pro_add_p, this,'#proyecto-form')">Guardar</button>
      </div>
    </div>
  </form>
  </div>
    

	<div class="clearBoth"></div>

  </div>

</div><!-- END CAR DIV -->

<footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>
</div><!-- END PAGE INNER -->








  <?php include("itsjs.php"); ?>