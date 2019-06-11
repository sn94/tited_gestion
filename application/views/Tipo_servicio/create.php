<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>


<?php  echo form_open("Tipo_servicio/create", array("name"=>"tiposervicio-form","class"=>"col s12")  ) ;?>
 
      <div class="row">
 

        <div class="input-field col s8">
          <input   name="tiposervicio_des" type="text" class="validate">
          <label for="tiposervicio_des">Descripci&oacute;n</label>
        </div>
        
        <div class="input-field col s4">
         
        <button type="button" class="waves-effect waves-light btn" onclick= "load_page(tiposervicio.tiposer_add_p, this, '#tiposer-form')">Guardar</button>

        </div>
      </div>
     
<?php  echo form_close() ;?>