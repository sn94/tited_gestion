
    <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Personales de la cuadrilla</h4>
      <div  id="lista-cuadrilla"></div>
    </div>
    <div class="modal-footer">
      <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat ">OK</a>
    </div>
  </div> 

    

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr> 
                <th>Fecha Reg.</th>
                <th>Autor</th>
                <th>Cliente</th> 
                <th>Tipo de servicio</th>
                <th>Estado</th>
                <th>Cuadrilla</th>
                <th>Galer&iacute;a</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
              
            <?php foreach( $lista as $row){  ?>

            <tr class="odd gradeX">
                <td><?= $row->Proyecto_fecha?></td>
                <td><?= $row->Personal_nom." ".$row->Personal_ape ?></td>
                <td><?= $row->Empresa_razon ?></td> 
                <td><?= $row->Tiposervicio_des ?></td> 
                <td><?= $row->Proyecto_estado  ?></td> 
                <td>      
                    <a  onclick="load_page(proyecto.pro_cuadrilla, {proyecto_id : <?= $row->Proyecto_id?>},'#lista-cuadrilla' )" class="modal-trigger" href="#modal1"><i class="material-icons" style="font-size:20px;">visibility</i></a> 
                    
                    <?php  if($row->Proyecto_estado !='CONCRETADO'){ ?> <a  onclick="load_page(proyecto.pro_cuad_g, {proyecto_id : <?= $row->Proyecto_id?>} )" href="#"><i class="material-icons" style="font-size:20px;">settings</i></a>   <?php } ?>
                </td> 
                 <td>
                    <a  href='/tited_gestion/galeria/list/<?=$row->Proyecto_id?>'><i class="material-icons" style="font-size:20px;">visibility</i></a> 
                    <?php  if($row->Proyecto_estado !='CONCRETADO'){ ?>  <a  onclick="load_page(proyecto.pro_gale_g, {proyecto_id : <?= $row->Proyecto_id?>} )" href="#"><i class="material-icons" style="font-size:20px;">settings</i></a>    <?php } ?>
                    </td>
                <td>
                    <?php  if($row->Proyecto_estado !='CONCRETADO'){ ?> <a onclick="load_page( proyecto.pro_edit_g, {proyecto_id : <?= $row->Proyecto_id?>} )" href="#"><i class="material-icons" style="font-size:20px;">mode_edit</i></a> <?php } ?>
                 </td>
                <td>
                    <?php  if($row->Proyecto_estado !='CONCRETADO'){ ?>  <a onclick="load_page(proyecto.pro_del, {proyecto_id : <?= $row->Proyecto_id?>}, '#list-project-msg', {alert:'Seguro que quiere anular este registro?'} )" href="#"><i class="material-icons" style="font-size:20px;">delete</i></a> <?php } ?>
                </td> 
            </tr>
            <?php  } ?>
        </tbody>
    </table>
 

<script>
 
            $(document).ready(function () {
                $('#dataTables-example').dataTable({
                    "sort": false
                });



                $('.modal').modal();


            });
	</script> 