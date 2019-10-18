<?php
class Check_Session {

     



    function is_logged_in() {
        // Get current CodeIgniter instance
        $CI =& get_instance();

        // We need to use $CI->session instead of $this->session
        $res= $CI->session->has_userdata('usuario');

        $controlador=  $CI->router->class;
        
        /*if($CI->uri->segment(1) == 'sign' && $CI->session->userdata('usuario') == true)
        { redirect(base_url('welcome')); }*/
     if( $CI->session->userdata('usuario') == false && $CI->uri->segment(1) != 'sign')
        { redirect('http://localhost/tited_gestion/sign/in');  } 
    
    if( $CI->session->userdata('usuario') == true  && ($CI->uri->segment(1) == ''  || $CI->uri->segment(1) == 'index'))
        { redirect( 'http://localhost/tited_gestion/welcome');  } 

    }

    
}
?>