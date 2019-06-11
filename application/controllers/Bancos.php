<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bancos extends CI_Controller {

	 

	public function __construct() {
		parent::__construct();
		$this->load->model("bancos_model");
		$this->load->model("user_model");
		
		
	}



	public function list(){
		if(  $this->user_model->permisos_de_usuario("BALB")){
			$data= $this->bancos_model->list();
			$this->load->view("Bancos/list",  array("lista"=> $data)    );
		}else{
			$this->load->view("Plantillas/unauthorized");
		}
	}






	public function create(){

		if(  $this->user_model->permisos_de_usuario("BANM")){
			
				//mostrar form
				$this->load->helper("form");
				$this->load->library("form_validation");

			//settear reglas de validacion
				$this->form_validation->set_rules("Cuenta_monto", "Monto", "required", array('required' => 'Indique el monto'));
				$this->form_validation->set_rules("Cuenta_mov", "Tipo de movimiento", "required", array('required' => 'Indique el tipo de movimiento'));
				$this->form_validation->set_rules("Cuenta_fecha", "Fecha de transacci&oacute;n", "required", array('required' => 'Indique la fecha de transacci&oacute;n'));

					//get
			if( $this->input->method() == "get"){
				$this->load->view('Bancos/create'); 
			}
			else{
					//verificar la validacion
					if( $this->form_validation->run() === FALSE ){
						$this->load->view('Bancos/create'); 
					}else{  
						$this->bancos_model->add();
						$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Haz registrado una transacci&oacute;n "));
					}
				}

		}
		else{   $this->load->view("Plantillas/unauthorized");  }
	}


	

}
