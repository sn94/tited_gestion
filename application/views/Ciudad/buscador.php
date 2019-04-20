<div id="dialog-form">
<table class="table table-striped table-bordered table-hover" id="dataTables-example2">
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
            </tr>
            <?php  } ?>
        </tbody>
    </table> 
</div>
<script>

                   
            $(document).ready(function () {




                $('#dataTables-example2').dataTable({
                    "sort": false
                });



               var dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: { 
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });





            });
	</script> 