<div class="card">
                        <div class="card-action">
                            Agregar nuevo cliente
                            <button class="waves-effect waves-light btn" onclick="load_page(12)"><i class="material-icons dp48">add</i></button>
                        
                        </div>
                        <div class="card-content">
   

   
    <div id="cliente-form" class="container m-0">
    </div>


    <a  href="#" onclick="load_page(15)"><i class="material-icons dp48">replay</i></a>                
    
    <div class="table-responsive" id="cliente-table">
    <?php
    include("list.php");
      ?>
     </div>

	<div class="clearBoth"></div>
  </div>
    </div>