
<?php echo validation_errors(); ?>


<?php  echo form_open("ciudad/edit", array("name"=>"ciudad-form","class"=>"col s12")  ) ;?>
 
      <div class="row">

        <input type="hidden" name="ciudad-id"  value="<?= $data->Ciudad_id?>" />

        <div class="input-field col s8">
          <input   name="ciudad-des" type="text" class="validate" value="<?= $data->Ciudad_nom?>" autofocus>
          <label for="ciudad-des" class="active">Descripci&oacute;n</label>
        </div>
        
        <div class="input-field col s4">
         
        <button type="button" class="waves-effect waves-light btn" onclick= "load_page(10, 'POST', this)">Guardar</button>

        </div>
      </div>
     
<?php  echo form_close() ;?>