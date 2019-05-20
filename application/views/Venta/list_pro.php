
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr> 
                <th>Fecha Reg.</th>
                <th>Autor</th>
                <th>Cliente</th> 
                <th>Tipo de servicio</th>
                <th>Estado</th>
                <th>Facturar</th>  
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
                     <a  onclick="load_page(37 , 'GET', {proyecto_id : <?= $row->Proyecto_id?>} )"  href="#"><i class="material-icons" style="font-size:20px;">settings</i></a> 
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