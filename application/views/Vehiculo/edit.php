<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>

<?php   echo form_open_multipart("vehiculo/edit", array("name"=>"vehiculo-form","class"=>"col s12")  ) ;?>


<input type="hidden" name="vehiculo_id"  value="<?= $data->Vehiculo_id?>" />

      <div class="row">
        <div class="input-field col s4">
          <input   name="vehiculo_chapa" type="text" class="validate" value="<?= $data->Vehiculo_chapa?>">
          <label for="vehiculo_chapa" class="active">Chapa</label>
        </div>

        <div class="input-field col s5">
          <input  name="vehiculo_chasis" type="text" class="validate" value="<?= $data->Vehiculo_chasis?>">
          <label for="vehiculo_chasis" class="active">Chasis</label>
        </div>

        <div class="input-field col s3">
            <input  name="vehiculo_anio" type="text" class="validate" value="<?= $data->Vehiculo_anio?>">
            <label for="vehiculo_anio" class="active">A&ntilde;o</label>
          </div>

      </div>
     
      <div class="row">
        <div class="input-field col s6">
          <input   name="vehiculo_marca" type="text" class="validate" value="<?= $data->Vehiculo_marca?>">
          <label for="vehiculo_marca" class="active">Marca</label>
        </div>

        <div class="input-field col s6">
          <input  name="vehiculo_modelo" type="text" class="validate"  value="<?= $data->Vehiculo_modelo?>">
          <label for="vehiculo_modelo"  class="active">Modelo</label>
        </div>
      </div>


      <div class="row">
        <div class="input-field col s6">
          <input   name="vehiculo_foto" type="file" class="validate"> 
        </div>
        <div  class="input-field col s6" id="vehiculo_foto">
            <img  src="<?= $data->Vehiculo_foto?>"/>
        </div>
 
      </div>

      <div class="row">
      <div class="input-field col s4">

      <button type="button" class="waves-effect waves-light btn" onclick= "load_page( vehiculo.vehiculo_edit_p,  this, '#vehiculo-form')">Guardar</button>

        </div>
        </div>


        <?php  echo form_close() ;?>