

<div class="header"> 
          <h1 class="page-header" id="big-form-title">
                           Caja chica
          </h1>
						<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Caja chica</a></li>
					  <li class="active">Transacciones</li>
					</ol> 
									
</div>


<div id="page-inner">

<div class="card">
  <div class="card-action">Registrar un movimiento 
  <button class="waves-effect waves-light btn" onclick="load_page( cajachi.caja_add_g )"><i class="material-icons dp48">add</i></button>

</div>
 <div class="card-content">
    
    <div id="caja-chica-form" class="container m-0"> 
      <?php  
      if(validation_errors()){ ?>
      <div class="text-danger">
      <?=validation_errors() ?>
      </div>
      <?php }  ?>

    <?php  echo form_open("caja_chica/create", array("name"=>"caja-chica-form","class"=>"col s12")  ) ;?>

      <div class="row">

        <input name="personal_id" type="hidden" value="2"><input name="Caja_fecha_reg" type="hidden"  value="<?= set_value('Caja_fecha_reg') ?>" >  <input type="hidden" name="Caja_hora_reg" value="<?= set_value('Caja_hora_reg') ?>" >

        <div class="input-field col s2"> <input name="Caja_fecha" type="text" class="validate datepicker" value="<?= set_value('Caja_fecha') ?>" ><label for="Caja_fecha"  >Fecha de transacci&oacute;n</label></div>
        <!-- tipo de venta-->
        <div class="input-field col s2"><p><input name="Caja_mov"   type="radio"   id="r_cont" value="E" checked><label for="r_cont"/>Entrada</label></p><p><input name="Caja_mov"  type="radio" id="r_cred" value="S"><label for="r_cred">Salida</label></p></div>
          
        <div class="input-field col s2"> <input name="Caja_monto" type="text" class="validate" value="<?= set_value('Caja_monto') ?>"><label for="Cuenta_monto"   >Monto</label></div>
      
      </div><!-- end row-->

      <div class="row">  <div class="input-field col s3"><input name="Caja_obs" type="text" class="validate" value="<?= set_value('Caja_obs') ?>"><label for="Cuenta_obs" >Observaci&oacute;n</label></div></div>
      <div class="row"><div class="input-field col s4"> <button type="button" class="waves-effect waves-light btn" onclick= "load_page( cajachi.caja_add_p , this, '#caja-chica-form')">Guardar</button></div></div>
    </form>
  </div>
   



	<div class="clearBoth"></div>

  </div>

</div><!-- END CAR DIV -->

<footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>
</div><!-- END PAGE INNER -->




  <script>
   $( function () {

     //asignar fecha actual
    $("form[name=bancos-form] input[name=Caja_fecha_reg]").val( 
       new Date().getFullYear()+"-"+(new Date().getMonth()+1)+"-"+new Date().getDate() ) ;

 
       $("form[name=bancos-form] input[name=Caja_hora_reg]").val( 
        new Date().getHours()+":"+ new Date().getMinutes()+":"+ new Date().getSeconds()  ) ;


    $('.datepicker').pickadate( setting_date ) ;

}); 
  
  
  </script>