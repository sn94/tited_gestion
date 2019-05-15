

        <?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>
                
         
             <div class="table-responsive"> 
                 <table class="table table-striped table-bordered table-hover"  id= "dataTables-example" >
                     <thead>
                         <tr>
                             <th>Foto</th>  
                         </tr>
                     </thead>
                     <tbody> 
                         <tr class="gradeA"> 
                              
                            <td> <?php  include("upload_form.php");  ?>   </td>
           
                         </tr>
  
                     </tbody>
                 </table>
             </div>
             <script>


var galery_indeX= 1;

var gen_form= function(){
    let form="<form action='/galeria/create' name='galeria-form"+galery_indeX+"'   enctype='multipart/form-data' method='post' accept-charset='utf-8'>";
    form=form+"<input type='hidden' name='proyecto_id'  value='<?= $proyecto_id  ?> '  />";
    form= form+"<div class='row'><div class='col-md-6'><div  id='galeria_foto"+galery_indeX+"' style='max-height: 100px; max-width: 100px;'></div>";
    form=form+"<input   name='galeria_foto' type='file'  onchange='show_loaded_image( event , '#galeria_foto1')'></div>";
    form=form+"<div class='col-md-4'><input type='text'  name='galeria_des' /> <button type='button'  onclick='subir_foto(this)'><i class='material-icons' style='font-size:20px;'>forward_5</i></button>";
    form= form+"<button type='button'  onclick='quitar_foto(this)'><i class='material-icons' style='font-size:20px;'>delete</i></button>";
    form=form+"<button type='button'  onclick='agregar_foto()'><i class='material-icons' style='font-size:20px;'>queue</i></button></div>";
    form= form+"</form>";   return  form;
};

var agregar_foto= function(){
    galery_indeX=galery_indeX+1;
    let form= gen_form();
    let td1= "<td>"+ form+  "</td>";  
    let row= " <tr class='gradeA'> "+td1+"</tr>";

    $('#dataTables-example tbody').append( row);
};

var quitar_foto= function( contx){   
      let indice=   $(contx.parentNode.parentNode).prop("rowIndex") ;
     
    if(  (galery_indeX-1) >= 1  &&  indice  !=1){
         
        galery_indeX=galery_indeX-1;  
        $(  contx.parentNode.parentNode ).remove(); 
    }
    
};


var subir_foto= function( contx){    
      let form= $(  contx.parentNode.parentNode ).find("td form")[0];
      load_page( 33, 'POST',    contx); 
    
};

</script>