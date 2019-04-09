<div class="card">
                        <div class="card-action">
                            Agregar una Zona
                            <button class="waves-effect waves-light btn" onclick="load_page(8)"><i class="material-icons dp48">add</i></button>
                        </div>
    <div class="card-content">

    <div id="ciudad-form" class="container">
    </div>


    <?php include("list.php"); ?>
	<div class="clearBoth"></div>
  </div>
    </div>


    <script src="assets/js/dataTables/jquery.dataTables.js" defer></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"defer></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>