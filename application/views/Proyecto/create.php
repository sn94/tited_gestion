<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>



<?php  echo form_open("proyecto/create", array("name"=>"proyecto-form","class"=>"col s12")  ) ;?>
 

      <div class="row">
      <div class="input-field col s2">
          <input name="proyecto_fecha" type="text" class="validate" >
          <label for="proyecto_fecha" class="active">Fecha de reg.</label>
        </div>

      <input name="personal_id" type="hidden" value="2">  
      </div>
   

    <div class="row">  
     
    <div class="input-field col s2">
          <input name="proyecto_fecha_ini" type="text" class="validate datepicker">
          <label for="proyecto_fecha_ini"   >Fecha de nicio</label>
        </div>
        <div class="input-field col s2">
          <input name="proyecto_fecha_fin" type="text" class="validate datepicker">
          <label for="proyecto_fecha_fin" >Fecha de fin</label>
        </div>

    <div class="col s4 city-searcher"> 
        <label for="Ciudad_id"  >Ciudad</label>
        <input   type="text" >
        <input type="hidden"  name="Ciudad_id" />
        
      </div>
         
    <div class="col s4 client-searcher"> 
        <label for="Empresa_id"  >Cliente</label>
        <input  type="text"   >
        <input type="hidden" name="Empresa_id" />
      </div>
    </div>

  
    <div class="row">
 
    <div class="col s4  servicio-searcher" >
      <label for="servicio-searcher"  >Tipo de servicio</label>
      <input type="hidden"  name="Tiposervicio_id"  >
      <input  type="text" >
        </div>
  </div>


      
  <div class="row">
        
        <div class="col s4 vehiculo-searcher"> 
            <label for="Vehiculo_id">Veh&iacute;culo</label>
            <input  type="text"  />
            <input type="hidden" name="Vehiculo_id" />
          </div>
    
          <!--<div class="input-field col s6" id="vehiculo-foto-reg"   style="min-height: 100px; min-width: 100px;">
          </div> --> 
</div>



      <div class="row">
         <div class="input-field col s4">
           
            <button type="button" class="waves-effect waves-light btn" onclick= "load_page(28, 'POST', this)">Guardar</button>
      </div>
        </div>

      </form>

     
  <script>
   $( function () {

     //asignar fecha actual
    $("form[name=proyecto-form] input[name=proyecto_fecha]").val( 
       new Date().getFullYear()+"-"+(new Date().getMonth()+1)+"-"+new Date().getDate() ) ;


    autocomplete_ciudades(  );
    autocomplete_clientes(  );
    autocomplete_servicios(  );
    autocomplete_vehiculos(  );
    $('.datepicker').pickadate( setting_date ) ;

}); 
  
  
  </script>