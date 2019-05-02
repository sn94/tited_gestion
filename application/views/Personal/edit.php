<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>




<?php   echo form_open_multipart("personal/edit", array("name"=>"personal-form","class"=>"col s12")  ) ;?>

<input type="hidden" name="personal_id" value="<?=   $data->personal_id ?>" /> 


<div class="row">
  <div class="input-field col s2">
    <input name="personal_ci"   type="text"  value="<?=   $data->personal_ci ?>" />
    <label for="personal_ci" class="active">C&eacute;dula</label>
  </div>

  <div class="input-field col s4">
    <input   name="personal_nom" type="text" class="validate" value="<?=   $data->personal_nom ?>">
    <label for="personal_nom" class="active">Nombres</label>
  </div>
  <div class="input-field col s4">
    <input name="personal_ape" type="text" class="validate"value="<?=   $data->personal_ape ?>" >
    <label for="personal_ape" class="active">Apellidos</label>
  </div>
</div>
  
<div class="row"> 

<div class="input-field col s2">
   <input type="text" class="validate datepicker"  name="Personal_fecha_nac"  value="<?=   $data->personal_fecha_nac ?>" >
  <label for="Personal_fecha_nac" class="active">Fecha de nacimiento</label>
</div>

<div class="input-field col s2">
    <i class="material-icons prefix">phone</i>
    <input name="personal_tel" type="tel" class="validate" value="<?=   $data->personal_tel ?>" >
    <label for="personal_tel" class="active">Tel&eacute;fono</label>
</div>
<div class="input-field col s2">
    <i class="material-icons prefix">stay_primary_portrait</i>
      <input name="personal_cel" type="tel" class="validate"  value="<?=   $data->personal_cel ?>">
      <label for="personal_cel" class="active">Celular</label>
</div>
<div class="input-field col s4">
  <input type="hidden" name="Ciudad_id"   value="<?=   $data->ciudad_id ?>"/> 
  <input type="text" class="validate"  class="city-searcher" value="<?=   $data->ciudad_nom ?>" >
  
  <label for="Ciudad_id" class="active">Ciudad</label>
</div>
</div>


<div class="row">
  <div class="input-field col s5">
    <input   name="personal_dir" type="text" class="validate"  value="<?=   $data->personal_dir ?>">
    <label for="personal_dir" class="active">Direcci&oacute;n</label>
  </div>
  <div class="input-field col s5">
  <i class="material-icons prefix">email</i>
    <input name="personal_email" type="text" class="validate"  value="<?=   $data->personal_email ?>">
    <label for="personal_email" class="active">Email</label>
  </div>
</div>


<div class="row">
      <div class="input-field col s6">
      <h5>Foto (C&eacute;dula de I.)</h5> 
      <input   name="personal_foto1" type="file" class="validate" onchange="show_loaded_image(event,'#personal-foto-ced')" />
     
      <div  class="input-field col s6" id="personal-foto-ced" style="min-height: 100px; min-width: 100px;"> 
      <img  src="<?= $data->personal_foto1?>"/>
      </div>
      
      </div>

      <div class="input-field col s6">
          <h5>Foto (Registro de Conducir)</h5>
            <input   name="personal_foto2" type="file" class="validate" onchange="show_loaded_image(event,'#personal-foto-reg')"> 
            <div  class="input-field col s6" id="personal-foto-reg" style="min-height: 100px; min-width: 100px;"> 
            <img  src="<?= $data->personal_foto2?>"/>
              </div> 
          </div> 

    </div>



<div class="row">
<div class="input-field col s4">

<button type="button" class="waves-effect waves-light btn" onclick= "load_page(26, 'POST', this)">Guardar</button>

  </div>
  </div>




  <?php  echo form_close() ;?>
 
 
  <script>
   $( function () {

    
    autocomplete_ciudades( "input[name=Ciudad_id]" );
    $('.datepicker').pickadate( setting_date ) ;
 
}); 
  
  
  </script>