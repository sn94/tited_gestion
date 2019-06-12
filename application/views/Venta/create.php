
<style type="text/css">
#toast-container {
  top: auto !important;
  right: auto !important;
  bottom: 10%;
  left:20%;
}
</style>



<div class="header"> 
          <h1 class="page-header" id="big-form-title">    Facturas </h1>
					<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Comprobantes</a></li>
					  <li class="active">Registrar comprobante de venta</li>
					</ol> 						
</div><!-- END header -->


<div id="page-inner">

<div class="card">
                        <div class="card-action">  Registra Factura </div>
                        <div class="card-content">
    

<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>



<div id="venta-form" class="container m-0">

<?php   echo form_open_multipart("venta/create", array("name"=>"venta-form","class"=>"col s12")  ) ;?>

<div class="row">
<!-- campos ocultos --> 
<input type='hidden' name='proyecto_id'  value='<?= $proyecto_id ? $proyecto_id : set_value('proyecto_id') ?>'  />
<input type="hidden" name="personal_id" value="<?= $this->session->userdata("personal_id") ?>"  >  


<!-- fecha --> 
<div class="input-field col s2"> <input name="venta_fecha"  value="<?= set_value('venta_fecha') ?>" type="text" id="venta_fecha" class="validate datepicker"><label for="venta_fecha"   >Fecha de factura:</label></div>
<!-- numero de factura-->
<div class="input-field col s2"> <input  name="venta_nro_fac"  value="<?= set_value('venta_nro_fac') ?>" type="text" class="validate"> <label for="venta_nro_fac">Nro. de Factura:</label></div>
<!-- tipo de venta-->
<div class="input-field col s2"><p><input name="venta_tipo"   type="radio"   id="r_cont" value="CO"><label for="r_cont"/>Contado</label></p><p><input name="venta_tipo"  type="radio" id="r_cred" value="CR"><label for="r_cred">Cr&eacute;dito</label></p></div>
<!-- total factura-->
<div class="input-field col s2"><input  name="venta_total"  value="<?= set_value('venta_total') ?>" type="text" class="validate"><label for="venta_total">Total:</label></div>
</div><!-- END row -->

 

<div class="row">
<!-- foto-->
<!-- foto-->
<div class="file-field input-field col s4">
      <div class="btn">
        <span>Foto</span> <input type="file"   name="venta_foto"   onchange="show_loaded_image( event , '#venta_foto')"> 
        </div>
      <div class="file-path-wrapper">  <input class="file-path validate" type="text">  </div>
</div>

<div  class="input-field col s6" id="venta_foto" style="max-height: 100px; max-width: 100px;"></div>
</div><!-- END row -->

<div class="row"><!-- boton de envio-->
<div class="input-field col s4"><button type="button"  onclick= "beforeSend(  this)" class="waves-effect waves-light btn" >Guardar</button></div>
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
  load_page( venta.v_add_p, context);
else{
  
var toastContent = $('<h1>Cargue una imagen</h1>');

Materialize.toast( toastContent, 2000);
} 

}

   $( function () {

 /*    //asignar fecha actual
    $("form[name=venta-form] input[name=venta_fecha_reg]").val( 
       new Date().getFullYear()+"-"+(new Date().getMonth()+1)+"-"+new Date().getDate() ) ;

 
       $("form[name=venta-form] input[name=venta_hora_reg]").val( 
        new Date().getHours()+":"+ new Date().getMinutes()+":"+ new Date().getSeconds()  ) ;
*/
    $('.datepicker').pickadate( setting_date ) ;

}); 
  
  
  </script>