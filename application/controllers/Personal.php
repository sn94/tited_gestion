<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {

	 
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model("personal_model");
	}



	public function index()
	{
		if(  $this->user_model->permisos_de_usuario("REHL")){ 
			$lista['lista'] = $this->db->get('personal')->result(); 
			$this->load->view('Personal/index' ,  $lista);
		}else{
			$this->load->view("Plantillas/unauthorized");
		} 
	}


	public function list(){
		if(  $this->user_model->permisos_de_usuario("REHL")){ 
			$lista['lista'] = $this->db->get('Personal')->result(); 
			$this->load->view('Personal/list' ,  $lista);
		}else{
			$this->load->view("Plantillas/unauthorized");
		}
}


	public function list_json(){
		$lista = $this->db->get('Personal')->result();
		echo json_encode(  $lista);
	}

	private function set_validation(){
		//mostrar form
		$this->load->helper("form"); $this->load->library("form_validation");
		//settear reglas de validacion
		$this->form_validation->set_rules("personal_ci", "n&uacute;mero de c&eacute;dula", "required", array('required' => 'Indique el n&uacute;mero de c&eacute;dula'));
		$this->form_validation->set_rules("personal_nom", "nombre", "required", array('required' => 'Ingrese los nombres'));
		$this->form_validation->set_rules("personal_ape", "apellido", "required", array('required' => 'Indique los apellidos'));
		return $this->form_validation->run();
	}

	public function create(){

		if(  $this->user_model->permisos_de_usuario("REHC")){ 
			if( $this->set_validation()  === FALSE ){
				$this->load->view('Personal/create');
			}else{
				$this->Personal_model->add();
				$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Se agreg&oacute; un personal "));
			} 
		}else{
			$this->load->view("Plantillas/unauthorized");
		}
	 
	}


	 public function edit(){
			 
		if(  $this->user_model->permisos_de_usuario("REHE")){ 
			if( $this->set_validation()  === FALSE ){ 
				$data= $this->Personal_model->getWithoutId();  
				$this->load->view('Personal/edit',  array("data"=> $data)); 
			}else{
				$this->Personal_model->edit(); 
				$this->load->view("Plantillas/success",  array("title"=>"Registro editado!", "message"=>"Haz editado un registro de personal"));
				} 
		}else{
			$this->load->view("Plantillas/unauthorized");
		}
	}


	 public function delete(){
		if(  $this->user_model->permisos_de_usuario("REHB")){ 
			$this->Personal_model->del(); 
			$this->load->view("Plantillas/success",  array("title"=>"Registro borrado!", "message"=>"Haz borrado un registro de Personal"));
		}else{
			$this->load->view("Plantillas/unauthorized");
		}
	}





 


}
