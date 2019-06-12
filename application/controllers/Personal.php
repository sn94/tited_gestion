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
		
		$lista['lista'] = $this->db->get('Personal')->result();
		 
		//var_dump( $lista);
		$this->load->view('Personal/index' ,  $lista);
	}


	public function list(){
		$lista['lista'] = $this->db->get('Personal')->result();
		 
		//var_dump( $lista);
		$this->load->view('Personal/list' ,  $lista);
	}


	public function list_json(){
		$lista = $this->db->get('Personal')->result();
		echo json_encode(  $lista);
	}

	
	public function create(){

	 
		//mostrar form
			$this->load->helper("form");
			$this->load->library("form_validation");

		//settear reglas de validacion
			$this->form_validation->set_rules("personal_ci", "n&uacute;mero de c&eacute;dula", "required", array('required' => 'Indique el n&uacute;mero de c&eacute;dula'));
			$this->form_validation->set_rules("personal_nom", "nombre", "required", array('required' => 'Ingrese los nombres'));
			$this->form_validation->set_rules("personal_ape", "apellido", "required", array('required' => 'Indique los apellidos'));
			 
		//verificar la validacion
		if( $this->form_validation->run() === FALSE ){
			
			$this->load->view('Personal/create'); 
		}else{
			$this->Personal_model->add();
			$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Se agreg&oacute; un personal "));
			 

		}
	 }


	 public function edit(){
		 	
		//mostrar form
			$this->load->helper("form");
			$this->load->library("form_validation");

		//settear reglas de validacion
			$this->form_validation->set_rules("personal_ci", "n&uacute;mero de c&eacute;dula", "required", array('required' => 'Indique el n&uacute;mero de c&eacute;dula'));
			$this->form_validation->set_rules("personal_nom", "nombre", "required", array('required' => 'Ingrese los nombres'));
			$this->form_validation->set_rules("personal_ape", "apellido", "required", array('required' => 'Indique los apellidos'));
			///$this->form_validation->set_rules("vehiculo_foto", "Foto", "required", array('required' => 'Cargue una foto'));

		//verificar la validacion
		if( $this->form_validation->run() === FALSE ){
			$id= $this->input->get("personal_id") ? $this->input->get("personal_id") : $this->input->post("personal_id");
			//consultar datos de personal y ciudad
			$this->db->select('personal.personal_id,personal.personal_nom,personal.personal_ape,personal.personal_ci,personal.personal_cel,personal.personal_tel,personal.personal_dir,personal.personal_email,personal.personal_fecha_nac,personal.personal_foto1,personal.personal_foto2,ciudad.ciudad_id,ciudad.ciudad_nom');
			$this->db->from('personal');
			$this->db->join("ciudad", "ciudad.ciudad_id=personal.ciudad_id" ,"left");
			$this->db->where('personal.personal_id', $id);  
			$data= $this->db->get()->row(); 
			
			$this->load->view('Personal/edit',  array("data"=> $data)); 
		}else{
			$this->Personal_model->edit();
			$this->load->view("Plantillas/success",  array("title"=>"Registro editado!", "message"=>"Haz editado un registro de personal"));
		  }
		}


	 public function delete(){
		$this->Personal_model->del(); 
		 $this->load->view("Plantillas/success",  array("title"=>"Registro borrado!", "message"=>"Haz borrado un registro de Personal"));
		 //$this->load->view("Plantillas/failure",   array("title"=>"Oops!", "message"=>"Hubo un error al intentar borrar") );
	 }







	 private function do_upload(  $fieldname)
	 {
			 $config['upload_path']          = './galeria/personal';
			 $config['allowed_types']        = 'gif|jpg|jpeg|png';
			 $config['max_size']             = 100;
			 $config['max_width']            = 2048;
			 $config['max_height']           = 1536;

			 $this->load->library('upload', $config);

			 if ( ! $this->upload->do_upload(  $fieldname ))
			 {
					 $error = array('error' => $this->upload->display_errors()); return $error;
			 }
			 else
			 {
					 $data = array('upload_data' => $this->upload->data()); return $data;
			 }
	 }


}
