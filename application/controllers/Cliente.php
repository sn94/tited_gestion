<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

 
	 


	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}



	public function index()
	{
		
		if(  $this->user_model->permisos_de_usuario("CLIL")){
			
			$lista['lista'] = $this->db->get('cliente')->result(); 
			$this->load->view('Cliente/index' ,  $lista);
		}else{
			$this->load->view("Plantillas/unauthorized");
		}

	}


	public function list(){
		if(  $this->user_model->permisos_de_usuario("CLIL")){
			$lista['lista'] = $this->db->get('cliente')->result(); 
			$this->load->view('Cliente/list' ,  $lista);
		}else{
			$this->load->view("Plantillas/unauthorized");
		}
		
	}


	
	public function create(){
		if(  $this->user_model->permisos_de_usuario("CLIC")){
				//mostrar form
			$this->load->helper("form");
			$this->load->library("form_validation");

			//settear reglas de validacion
				$this->form_validation->set_rules("empresa_razon", "razon social", "required", array('required' => 'Ingrese una descripcion valida'));
				$this->form_validation->set_rules("empresa_ruc", "R.U.C", "required", array('required' => 'Ingrese un numero de RUC valido'));
				$this->form_validation->set_rules("empresa_tel", "telefono", "required", array('required' => 'Ingrese al menos un numero telefonico'));

			//verificar la validacion
			if( $this->form_validation->run() === FALSE ){
				
				$this->load->view('Cliente/create'); 
			}else{
				$postt= $this->input->post(  NULL,  true);
				$data =  $postt;
				$sql= $this->db->insert('cliente', $data);
				$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Se agreg&oacute; un cliente "));
			}
		}else{
			$this->load->view("Plantillas/unauthorized");
		}
 }


	 public function edit(){
		if(  $this->user_model->permisos_de_usuario("CLIE")){
				//mostrar form
				$this->load->helper("form");
				$this->load->library("form_validation");
	
			//settear reglas de validacion 
			   $this->form_validation->set_rules("empresa_razon", "razon social", "required", array('required' => 'Ingrese una descripcion valida'));
			   $this->form_validation->set_rules("empresa_ruc", "R.U.C", "required", array('required' => 'Ingrese un numero de RUC valido'));
			   $this->form_validation->set_rules("empresa_tel", "telefono", "required", array('required' => 'Ingrese al menos un numero telefonico'));
   
	
			//verificar la validacion
			if( $this->form_validation->run() === FALSE ){
			   $id= $this->input->get("empresa_id") ? $this->input->get("empresa_id") : $this->input->post("empresa_id");
				$cli_obj= $this->db->get_where("cliente", array("empresa_id" => $id )  )->row();
				   
				$this->load->view('Cliente/edit', array("data" =>  $cli_obj )  ); 
			}else{
				$data =  $this->input->post(  NULL,  true);
				$this->db->where('empresa_id', $this->input->post("empresa_id"));
			   $this->db->update('cliente', $data);
			   $this->load->view("Plantillas/success",  array("title"=>"Registro editado!", "message"=>"Haz editado un registro de cliente"));
			}
		}else{
			$this->load->view("Plantillas/unauthorized");
		}
	}


	 public function delete(){
		if(  $this->user_model->permisos_de_usuario("CLIB")){
			$id= $this->input->get("empresa_id"); 
			$sql= $this->db->delete('cliente',  array('empresa_id' => $id)  ) ;
			 $this->load->view("Plantillas/success",  array("title"=>"Registro borrado!", "message"=>"Haz borrado un registro de Cliente"));	
		}else{
			$this->load->view("Plantillas/unauthorized");
		}
	 }




	 public function list_json(){
		 
			echo json_encode( $this->db->get("cliente"  )->result() );	 
	 }


}
