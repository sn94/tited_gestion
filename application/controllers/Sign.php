<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends CI_Controller {

	 

	public function __construct(){
		parent::__construct(); 
	 
	}

 

	public function index(){}
 
//session_write_close()
    
    public function in(){

		$this->load->helper("form");
		$this->load->library("form_validation");

		//settear reglas de validacion
		$this->form_validation->set_rules("usuario", "Nick", "required", array('required' => 'Indique su nick'));
		$this->form_validation->set_rules("password", "Clave de acceso", "required", array('required' => 'Indique su clave, por favor'));
		
		if( $this->form_validation->run() ===  FALSE){
			$this->load->view('Sign/index'); 
		}else{
			//crear sesion
			$user=$this->input->post("usuario");
			$pass=$this->input->post("password");

			$this->load->model("user_model");
			
			if($this->user_model->existUser()   ){
				if( $this->user_model->isCorrectPassword()){
					$dts= $this->user_model->getByNick();
					//guardando en sesion:   nick   key   user_id
					$newdata = array( 'usuario'  => $user, 'password'     => $pass, "id" =>  $dts->Usuario_id , "personal_id" => $dts->Personal_id);
					$this->session->set_userdata(  $newdata);
					//cargar 
					redirect( "welcome");
				}else{  $this->load->view('Sign/index', array("mensaje" => "Clave incorrecta !")); 	}
			}else{
				$this->load->view('Sign/index', array("mensaje" => "Usuario no existe !")); 
			}
		}
		
    }// end in




    public function out(){
			$this->session->sess_destroy();
			redirect( "sign/in");
			 
    }




	 

}
