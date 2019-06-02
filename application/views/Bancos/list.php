

<div class="header"> 
          <h1 class="page-header" id="big-form-title">
                            Cuenta Bancaria
          </h1>
						<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Cuenta Bancaria</a></li>
					  <li class="active">B&uacute;squedas</li>
					</ol> 
									
</div>


<div id="page-inner">

<div class="card">
<div class="card-action">  Buscar transacciones  </div>
 <div class="card-content">
  
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Registrado por</th>
                <th>Observaciones</th>
                <th>Fecha de transac.</th>
                <th>(+)</th>
                <th>(-)</th> 
                <th>Saldo</th> 
            </tr>
        </thead>
        <tbody>
            <?php 
            $val_e=0;  $val_s= 0;$saldo= 0;

            foreach( $lista as $row){ 
                $val_e+=  $row->Cuenta_mov =="E"  ? (int)$row->Cuenta_monto : 0;
                $val_s+=  $row->Cuenta_mov =="S"  ? (int)$row->Cuenta_monto : 0;
                $saldo=  $val_e - $val_s; 
            ?>

            <tr class="odd gradeX">
                <td><?= $row->Personal_nom. " ".  $row->Personal_ape?></td>
                <td><?= $row->Cuenta_obs?></td>
                <td><?= $row->Cuenta_fecha?></td> 
                <td>  <?=  $row->Cuenta_mov =="E"  ? $row->Cuenta_monto : "*****" ?>   </td>
                <td> <?=  $row->Cuenta_mov =="S"  ? $row->Cuenta_monto : "*****" ?> </td> 
                <td>  <?=  $saldo ?> </td>
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