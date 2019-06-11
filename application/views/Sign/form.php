

<?php  
if( isset( $mensaje) ){ ?>
<div style="color: red; font-style: bold;">
<?=   $mensaje?>
</div>
<?php }  ?>


<?php   echo form_open("sign/in", array( "class"=>"login-form")  ) ;?>
 
      <input  name="usuario" type="text" placeholder="usuario"/>
      <input  name="password" type="password" placeholder="password"/>
      <button type="submit" >Ingresar</button>
      <p class="message">Olvidaste tu clave? <a href="#">Recuperar</a></p>
    </form>
