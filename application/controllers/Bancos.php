<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bancos extends CI_Controller {

	 

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

 
 
	
	public function index(){
		//mostrar form
		$this->load->helper("form");
		$this->load->library("form_validation");

	//settear reglas de validacion
		$this->form_validation->set_rules("Cuenta_monto", "Monto", "required", array('required' => 'Indique el monto'));
		$this->form_validation->set_rules("Cuenta_mov", "Tipo de movimiento", "required", array('required' => 'Indique el tipo de movimiento'));


		$this->load->view('Bancos/index'); 

	}




	public function list(){

		$data= $this->db->get("cuenta_banc")->result();

		$this->load->view("Bancos/list",  array("lista"=> $data)    );
	}






	public function create(){

	 
		//mostrar form
			$this->load->helper("form");
			$this->load->library("form_validation");

		//settear reglas de validacion
			$this->form_validation->set_rules("Cuenta_monto", "Monto", "required", array('required' => 'Indique el monto'));
			$this->form_validation->set_rules("Cuenta_mov", "Tipo de movimiento", "required", array('required' => 'Indique el tipo de movimiento'));

			//get
		if( $this->input->method() == "get"){
			$this->load->view('Bancos/create'); 
		}
		else{
			//verificar la validacion
			if( $this->form_validation->run() === FALSE ){
				
				$this->load->view('Bancos/create'); 
			}else{  
				$data= $this->input->post(  NULL,  true);
				$sql= $this->db->insert('cuenta_banc', $data);

				$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Haz registrado una transacci&oacute;n "));
			}
		}

	 }


	 
 
 

 



}
