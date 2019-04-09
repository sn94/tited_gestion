<div class="table-responsive">
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
                
                <?php  if( !$row->ciudad_readonly ){ ?>
                    <td>
                        <button class="btn-floating" onclick=""><i class="material-icons dp48">mode_edit</i></button>
                    </td>
                    <td>
                        <button class="btn-floating" onclick=""><i class="material-icons dp48">delete</i></button>
                    </td>

                <?php }else{ ?>
                    <td> </td>
                    <td> </td>
                <?php } ?>
                
                
            </tr>
            <?php  } ?>
        </tbody>
    </table>
</div>