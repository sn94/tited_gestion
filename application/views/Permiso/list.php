
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr> 
                <th>Permiso</th> 
                <th></th>
                <th></th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach( $lista as $row){  ?>

            <tr class="odd gradeX">
                <td><?= $row->Permiso_nombre?></td> 
                <td>
                        <a onclick="load_page( permisos.perm_edit_g, {permiso_id : <?= $row->Permiso_id?>} , '#permiso-form' )" href="#"><i class="material-icons" style="font-size:20px;">mode_edit</i></a>
                </td>
                <td>
                        <a onclick="load_page( permisos.perm_del,  { permiso_id : <?= $row->Permiso_id?>}, '#permiso-form', {alert:'Seguro que quiere borrar este permiso?' }  )" href="#"><i class="material-icons" style="font-size:20px;">delete</i></a>
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