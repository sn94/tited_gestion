<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>



<?php  echo form_open("permiso/create", array("name"=>"permiso-form","class"=>"col s12")  ) ;?>
  
      <div class="row">
        <div class="input-field col s4">
          <input   name="permiso_nombre" type="text" class="validate" onkeyup=" control_length(event, 30);">
          <label for="permiso_nombre">Descripci&oacute;n:</label>
          <h6>M&aacute;x. 30 caracteres</h6>
        </div> 
          
      </div>
      
      <div class="row">
      <div class="input-field col s4">
        <button class="waves-effect waves-light btn" type="button" onclick= "load_page( permisos.perm_add_p, this, '#permiso-form')" >Guardar</button>
        </div>
        </div>


        <?php  echo form_close() ;?>


        <script>
 
        function control_length( event, arg){
          let longitud=  event.target.value.length;  console.log(  longitud);

          if( longitud > 30){
            event.target.value=   event.target.value.substring( 0, event.target.value.length - 1);

          }
        }


        </script>