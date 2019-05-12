

<div class="header"> 
          <h1 class="page-header" id="big-form-title">
                            Proyectos
          </h1>
						<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Proyectos</a></li>
					  <li class="active">Crear</li>
					</ol> 
									
</div>


<div id="page-inner">

<div class="card">
                        <div class="card-action">
                            Nuevo proyecto
                            <button class="waves-effect waves-light btn" onclick="load_page(28)"><i class="material-icons dp48">add</i></button>
                        
                        </div>
                        <div class="card-content">
    
    
    
    <div id="proyecto-form" class="container m-0">
    </div>
  

<a  href="#" onclick="load_page(31)"><i class="material-icons dp48">replay</i></a>                
    
    <div class="table-responsive" id="proyecto-table">
    <?php
    include("list.php");
      ?>
     </div>


	<div class="clearBoth"></div>

  </div>

</div><!-- END CAR DIV -->

<footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>
</div><!-- END PAGE INNER -->
