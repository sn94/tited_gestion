<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>



<?php  echo form_open("user/edit", array("name"=>"user-form","class"=>"col s12")  ) ;?>
 
<div class="row">
        <div class="input-field col s4">
          <input   name="usuario_nick" type="text" class="validate" value="<?= $data->Usuario_nick ?>">
          <label for="usuario_nick" class="active">Nick:</label>
        </div>
        <div class="input-field col s3">
          <input name="usuario_key" type="password" class="validate" value="<?= $data->Usuario_key ?>">
          <label for="usuario_key" class="active">Clave:</label>
        </div>
         
         <input   name="personal_id" type="hidden" value="<?= $data->Personal_id ?>">
         <input   name="usuario_id" type="hidden" value="<?= $data->Usuario_id ?>"> 
      </div>

       
 
      
      <div class="row">
      <div class="input-field col s4">
        <button class="waves-effect waves-light btn" type="button" onclick= "load_page(user.us_add_p, this, '#user-form')" >Guardar</button>
        </div>
        </div>


        <?php  echo form_close() ;?>