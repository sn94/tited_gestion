

      <input name="proyecto_fecha" type="hidden"   value="<?= set_value('proyecto_fecha') ?>">
      <input name="personal_id" type="hidden" value="<?= set_value('personal_id') ?>">  
       
   

    <div class="row">  
     

    <div class="col s2">
    <label for="proyecto_fecha_ini" >Fecha de inicio</label>
      <input name="proyecto_fecha_ini" type="text" value="<?= set_value('proyecto_fecha_ini') ?>"  class="datepicker"    >
    </div>

    <div class="col s2">
    <label for="proyecto_fecha_fin" >Fecha de fin</label>
      <input name="proyecto_fecha_fin" type="text" value="<?= set_value('proyecto_fecha_fin') ?>" class="datepicker"    >
    </div>

    <div class="col s2  city-searcher  ">
        <label for="Ciudad_key"  >Ciudad</label>
        <input   type="text"   id="Ciudad_key" >
        <input type="hidden"  name="Ciudad_id"  value="<?= set_value('Ciudad_id') ?>" />
    </div>

    <div class="col s2 client-searcher">
    
        <label for="Empresa_key" >Cliente</label>
        <input  id="Empresa_key"  type="text"  class="validate" >
        <input type="hidden"  name="Empresa_id"  value="<?= set_value('Empresa_id') ?>"/>
    </div>

</div>
  
  
  
  <div class="row">
 
    <div class="col s2  servicio-searcher  ">
      <label for="servicio-searcher"  >Tipo de servicio</label>
      <input type="hidden"  name="Tiposervicio_id"  value="<?= set_value('Tiposervicio_id') ?>">
      <input  type="text"    >
    </div>
    
    <div class="col s2  vehiculo-searcher  ">
            <label for="Vehiculo_id">Veh&iacute;culo</label>
            <input  type="text"    />
            <input type="hidden" name="Vehiculo_id" value="<?= set_value('Vehiculo_id') ?>" />
    </div>

  </div>