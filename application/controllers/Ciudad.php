<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudad extends CI_Controller {

	 

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}



	public function index()
	{
			
		if(  $this->user_model->permisos_de_usuario("CIUL")){
			$lista['lista'] = $this->db->select('ciudad.ciudad_id,ciudad.ciudad_nom,departamento.departamento_nom, ciudad.ciudad_readonly')->
			from('ciudad')->join('departamento', 'ciudad.departamento_id=departamento.departamento_id', 'left')->order_by('ciudad.ciudad_readonly', "ASC")->get()->result_object();
			$this->load->view('Ciudad/index' ,  $lista);
		}else{
			$this->load->view("Plantillas/unauthorized");
		}	

	}

	/*
	if(  $this->user_model->permisos_de_usuario("CIULC")){
		
		}else{
			$this->load->view("Plantillas/unauthorized");
		}	
		*/

	public function list()
	{
		
		if(  $this->user_model->permisos_de_usuario("CIUL")){
			$lista['lista'] = $this->db->select('ciudad.ciudad_id,ciudad.ciudad_nom,departamento.departamento_nom, ciudad.ciudad_readonly')->
			from('ciudad')->join('departamento', 'ciudad.departamento_id=departamento.departamento_id', 'left')->order_by('ciudad.ciudad_readonly', "ASC")->get()->result_object();
			$this->load->view('Ciudad/list' ,  $lista);
		}else{
			$this->load->view("Plantillas/unauthorized");
		}

	}



	public function create(){

		if(  $this->user_model->permisos_de_usuario("CIUC")){
			//mostrar form
			$this->load->helper("form");
			$this->load->library("form_validation");

			//settear reglas de validacion
			$this->form_validation->set_rules("ciudad-des", "Ciudad,zona", "required", array('required' => 'Ingrese una descripcion valida'));

			//verificar la validacion
			if( $this->form_validation->run() === FALSE ){
				
				$this->load->view('Ciudad/create'); 
			}else{
				$data = array(   'Ciudad_nom' =>  $this->input->post("ciudad-des") , "Ciudad_readonly"=>"0");
				$sql= $this->db->insert('ciudad', $data);
				$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Se agreg&oacute; una zona "));
			}
		}else{
			$this->load->view("Plantillas/unauthorized");
		}
		
	 }


	 public function edit(){

		if(  $this->user_model->permisos_de_usuario("CIUE")){
				//mostrar form
				$this->load->helper("form");
				$this->load->library("form_validation");
	
			//settear reglas de validacion
				$this->form_validation->set_rules("ciudad-des", "Ciudad,zona", "required");
	
			//verificar la validacion
			if( $this->form_validation->run() === FALSE ){
			   $id= $this->input->get("ciudad_id") ? $this->input->get("ciudad_id") : $this->input->post("ciudad_id");
				$ciu_obj= $this->db->get_where("ciudad", array("ciudad_id" => $id)  )->row();
				   
				$this->load->view('Ciudad/edit', array("data" =>  $ciu_obj )  ); 
			}else{
				$data = array(   'Ciudad_nom' =>  $this->input->post("ciudad-des")  );
				$this->db->where('ciudad_id', $this->input->post("ciudad-id"));
			   $this->db->update('ciudad', $data);
			   $this->load->view("Plantillas/success",  array("title"=>"Registro editado!", "message"=>"Haz editado un registro"));
			}
		}else{
			$this->load->view("Plantillas/unauthorized");
		}	 
	}


	 public function delete(){
		if(  $this->user_model->permisos_de_usuario("CIUB")){
			$id= $this->input->get("ciudad_id"); 
			$sql= $this->db->delete('ciudad',  array('ciudad_id' => $id)  ) ;
			 $this->load->view("Plantillas/success",  array("title"=>"Registro borrado!", "message"=>"Haz borrado un registro de Zona/ciudad"));
		  
		}else{
			$this->load->view("Plantillas/unauthorized");
		}
	}












	 /****************************************************************************/

	 public function get(  $id){
		$data= $this->db->get_where( 'ciudad', array( 'ciudad_id'=> $this->input->get("ciudad-id")) )->row();
		echo json_encode(  $data);
	 }


	 
	 public function list_json(){

		$lista = $this->db->select('ciudad.ciudad_id,ciudad.ciudad_nom,departamento.departamento_nom')->
		from('ciudad')->join('departamento', 'ciudad.departamento_id=departamento.departamento_id', 'left')->order_by('ciudad.ciudad_readonly', "ASC")->get()->result_array();
		
		echo json_encode(  $lista);
	 }

}
