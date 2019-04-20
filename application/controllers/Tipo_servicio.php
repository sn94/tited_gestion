<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_servicio extends CI_Controller {
 

	
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}



	public function index()
	{
		
		$lista['lista'] = $this->db->get("Tipo_servicio")->result_object();
		 
		//var_dump( $lista);
		$this->load->view('Tipo_servicio/index' ,  $lista);
	}


	public function list()
	{
		
		$lista['lista'] = $this->db->get("Tipo_servicio")->result_object();
		//var_dump( $lista);
		$this->load->view('Tipo_servicio/list' ,  $lista);
	}



	public function create(){

		//mostrar form
			$this->load->helper("form");
			$this->load->library("form_validation");

		//settear reglas de validacion
			$this->form_validation->set_rules("tiposervicio_des", "Descripcion", "required", array('required' => 'Ingrese una descripcion valida'));

		//verificar la validacion
		if( $this->form_validation->run() === FALSE ){
			
			$this->load->view('Tipo_servicio/create'); 
		}else{
			$data =   $this->input->post( NULL, true) ;
			$sql= $this->db->insert('Tipo_servicio', $data);
			$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Se registr&oacute; un servicio "));
		}
	 }


	 public function edit(){
		 	//mostrar form
			 $this->load->helper("form");
			 $this->load->library("form_validation");
 
		 //settear reglas de validacion
		 $this->form_validation->set_rules("tiposervicio_des", "Descripcion", "required", array('required' => 'Ingrese una descripcion valida'));

 
		 //verificar la validacion
		 if( $this->form_validation->run() === FALSE ){
			 $id= $this->input->get("Tiposervicio_id") ? $this->input->get("Tiposervicio_id") : $this->input->post("Tiposervicio_id");
			 $ciu_obj= $this->db->get_where("Tipo_servicio", array("Tiposervicio_id" =>  $id )  )->row();
				
			 $this->load->view('Tipo_servicio/edit', array("data" =>  $ciu_obj )  ); 
		 }else{
			 $data =    $this->input->post(  NULL, true) ;
			 $this->db->where('Tiposervicio_id', $this->input->post("Tiposervicio_id"));
			$this->db->update('Tipo_servicio', $data);
			$this->load->view("Plantillas/success",  array("title"=>"Registro editado!", "message"=>"Haz editado un registro"));
		 }
		}


	 public function delete(){
	 
		$id= $this->input->get("Tiposervicio_id"); 
		$sql= $this->db->delete('Tipo_servicio',  array('Tiposervicio_id' => $id)  ) ;
		 $this->load->view("Plantillas/success",  array("title"=>"Registro borrado!", "message"=>"Haz borrado registro de un servicio"));
		 //$this->load->view("Plantillas/failure",   array("title"=>"Oops!", "message"=>"Hubo un error al intentar borrar") );
	 }


}
