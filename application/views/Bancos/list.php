

<div class="header"> 
          <h1 class="page-header" id="big-form-title">
                            Cuenta Bancaria
          </h1>
						<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Cuenta Bancaria</a></li>
					  <li class="active">Transacciones</li>
					</ol> 
									
</div>


<div id="page-inner">

<div class="card">
                        <div class="card-action">
                            Registrar un movimiento 
                            <button class="waves-effect waves-light btn" onclick="load_page(42)"><i class="material-icons dp48">add</i></button>
                        
                        </div>
                        <div class="card-content">
  

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>id</th>
                <th>Ciudad</th>
                <th>Depart.</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $lista as $row){  ?>

            <tr class="odd gradeX">
                <td><?= $row->ciudad_id?></td>
                <td><?= $row->ciudad_nom?></td>
                <td><?= $row->departamento_nom?></td> 
                
                <?php  if( $row->ciudad_readonly!="1" ){ ?>
                    <td>
                        <a onclick="load_page(10, 'GET', {ciudad_id : <?= $row->ciudad_id?>} )" href="#"><i class="material-icons" style="font-size:20px;">mode_edit</i></a>
                        
                    </td>
                    <td>
                        <a onclick="load_page(9, 'GET', {ciudad_id : <?= $row->ciudad_id?>} )" href="#"><i class="material-icons" style="font-size:20px;">delete</i></a>
                    </td>

                <?php }else{ ?>
                    <td> </td>
                    <td> </td>
                <?php } ?>
                
                
            </tr>
            <?php  } ?>
        </tbody>
    </table> 



	<div class="clearBoth"></div>

  </div>

</div><!-- END CAR DIV -->

<footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>
</div><!-- END PAGE INNER -->



<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable({
                    "sort": false
                });
            });
	</script> 