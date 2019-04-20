
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr> 
                <th>Razon Social</th>
                <th>RUC.</th>
                <th>Tel.</th> 
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $lista as $row){  ?>

            <tr class="odd gradeX">
                <td><?= $row->Empresa_razon?></td>
                <td><?= $row->Empresa_ruc?></td>
                <td><?= $row->Empresa_tel ? $row->Empresa_tel : "*****" ?></td> 
                <td>
                        <a onclick="load_page(14, 'GET', {empresa_id : <?= $row->Empresa_id?>} )" href="#"><i class="material-icons" style="font-size:20px;">mode_edit</i></a>
                </td>
                <td>
                        <a onclick="load_page(13, 'GET', {empresa_id : <?= $row->Empresa_id?>} )" href="#"><i class="material-icons" style="font-size:20px;">delete</i></a>
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