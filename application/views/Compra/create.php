
<style type="text/css">
#toast-container {
  top: auto !important;
  right: auto !important;
  bottom: 10%;
  left:20%;
}
</style>


<div class="header"> 
          <h1 class="page-header" id="big-form-title">    Gastos varios </h1>
					<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Comprobantes</a></li>
					  <li class="active">Registrar comprobante de compra</li>
					</ol> 						
</div><!-- END header -->


<div id="page-inner">

<div class="card">
                        <div class="card-action">  Registra Factura-compra </div>
                        <div class="card-content">
    

<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>



<div id="compra-form" class="container m-0">

<?php   echo form_open_multipart("compra/create", array("name"=>"compra-form","class"=>"col s12")  ) ;?>

<div class="row">
<!-- campos ocultos -->   
<input type="hidden" name="compra_fecha_reg" > 
<input type="hidden" name="compra_hora_reg" >


<!-- fecha --> 
<div class="input-field col s2"> <input name="compra_fecha"  value="<?= set_value('compra_fecha') ?>" type="text" id="venta_fecha" class="validate datepicker"><label for="compra_fecha"   >Fecha de factura:</label></div>
<!-- numero de factura-->
<div class="input-field col s2"> <input  name="compra_nro_fac"  value="<?= set_value('compra_nro_fac') ?>" type="text" class="validate"> <label for="compra_nro_fac">Nro. de Factura:</label></div>
<!-- tipo de venta-->
<div class="input-field col s2"><p><input name="compra_tipo"  type="radio" id="r_cont" value="CO"><label for="r_cont"/>Contado</label></p><p><input name="venta_tipo"  type="radio" id="r_cred" value="CR"><label for="r_cred">Cr&eacute;dito</label></p></div>
<!-- total factura-->
<div class="input-field col s2"><input  name="compra_total"  value="<?= set_value('compra_total') ?>" type="text" class="validate"><label for="compra_total">Total:</label></div>
</div><!-- END row -->

 

<div class="row">
<!-- foto-->
<div class="file-field input-field col s4">
      <div class="btn">
        <span>Foto</span>
        <input type="file"  name="compra_foto"  onchange="show_loaded_image( event , '#compra_foto')">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
  
<div  class="input-field col s6" id="compra_foto" style="max-height: 200px; max-width: 200px;"></div>
</div><!-- END row -->

<div class="row"><!-- boton de envio-->
<div class="input-field col s4"><button type="button"  onclick= "beforeSend( this) " class="waves-effect waves-light btn" >Guardar</button></div>
</div><!-- END row     -->


<?php  echo form_close() ;?>

</div><!-- END ventaform -->

    
 
	<div class="clearBoth"></div>

  </div><!-- END CARD content -->

</div><!-- END CARD DIV -->

<footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>
</div><!-- END PAGE INNER -->






<script>


 //asegurar la carga de la foto
 function beforeSend(  context){

  if(  $( $(context).prop("form") ).find("input[type=file]").val()   )
    load_page( compra.c_add_p, context, "#compra-form");
  else{
    
  var toastContent = $('<h1>Cargue una imagen</h1>');
  
  Materialize.toast( toastContent, 2000);
  } 

}



   $( function () {

     //asignar fecha actual
    $("form[name=compra-form] input[name=compra_fecha_reg]").val( 
       new Date().getFullYear()+"-"+(new Date().getMonth()+1)+"-"+new Date().getDate() ) ;

       $("form[name=compra-form] input[name=compra_hora_reg]").val( 
        new Date().getHours()+":"+ new Date().getMinutes()+":"+ new Date().getSeconds()  ) ;
 
    $('.datepicker').pickadate( setting_date ) ;

}); 
  
  
  </script>