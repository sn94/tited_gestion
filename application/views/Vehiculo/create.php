<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>

<?php   echo form_open_multipart("vehiculo/create", array("name"=>"vehiculo-form","class"=>"col s12")  ) ;?>

      <div class="row">
        <div class="input-field col s2">
          <input   name="vehiculo_chapa" type="text" class="validate">
          <label for="vehiculo_chapa">Chapa</label>
        </div>

        <div class="input-field col s2">
          <input  name="vehiculo_chasis" type="text" class="validate">
          <label for="vehiculo_chasis">Chasis</label>
        </div>

        <div class="input-field col s2">
            <input  name="vehiculo_anio" type="text" class="validate">
            <label for="vehiculo_anio">A&ntilde;o</label>
          </div>

      </div>
     
      <div class="row">
        <div class="input-field col s2">
          <input   name="vehiculo_marca" type="text" class="validate">
          <label for="vehiculo_marca">Marca</label>
        </div>

        <div class="input-field col s2">
          <input  name="vehiculo_modelo" type="text" class="validate">
          <label for="vehiculo_modelo">Modelo</label>
        </div>
      </div>


      <div class="row">
        <div class="input-field col s6">
          <input   name="vehiculo_foto" type="file" class="validate"  onchange="show_loaded_image( event , '#vehiculo_foto')"> 
        </div>
        <div  class="input-field col s6" id="vehiculo_foto" style="min-height: 100px; min-width: 100px;">

        </div>
 
      </div>

      <div class="row">
      <div class="input-field col s4">

      <button type="button" class="waves-effect waves-light btn" onclick= "load_page( vehiculo.vehiculo_add_p, this, '#vehiculo-form')">Guardar</button>

        </div>
        </div>



        <?php  echo form_close() ;?>