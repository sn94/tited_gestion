<div class="card">
                        <div class="card-action">
                            Agregar nuevo personal
                        </div>
                        <div class="card-content">
    <form class="col s12">

      <div class="row">
        <div class="input-field col s2">
          <input name="personal-ci" type="text" class="validate">
          <label for="personal-ci">C&eacute;dula</label>
        </div>

        <div class="input-field col s4">
          <input   name="personal-nombre" type="text" class="validate">
          <label for="personal-nombre">Nombres</label>
        </div>
        <div class="input-field col s4">
          <input name="personal-apellido" type="text" class="validate">
          <label for="personal-apellido">Apellidos</label>
        </div>
      </div>
   
    <div class="row"> 
      <div class="input-field col s4">
        <input type="hidden" name="Ciudad-id" />
        <input name="personal-ciudad" type="text" class="validate">
        <label for="personal-ciudad">Ciudad</label>
      </div>
      <div class="input-field col s2">
          <i class="material-icons prefix">phone</i>
          <input name="personal-tel" type="tel" class="validate">
          <label for="personal-tel">Tel&eacute;fono</label>
      </div>
      <div class="input-field col s2">
          <i class="material-icons prefix">stay_primary_portrait</i>
            <input name="personal-cel" type="tel" class="validate">
            <label for="personal-cel">Celular</label>
      </div>
    </div>

 
      <div class="row">
        <div class="input-field col s5">
          <input   name="personal-direccion" type="text" class="validate">
          <label for="personal-direccion">Direcci&oacute;n</label>
        </div>
        <div class="input-field col s5">
        <i class="material-icons prefix">email</i>
          <input name="personal-email" type="text" class="validate">
          <label for="personal-email">Email</label>
        </div>
      </div>
      

      <div class="row">
            <div class="input-field col s6">
            <h5>Foto (C&eacute;dula de I.)</h5> 
            <input   name="personal-foto-ced" type="file" class="validate">
            <div  class="input-field col s6" id="personal-foto-ced" style="min-height: 100px; min-width: 100px;"> 
            </div>
            </div>

            <div class="input-field col s6">
                <h5>Foto (Registro de Conducir)</h5>
                  <input   name="personal-foto-reg" type="file" class="validate"> 
                  <div  class="input-field col s6" id="personal-foto-reg" style="min-height: 100px; min-width: 100px;"> 
                    </div> 
                </div> 

          </div>

 

      <div class="row">
      <div class="input-field col s4">
        <a class="waves-effect waves-light btn">Guardar</a>
        </div>
        </div>


      
    </form>
	<div class="clearBoth"></div>
  </div>
    </div>