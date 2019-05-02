<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>




<?php   echo form_open_multipart("personal/create", array("name"=>"personal-form","class"=>"col s12")  ) ;?>


<div class="row">
  <div class="input-field col s2">
    <input name="personal_ci" type="text" class="validate">
    <label for="personal_ci">C&eacute;dula</label>
  </div>

  <div class="input-field col s4">
    <input   name="personal_nom" type="text" class="validate">
    <label for="personal_nom">Nombres</label>
  </div>
  <div class="input-field col s4">
    <input name="personal_ape" type="text" class="validate">
    <label for="personal_ape">Apellidos</label>
  </div>
</div>
  
<div class="row"> 

<div class="input-field col s2">
   <input type="text" class="validate datepicker"  name="Personal_fecha_nac"   >
  <label for="Personal_fecha_nac">Fecha de nacimiento</label>
</div>

<div class="input-field col s2">
    <i class="material-icons prefix">phone</i>
    <input name="personal_tel" type="tel" class="validate">
    <label for="personal_tel">Tel&eacute;fono</label>
</div>
<div class="input-field col s2">
    <i class="material-icons prefix">stay_primary_portrait</i>
      <input name="personal_cel" type="tel" class="validate">
      <label for="personal_cel">Celular</label>
</div>

<div class="input-field col s6">
  <input type="hidden" name="Ciudad_id" value="" /> 
  <input type="text" class="city-searcher"     />
  <label for="" >Ciudad</label>
</div>


</div>


<div class="row">
  <div class="input-field col s5">
    <input   name="personal_dir" type="text" class="validate">
    <label for="personal_dir">Direcci&oacute;n</label>
  </div>
  <div class="input-field col s5">
  <i class="material-icons prefix">email</i>
    <input name="personal_email" type="text" class="validate">
    <label for="personal_email">Email</label>
  </div>
</div>


<div class="row">
      <div class="input-field col s6">
      <h5>Foto (C&eacute;dula de I.)</h5> 
      <input   name="personal_foto1" type="file" class="validate" onchange="show_loaded_image(event,'#personal-foto-ced')" />
      <div  class="input-field col s6" id="personal-foto-ced" style="min-height: 100px; min-width: 100px;"> 
      </div>
      </div>

      <div class="input-field col s6">
          <h5>Foto (Registro de Conducir)</h5>
            <input   name="personal_foto2" type="file" class="validate" onchange="show_loaded_image(event,'#personal-foto-reg')"> 
            <div  class="input-field col s6" id="personal-foto-reg" style="min-height: 100px; min-width: 100px;"> 
              </div> 
          </div> 

    </div>



<div class="row">
<div class="input-field col s4">

<button type="button" class="waves-effect waves-light btn" onclick= "load_page(24, 'POST', this)">Guardar</button>

  </div>
  </div>




  <?php  echo form_close() ;?>
 
 
  <script>
   $( function () {

     
    autocomplete_ciudades( "input[name=Ciudad_id]" );
    $('.datepicker').pickadate( setting_date ) ;

}); 
  
  
  </script>