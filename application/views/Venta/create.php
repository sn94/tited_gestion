



<div class="header"> 
          <h1 class="page-header" id="big-form-title">    Servicios </h1>
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
<input type="hidden" name="venta_estado" value="C"> 
<input type="hidden" name="venta_fecha_reg" > 
<input type="hidden" name="venta_hora_reg" >


<!-- fecha --> 
<div class="input-field col s2"> <input name="venta_fecha"  value="<?= set_value('venta_fecha') ?>" type="text" id="venta_fecha" class="validate datepicker"><label for="venta_fecha"   >Fecha de factura:</label></div>
<!-- numero de factura-->
<div class="input-field col s2"> <input  name="venta_nro_fac"  value="<?= set_value('venta_nro_fac') ?>" type="text" class="validate"> <label for="venta_nro_fac">Nro. de Factura:</label></div>
<!-- tipo de venta-->
<div class="input-field col s2"><p><input name="venta_tipo"  checked="<?= set_value('venta_tipo')=='CO'? true: false ?>" type="radio" checked id="r_cont" value="CO"><label for="r_cont"/>Contado</label></p><p><input name="venta_tipo"  checked="<?= set_value('venta_tipo')=='CR'? true: false ?>"  type="radio" id="r_cred" value="CR"><label for="r_cred">Cr&eacute;dito</label></p></div>
<!-- total factura-->
<div class="input-field col s2"><input  name="venta_total"  value="<?= set_value('venta_total') ?>" type="text" class="validate"><label for="venta_total">Total:</label></div>
</div><!-- END row -->

 

<div class="row">
<!-- foto-->
<div class="input-field col s6"><input   name="venta_foto" type="file" class="validate"  onchange="show_loaded_image( event , '#venta_foto')"> </div><div  class="input-field col s6" id="venta_foto" style="max-height: 100px; max-width: 100px;"></div>
</div><!-- END row -->

<div class="row"><!-- boton de envio-->
<div class="input-field col s4"><button type="button"  onclick= "load_page(37, 'POST', this)" class="waves-effect waves-light btn" >Guardar</button></div>
</div><!-- END row     -->


<?php  echo form_close() ;?>

</div><!-- END ventaform -->

    
 
	<div class="clearBoth"></div>

  </div><!-- END CARD content -->

</div><!-- END CARD DIV -->

<footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>
</div><!-- END PAGE INNER -->






<script>
   $( function () {

     //asignar fecha actual
    $("form[name=venta-form] input[name=venta_fecha_reg]").val( 
       new Date().getFullYear()+"-"+(new Date().getMonth()+1)+"-"+new Date().getDate() ) ;

 
    $('.datepicker').pickadate( setting_date ) ;

}); 
  
  
  </script>