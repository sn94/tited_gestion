<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caja_chica extends CI_Controller {

	 

	public function __construct() {
		parent::__construct();
		$this->load->model("caja_chica_model");
	}



	public function list(){
		$data= $this->caja_chica_model->list();
		$this->load->view("Caja_chica/list",  array("lista"=> $data)    );
	}






	public function create(){

	 
		//mostrar form
			$this->load->helper("form");
			$this->load->library("form_validation");

		//settear reglas de validacion
			$this->form_validation->set_rules("Caja_monto", "Monto", "required", array('required' => 'Indique el monto'));
			$this->form_validation->set_rules("Caja_mov", "Tipo de movimiento", "required", array('required' => 'Indique el tipo de movimiento'));
			$this->form_validation->set_rules("Caja_fecha", "Fecha de transacci&oacute;n", "required", array('required' => 'Indique la fecha de transacci&oacute;n'));

			//get
		if( $this->input->method() == "get"){
			$this->load->view('Caja_chica/create'); 
		}
		else{
			//verificar la validacion
			if( $this->form_validation->run() === FALSE ){
				$this->load->view('Caja_chica/create'); 
			}else{  
				$this->caja_chica_model->add();
				$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Haz registrado una transacci&oacute;n "));
			}
		}

	 }


	 
 
 

 



}
