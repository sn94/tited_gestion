

 



<?php  echo form_open("proyecto/edit", array("name"=>"proyecto-form","class"=>"col s12")  ) ;?>
 

       <input name="proyecto_fecha" type="hidden"   >
      <input name="personal_id" type="hidden" value="2">  
       
   

    <div class="row">  
     

    <div class="col s2">
    <label for="proyecto_fecha_ini" >Fecha de inicio</label>
      <input name="proyecto_fecha_ini" type="text" class="datepicker"    >
    </div>

    <div class="col s2">
    <label for="proyecto_fecha_fin" >Fecha de fin</label>
      <input name="proyecto_fecha_fin" type="text" class="datepicker"    >
    </div>

    <div class="col s2  city-searcher  ">
        <label for="Ciudad_key"  >Ciudad</label>
        <input   type="text"   id="Ciudad_key" >
        <input type="hidden"  name="Ciudad_id"  />
    </div>

    <div class="col s2 client-searcher">
    
        <label for="Empresa_key" >Cliente</label>
        <input  id="Empresa_key"  type="text"  class="validate" >
        <input type="hidden"  name="Empresa_id" />
    </div>

</div>
  
  
  
    <div class="row">
 
    <div class="col s2  servicio-searcher  ">
      <label for="servicio-searcher"  >Tipo de servicio</label>
      <input type="hidden"  name="Tiposervicio_id"  >
      <input  type="text"    >
    </div>
    
    <div class="col s2  vehiculo-searcher  ">
            <label for="Vehiculo_id">Veh&iacute;culo</label>
            <input  type="text"  class="form-control" />
            <input type="hidden" name="Vehiculo_id" />
    </div>

    <div class="col s2">
        <button type="button" class="waves-effect waves-light btn" onclick= "load_page( proyecto.pro_edit_p, this,'#proyecto-form')">Guardar</button>
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