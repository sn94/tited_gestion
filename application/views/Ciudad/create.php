
<?php echo validation_errors(); ?>


<?php  echo form_open("ciudad/create", array("name"=>"ciudad-form","class"=>"col s12")  ) ;?>
 
      <div class="row">
 

        <div class="input-field col s8">
          <input   name="ciudad-des" type="text" class="validate">
          <label for="ciudad-des">Descripci&oacute;n</label>
        </div>
        
        <div class="input-field col s4">
         
        <button type="button" class="waves-effect waves-light btn" onclick= "load_page(8, 'POST', this)">Guardar</button>

        </div>
      </div>
     
<?php  echo form_close() ;?>