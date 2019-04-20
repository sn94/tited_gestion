<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>

<?php  echo form_open("tipo_servicio/edit", array("name"=>"tiposer-form","class"=>"col s12")  ) ;?>
 
      <div class="row">

        <input type="hidden" name="Tiposervicio_id"  value="<?= $data->Tiposervicio_id?>" />

        <div class="input-field col s8">
          <input   name="tiposervicio_des" type="text" class="validate" value="<?= $data->Tiposervicio_des?>" autofocus>
          <label for="tiposervicio_des">Descripci&oacute;n</label>
        </div>
        
        <div class="input-field col s4">
         
        <button type="button" class="waves-effect waves-light btn" onclick= "load_page(18, 'POST', this)">Guardar</button>

        </div>
      </div>
     
<?php  echo form_close() ;?>