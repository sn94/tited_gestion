

<div class="header"> 
          <h1 class="page-header" id="big-form-title">
                            Cuenta Bancaria
          </h1>
						<ol class="breadcrumb" id="my-breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li><a href="#">Cuenta Bancaria</a></li>
					  <li class="active">Transacciones</li>
					</ol> 
									
</div>


<div id="page-inner">

<div class="card">
  <div class="card-action">Registrar un movimiento 
  <button class="waves-effect waves-light btn" onclick="load_page( cta_cte.cta_add_g )"><i class="material-icons dp48">add</i></button>

</div>
 <div class="card-content">
    
    <div id="bancos-form" class="container m-0"> 
      <?php  
      if(validation_errors()){ ?>
      <div class="text-danger">
      <?=validation_errors() ?>
      </div>
      <?php }  ?>

    <?php  echo form_open("bancos/create", array("name"=>"bancos-form","class"=>"col s12")  ) ;?>

      <div class="row">

        <input name="personal_id" type="hidden" value="2"><input name="Cuenta_fecha_reg" type="hidden"  >  <input type="hidden" name="Cuenta_hora_reg" >

        <div class="input-field col s2"> <input name="Cuenta_fecha" type="text" class="validate datepicker" value="<?= set_value('Cuenta_fecha') ?>" ><label for="Cuenta_fecha"  >Fecha de transacci&oacute;n</label></div>
        <!-- tipo de venta-->
        <div class="input-field col s2"><p><input name="Cuenta_mov"   type="radio"   id="r_cont" value="E" checked><label for="r_cont"/>Entrada</label></p><p><input name="Cuenta_mov"  type="radio" id="r_cred" value="S"><label for="r_cred">Salida</label></p></div>
          
        <div class="input-field col s2"> <input name="Cuenta_monto" type="text" class="validate" value="<?= set_value('Cuenta_monto') ?>"><label for="Cuenta_monto"   >Monto</label></div>
      
      </div><!-- end row-->

      <div class="row">  <div class="input-field col s3"><input name="Cuenta_obs" type="text" class="validate" value="<?= set_value('Cuenta_obs') ?>"><label for="Cuenta_obs" >Observaci&oacute;n</label></div></div>
      <div class="row"><div class="input-field col s4"> <button type="button" class="waves-effect waves-light btn" onclick= "load_page( cta_cte.cta_add_p , this, '#bancos-form')">Guardar</button></div></div>
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
    $("form[name=bancos-form] input[name=Cuenta_fecha_reg]").val( 
       new Date().getFullYear()+"-"+(new Date().getMonth()+1)+"-"+new Date().getDate() ) ;

 
       $("form[name=bancos-form] input[name=Cuenta_hora_reg]").val( 
        new Date().getHours()+":"+ new Date().getMinutes()+":"+ new Date().getSeconds()  ) ;


    $('.datepicker').pickadate( setting_date ) ;

}); 
  
  
  </script>