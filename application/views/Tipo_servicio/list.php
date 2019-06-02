 
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>id</th>
                <th>Descripci&oacute;n</th> 
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $lista as $row){  ?>

            <tr class="odd gradeX">
                <td><?= $row->Tiposervicio_id?></td>
                <td><?= $row->Tiposervicio_des?></td> 
                <td>
                    <a onclick="load_page( tiposervicio.tiposer_edit_g, {Tiposervicio_id : <?= $row->Tiposervicio_id?>},'#tiposer-form' )" href="#"><i class="material-icons" style="font-size:20px;">mode_edit</i></a>
                        
                </td>
                <td>
                    <a onclick="load_page( tiposervicio.tiposer_del,  {Tiposervicio_id : <?= $row->Tiposervicio_id?>}, '#page-wrapper', {alert:'Seguro que quiere borrarlo?'} )" href="#"><i class="material-icons" style="font-size:20px;">delete</i></a>
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