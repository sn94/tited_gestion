    
<?php  echo form_open_multipart('galeria/create', array('name'=> 'galeria-form1','class'=>'col s12')  ) ;?>

<input type='hidden' name='proyecto_id'  value='<?= $proyecto_id  ?>'  />
 
<div class='row'>
<div class='col-md-6'>
<div  id='galeria_foto1' style='max-height: 100px; max-width: 100px;'></div>
 <input   name='galeria_foto' type='file'  onchange='show_loaded_image( event , "#galeria_foto1")'>
</div>


<div class='col-md-4'>
 <input type='text'  name='galeria_des' /> 
 <button type='button'  onclick='subir_foto(this)'><i class='material-icons' style='font-size:20px;'>forward_5</i></button>
<button type='button'  onclick='quitar_foto(this)'><i class='material-icons' style='font-size:20px;'>delete</i></button>
<button type='button'  onclick='agregar_foto()'><i class='material-icons' style='font-size:20px;'>queue</i></button>

</div>

</div>

 
</form>