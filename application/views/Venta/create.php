
<style type="text/css">
#toast-container {
  top: auto !important;
  right: auto !important;
  bottom: 10%;
  left:20%;
}
</style> 



<div id="page-inner" class="container">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page">Inicio</li>
    <li class="breadcrumb-item" aria-current="page">Comprobantes</li>
    <li class="breadcrumb-item active" aria-current="page">Factura de venta</li>
  </ol>
</nav>


    <h3>  Registrar Factura </h3> 


<div c  lass="container">   

<?php  
if(validation_errors()){ ?>
<div class="text-danger">
<?=validation_errors() ?>
</div>
<?php }  ?>


 

<?php   echo form_open_multipart("venta/create", array("name"=>"venta-form", "method" => "post",  "onsubmit" => "enviar(event)"  ) )  ;?>

<!-- campos ocultos   codigo de personal --> 
<input type="hidden"    name="personal_id" value="<?= $this->session->userdata("personal_id") ?>"  >  

<!-- ******************CABECERA ****************************-->
<div class="form-row">
<!-- numero de factura-->
<div class="form-group col col-md-2"> <label>Nro. de Factura:</label> <input class="form-control" disabled  name="Venta_nro_fac"  value="<?= set_value('venta_nro_fac') ?>" type="text" >
</div>

<!-- cliente -->  
<div class="form-group col col-md-2 cliente-searcher">   <label for="Cliente_id"  >Cliente:</label>  <input  class="form-control"   type="text"  >  <input type="hidden"  name="Cliente_id" />
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="Venta_tipo" id="inlineRadio1" value="r_cont">
  <label class="form-check-label" for="inlineRadio1">Contado</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="Venta_tipo" id="inlineRadio2" value="r_cre">
  <label class="form-check-label" for="inlineRadio2">Cr&eacute;dito</label>
</div>

</div><!-- Fin form row-->
 


<!-- ****************** DETALLE ****************************-->
<div class="form-row">
<!-- ITEM --> 
<div class="form-group col col-md-2 item-searcher"><label for="Item_id" >Item:</label>  <input   type="text"  id="Item_des" class="form-control"   ><input type="hidden"  name="Item_id" /> 
</div><!-- end row -->

<div class="form-group col col-md-2"><label for="precio"  >Precio:</label> <input  class="form-control"   type="text" id="precio" />
</div><!-- end row-->

<div class="form-group col col-md-2"><label for="cant"  >Cantidad:</label> <input  class="form-control"   type="text" id="cant" onkeydown="add_item_to_table(event)" />
</div><!-- end row-->

</div><!-- end form row --> 




 



<div class="row">   

<table id="detalle-factura" class="table table-striped table-bordered table-hover">
<thead>
<tr><th>Cod.</th><th>Descripci&oacuten</th><th>Precio</th><th>Cant.</th><th>Subt.</th><th></th></tr>
</thead>
<tbody>
 </tbody>
</table> 
<input type="text" name="Venta_total" value="0" />
</div><!-- end row-->

 
 
<div class="row"><!-- boton de envio-->
<div class="input-field col s4">
<button type="submit"   class="waves-effect waves-light btn" >Guardar</button>
</div>
</div><!-- END row     -->


<?php  echo form_close() ;?>

 
    
 
	<div class="clearBoth"></div>

   
</div><!-- END CARD DIV -->

<footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>
</div><!-- END PAGE INNER -->






<script>


/***********TABLAS ****************** */
function remove_item(e){   
  let del_it=  e.target.parentNode.parentNode  ;
   e.target.parentNode.parentNode.parentNode.removeChild( del_it);
  }


function add_item_to_table(e){
  if( e.keyCode== 13){
    e.preventDefault();
    console.log("ENTER pressed");
  
    let pr_precio=  parseInt( document.querySelector("input[id=precio]").value);
    let pr_desc=  document.querySelector("input[id=Item_des]").value;
    let pr_id= document.querySelector("div.item-searcher input[name=Item_id]").value;
    let pr_cant= e.target.value;
    let subtotal= pr_precio * pr_cant;
    //crear una nueva fila
    let detalle_f= document.querySelector("table[id=detalle-factura] tbody");
    let previous_conte= detalle_f.innerHTML;
    let btn_minus= '<button type="button" class="btn btn-danger" onclick="remove_item(event)">(-)</button>';
    let nueva_f= `<tr><td><input name='item_id[]' value='${ pr_id}'/></td><td>${pr_desc}</td><td><input name='item_precio[]' value='${pr_precio}'/></td><td><input name='item_cant[]' value='${pr_cant}'/></td><td><input value='${ subtotal}'/></td><td>${btn_minus}</td> </tr>`;
    detalle_f.innerHTML=  previous_conte + nueva_f;

    //Actualizar total
    let total= parseInt( document.querySelector("input[name=Venta_total]").value) + subtotal;
    document.querySelector("input[name=Venta_total]").value= total;
  }
}
 
/***************ENVIO DE FORMULARIO********* */
function enviar(e){
  e.preventDefault();  
 send_http_post(  e.target, div="#page-wrapper", extra={ "alert" : "Guardar factura?"})
} 
 


   $( function () {

    //Autocompletado
    let objClientes= {     
        recurso: "cliente/list_json",
        inputSearcher: ".cliente-searcher",
        callBack:   ( ar)=>    ar.Empresa_id+"-"+ar.Empresa_razon ,
        list_name: "clientes_list"
    };
    S_autocomplete._autocomplete_( objClientes);


    let objItems= {    
        recurso: "item/list_json",
        inputSearcher: ".item-searcher",
        callBack:   ( ar)=>    ar.id+"-"+ar.des,
        list_name: "items_list",
        do_after_all: function(ar){ 
          console.log(  ar );
          // document.querySelector("input[id=precio]").value=  S_autocomplete['items_list'][ ar].precio ;
        }
      };
    S_autocomplete._autocomplete_( objItems);




    //$('.datepicker').pickadate( setting_date ) ;




 /*    //asignar fecha actual
    $("form[name=venta-form] input[name=venta_fecha_reg]").val( 
       new Date().getFullYear()+"-"+(new Date().getMonth()+1)+"-"+new Date().getDate() ) ;

 
       $("form[name=venta-form] input[name=venta_hora_reg]").val( 
        new Date().getHours()+":"+ new Date().getMinutes()+":"+ new Date().getSeconds()  ) ;
*/
    

}); 
  
  
  </script>
 