
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr> 
                <th>C.I</th>
                <th>Nombre</th>
                <th>Apellido</th> 
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $lista as $row){  ?>

            <tr class="odd gradeX">
                <td><?= $row->Personal_ci?></td>
                <td><?= $row->Personal_nom ?></td>
                <td><?= $row->Personal_ape ?></td> 
                <td>
                        <a onclick="load_page(26, 'GET', {personal_id : <?= $row->Personal_id?>} )" href="#"><i class="material-icons" style="font-size:20px;">mode_edit</i></a>
                </td>
                <td>
                        <a onclick="load_page(25, 'GET', {personal_id : <?= $row->Personal_id?>} )" href="#"><i class="material-icons" style="font-size:20px;">delete</i></a>
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