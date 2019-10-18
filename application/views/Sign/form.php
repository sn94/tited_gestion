

<?php  
if( isset( $mensaje) ){ ?>
<div style="color: red; font-style: bold;">
<?=   $mensaje?>
</div>
<?php }  ?>

<div class="container center">

<?php   echo form_open("sign/in", array( "class"=>"col-md-offset-2 col-md-4 col login-form")  ) ;?>
 
      <input  name="usuario" type="text" placeholder="usuario"/>
      <input  name="password" type="password" placeholder="password"/>
      <button class="btn btn-info" type="submit" >Ingresar</button>
      <p class="message">Olvidaste tu clave? <a href="#">Recuperar</a></p>
</form>
</div>