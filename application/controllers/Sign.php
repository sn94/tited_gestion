<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends CI_Controller {

	 

	public function __construct(){
		parent::__construct(); 
	 
	}



	public function index()
	{
		//var_dump( $lista);
		$this->load->view('Sign/index'); 
		
	}

	//$this->session->sess_destroy();
//session_write_close()
    
    public function in(){

			//crear sesion
			$user=$this->input->post("usuario");
			$pass=$this->input->post("password");
			$newdata = array( 'usuario'  => $user, 'password'     => $pass);
			$this->session->set_userdata(  $newdata); 

			//cargar 
			redirect( "welcome");
    }




    public function out(){
			$this->session->sess_destroy();
			redirect( "sign/index");
			 
    }

 

}
