<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>


<?php  echo form_open("proyecto/cuadrilla", array("name"=> "cuadrilla-form","class"=>"col s12")  ) ;?>
         
         <input type="hidden" name="proyecto_id"  value="<?= $proyecto_id  ?>"  />
         
        
         
             <div class="table-responsive">
            
                  <button type="button" class="waves-effect waves-light btn mb-3" onclick= "load_page( proyecto.pro_cuad_p, this, '#cuadrilla-form')">Guardar</button>
                 <div style="min-height: 15px;"></div>
 

                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                     <thead>
                         <tr>
                             <th>C.I.</th>
                             <th>Nombre completo</th> 
                             <th>Seleccionar</th> 
                         </tr>
                     </thead>
                     <tbody>
                          
                          <?php  foreach( $list  as $row){ ?>
 
                         <tr class="gradeA"> 
                             <td><?= $row->Personal_ci  ?></td>
                             <td><?= $row->Personal_nom." ".$row->Personal_ape  ?></td> 
                             <td> 
                                 <p> 
                                     <input name="personal_id[]"  id="personal_id" type="checkbox" class="filled-in" value="<?= $row->Personal_id  ?>"  />
                                     <label for="personal_id">Marcar</label> 
                                 </p>
                         
                             </td> 
                         </tr>
 
                         <?php } ?>
                         
                     </tbody>
                 </table>
             </div>
             
             <?php  echo form_close(); ?>