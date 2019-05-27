
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