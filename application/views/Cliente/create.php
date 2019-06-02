<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>



<?php  echo form_open("cliente/create", array("name"=>"cliente-form","class"=>"col s12")  ) ;?>
  
      <div class="row">
        <div class="input-field col s4">
          <input   name="empresa_razon" type="text" class="validate">
          <label for="empresa_razon">Raz&oacute;n Social</label>
        </div>
        <div class="input-field col s3">
          <input name="empresa_ruc" type="text" class="validate">
          <label for="empresa_ruc">R.U.C</label>
        </div>
        <div class="input-field col s5">
          <input   name="empresa_dir" type="text" class="validate">
          <label for="empresa_dir">Direcci&oacute;n</label>
        </div>
      </div>
   
      <div class="row">
      <div class="input-field col s3">
          <i class="material-icons prefix">phone</i>
          <input name="empresa_tel" type="tel" class="validate">
          <label for="empresa_tel">Tel&eacute;fono</label>
        </div>

        <div class="input-field col s3">
          <i class="material-icons prefix">stay_primary_portrait</i>
          <input name="empresa_cel" type="tel" class="validate">
          <label for="empresa_cel">Celular</label>
        </div>
        <div class="input-field col s4">
        <i class="material-icons prefix">email</i>
          <input name="empresa_email" type="text" class="validate">
          <label for="empresa_email">Email</label>
        </div>
        </div>

      <div class="row">
      
      
        <div class="input-field col s6">
        <i class="material-icons prefix">web</i>
          <input name="empresa_web" type="text" class="validate">
          <label for="empresa_web">Sitio web</label>
        </div>
      </div>
      
      <div class="row">
      <div class="input-field col s4">
        <button class="waves-effect waves-light btn" type="button" onclick= "load_page( cliente.cliente_add_p, this, '#cliente-form')" >Guardar</button>
        </div>
        </div>


        <?php  echo form_close() ;?>