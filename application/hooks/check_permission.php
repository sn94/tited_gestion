<?php
class Check_Permission {

     

    private $permisos= array ('proyecto' => 'PRO');


    function grant_access() {
        // Get current CodeIgniter instance
        $CI =& get_instance();
        // We need to use $CI->session instead of $this->session
        $res= $CI->session->has_userdata('usuario');
        $controlador=  $CI->router->class;
        
        /*if($CI->uri->segment(1) == 'sign' && $CI->session->userdata('usuario') == true)
        { redirect(base_url('welcome')); }*/
     if( $CI->session->userdata('usuario') == false && $CI->uri->segment(1) != 'sign')
        { redirect('sign/in');  } 
    
    if( $CI->session->userdata('usuario') == true  && ($CI->uri->segment(1) == ''  || $CI->uri->segment(1) == 'index'))
        { redirect('welcome');  } 

    }

    
}
?>