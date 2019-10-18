<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TITED</title> 
	<link href="<?= base_url('assets/css/font_google.css')?>" rel="stylesheet">
	
	 <!-- Compiled and minified CSS 
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	-->
	 <!-- AUTOCOMPLETE-->
	 <link href="<?= base_url('assets/css/awesomplete.css')?>" rel="stylesheet" />
	 <link href="<?= base_url('assets/css/bootstrap-4/bootstrap.min.css')?>" rel="stylesheet" /> 

 

</head>

<body>
	


	
	<nav> 
		<div class="nav-wrapper">
			<a href="#" class="brand-logo">Logo</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
			  <li><a href="sass.html">Sass</a></li>
			  <li><a href="#" onclick="load_page( venta.v_index)">Nueva Factura-venta</a></li>
			  <li><a href="collapsible.html">JavaScript</a></li>
			</ul>
		  </div>
	</nav>
 
 


	<div id="page-wrapper">

	</div> <!-- /. WRAPPER  -->


    <!-- JS Scripts-->
	
		
		<script src="<?= base_url('assets/js/jquery-3.4.1.min.js')?>"></script>
    <!-- bootstrap-->
	<script src="<?= base_url('assets/js/bootstrap-4/bootstrap.min.js')?>"></script>
 <!-- AUTOCOMPLETE -->
 <script src="<?= base_url('assets/js/awesomplete.min.js')?>"></script>
    <!-- Custom Js -->
	<script src="<?= base_url('assets/js/tited_routes.js?v='. round(microtime(true) * 1000) )?>"></script>
	<script src="<?= base_url('assets/js/myjs.js?v='.round(microtime(true) * 1000))?>"></script> 
	 

</body>

</html>