<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

 
	 


	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}



	public function index()
	{
		
		$lista['lista'] = $this->db->get('cliente')->result();
		 
		//var_dump( $lista);
		$this->load->view('Cliente/index' ,  $lista);
	}


	public function list(){
		$lista['lista'] = $this->db->get('cliente')->result();
		 
		//var_dump( $lista);
		$this->load->view('Cliente/list' ,  $lista);
	}


	
	public function create(){

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
	 }


	 public function edit(){
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
		}


	 public function delete(){
	 
		$id= $this->input->get("empresa_id"); 
		$sql= $this->db->delete('cliente',  array('empresa_id' => $id)  ) ;
		 $this->load->view("Plantillas/success",  array("title"=>"Registro borrado!", "message"=>"Haz borrado un registro de Cliente"));
		 //$this->load->view("Plantillas/failure",   array("title"=>"Oops!", "message"=>"Hubo un error al intentar borrar") );
	 }




}
