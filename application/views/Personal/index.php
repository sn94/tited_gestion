<div class="card">
                        <div class="card-action">
                            Agregar nuevo personal
                            <button class="waves-effect waves-light btn" onclick="load_page(24)"><i class="material-icons dp48">add</i></button>
                        
                        </div>
                        <div class="card-content">

     <div id="personal-form" class="container m-0">
    </div>


    <a  href="#" onclick="load_page(27)"><i class="material-icons dp48">replay</i></a>                
    
    <div class="table-responsive" id="personal-table">
    <?php
    include("list.php");
      ?>
     </div>


 
	<div class="clearBoth"></div>
  </div>
    </div>