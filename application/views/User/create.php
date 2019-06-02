<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>



<?php  echo form_open("user/create", array("name"=>"user-form","class"=>"col s12")  ) ;?>
  
      <div class="row">
        <div class="input-field col s2">
          <input   name="Usuario_nick" type="text" class="validate">
          <label for="Usuario_nick">Nick:</label>
        </div>
        <div class="input-field col s2">
          <input name="Usuario_key" type="password" class="validate">
          <label for="Usuario_key">Clave:</label>
        </div>
        </div>
         
      <div class="row">
        <div class="col s3 personal-searcher"> 
        <label for="Personal_id"  >Destinatario:</label>
        <input   type="text" >
        <input type="hidden"  name="Personal_id" />
      </div>


             
      </div>
      
      <div class="row">
      <div class="input-field col s4">
        <button class="waves-effect waves-light btn" type="button" onclick= "load_page( user.us_add_p, this, '#user-form')" >Guardar</button>
        </div>
        </div>


        <?php  echo form_close() ;?>



        <script>
        autocomplete_personal( );
        </script>

      