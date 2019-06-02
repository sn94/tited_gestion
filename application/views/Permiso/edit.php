<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>



<?php  echo form_open("permiso/edit", array("name"=>"permiso-form","class"=>"col s12")  ) ;?>
     
<input   name="Permiso_id" type="hidden" value="<?= $data->Permiso_id ?>">
          
      <div class="row">
        <div class="input-field col s4">
          <input   name="Permiso_nombre" type="text" class="validate" value="<?= $data->Permiso_nombre ?>">
          <label for="Permiso_nombre" class="active">Descripci&oacute;n:</label>
        </div> 
          
      </div>
      
      <div class="row">
      <div class="input-field col s4">
        <button class="waves-effect waves-light btn" type="button" onclick= "load_page( permisos.perm_edit_p, this, '#permiso-form')" >Guardar</button>
        </div>
        </div>


<?php  echo form_close() ;?>