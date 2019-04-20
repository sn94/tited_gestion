 
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
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable({
                    "sort": false
                });
            });
	</script> 