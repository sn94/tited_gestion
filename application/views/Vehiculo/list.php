
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr> 
                <th>Chapa</th>
                <th>Marca,modelo</th>
                <th>A&ntilde;o</th> 
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $lista as $row){  ?>

            <tr class="odd gradeX">
                <td><?= $row->Vehiculo_chapa?></td>
                <td><?= $row->Vehiculo_marca.','.$row->Vehiculo_modelo ?></td>
                <td><?= $row->Vehiculo_anio ?></td> 
                <td>
                        <a onclick="load_page( vehiculo.vehiculo_edit_g, {vehiculo_id : <?= $row->Vehiculo_id?>}, '#vehiculo-form' )" href="#"><i class="material-icons" style="font-size:20px;">mode_edit</i></a>
                </td>
                <td>
                        <a onclick="load_page( vehiculo.vehiculo_del, {vehiculo_id : <?= $row->Vehiculo_id?>}, '#page-wrapper' , {alert:'Seguro que quiere borrarlo?' }   )" href="#"><i class="material-icons" style="font-size:20px;">delete</i></a>
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