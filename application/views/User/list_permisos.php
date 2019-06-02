
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr> 
                <th>Permiso</th> 
                <th></th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach( $lista as $row){  ?>

            <tr class="odd gradeX">
                <td><?= $row->Permiso_nombre?></td> 
                <td>
                    <p> 
                    <?php if( $row->acceid){  ?>
                        <input name="permiso_id[]"  id="permiso_id<?= $row->Permiso_id?>" checked type="checkbox" class="filled-in" value="<?= $row->Permiso_id  ?>"  />
                    <?php }else{ ?>
                        <input name="permiso_id[]"  id="permiso_id<?= $row->Permiso_id?>" type="checkbox" class="filled-in" value="<?= $row->Permiso_id  ?>"  />
                    <?php  } ?> 
                    
                    <label for="permiso_id<?= $row->Permiso_id?>">Marcar</label> 
                    </p>
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