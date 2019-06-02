
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr> 
                <th>Nick</th>
                <th>Personal vinc.</th> 
                <th></th>
                <th></th>
                <th>Permisos</th>
                <th>Estado</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach( $lista as $row){  ?>

            <tr class="odd gradeX">
                <td><?= $row->Usuario_nick?></td>
                <td><?= $row->Personal_nom." ".$row->Personal_ape?></td> 
                <td>
                        <a onclick="load_page( user.us_edit_g, {usuario_id : <?= $row->Usuario_id?>}, '#user-form')" href="#"><i class="material-icons" style="font-size:20px;">mode_edit</i></a>
                </td>
                <td>
                        <a onclick="load_page( user.us_del,  { usuario_id : <?= $row->Usuario_id?>}, '#user-form', {alert:'Seguro que quiere eliminar al usuario?' }  )" href="#"><i class="material-icons" style="font-size:20px;">delete</i></a>
                </td>

                <td>
                <a onclick="load_page( user.us_permisos,  { usuario_id : <?= $row->Usuario_id?>}  )" href="#"><i class="material-icons" style="font-size:20px;">settings</i></a>
                </td>

                <td>

                <?php if( $row->Usuario_estado == "A"){  ?>
                    <a onclick="load_page( user.us_off,  { usuario_id : <?= $row->Usuario_id?>}, '#user-form', {alert:'Seguro que quiere deshabilitar al usuario?' }  )" href="#">Deshabilitar</a>
                <?php } ?>

                <?php if( $row->Usuario_estado == "B"){  ?>
                    <a onclick="load_page( user.us_on,  { usuario_id : <?= $row->Usuario_id?>}, '#user-form', {alert:'Seguro que quiere habilitar al usuario?' }   )" href="#">Habilitar</a>
                <?php } ?>


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
            });
	</script> 