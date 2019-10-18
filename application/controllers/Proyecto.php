<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends CI_Controller {

	 

	public function __construct() {
		parent::__construct();
		$this->load->model("proyecto_model");
	}



	public function index()
	{
		
		if(  $this->user_model->permisos_de_usuario("PROL")){
			$lista= $this->proyecto_model->list();
			$this->load->view('Proyecto/index' ,  array( "lista"=> $lista)      );
		}else{
			$this->load->view("Plantillas/unauthorized");
		}

	
	}

	
	


	



	public function list()
	{//list view
		if(  $this->user_model->permisos_de_usuario("PROL")){
			$lista= $this->proyecto_model->list();
			$this->load->view('Proyecto/index' ,  array( "lista"=> $lista)      );
		}else{
			$this->load->view("Plantillas/unauthorized");
		}


		$lista= $this->proyecto_model->list();	
		$this->load->view('Proyecto/list' , array( "lista"=> $lista)   );
	}

	public function search()
	{//list view
		$lista= $this->proyecto_model->list();
		$this->load->view('Proyecto/list_pro' , array( "lista"=> $lista)   );
	}

	
	
	public function create(){

	 if(  $this->user_model->permisos_de_usuario("PROC")){
			
		//mostrar form
		$this->load->helper("form");
		$this->load->library("form_validation");

	//settear reglas de validacion
		$this->form_validation->set_rules("Ciudad_id", "Ciudad", "required", array('required' => 'Indique una ciudad de referencia'));
		$this->form_validation->set_rules("Vehiculo_id", "Veh&iacute;culo", "required", array('required' => 'Indique un veh&iacute;culo'));
		$this->form_validation->set_rules("Empresa_id", "Cliente", "required", array('required' => 'Indique el cliente'));
		$this->form_validation->set_rules("Tiposervicio_id", "tipo de servicio", "required", array('required' => 'Indique el tipo de servicio'));
		
	//verificar la validacion

		if( $this->form_validation->run() === FALSE ){
			$this->load->view('Proyecto/create'); 
		}else{
			$this->proyecto_model->add(); 
			$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"El proyecto ha sido dado de alta "));
		}
	

	}else{
			$this->load->view("Plantillas/unauthorized");
		}
	}


	 


	 public function edit( ){
		if(  $this->user_model->permisos_de_usuario("PROE")){
				//mostrar form
				$this->load->helper("form");
				$this->load->library("form_validation");

				//settear reglas de validacion
				$this->form_validation->set_rules("Ciudad_id", "Ciudad", "required", array('required' => 'Indique una ciudad de referencia'));
				$this->form_validation->set_rules("Vehiculo_id", "Veh&iacute;culo", "required", array('required' => 'Indique un veh&iacute;culo'));
				$this->form_validation->set_rules("Empresa_id", "Cliente", "required", array('required' => 'Indique el cliente'));
				$this->form_validation->set_rules("Tiposervicio_id", "tipo de servicio", "required", array('required' => 'Indique el tipo de servicio'));
				
				//verificar la validacion

				if( $this->form_validation->run() === FALSE ){
					$id= $this->input->get("proyecto_id") ? $this->input->get("proyecto_id") : $this->input->post("proyecto_id");
					$data= $this->db->get_where("proyectos", array("proyecto_id" => $id )  )->row();
					$this->load->view('Proyecto/edit', array("data"=> $data ) ); 
				}else{
					$this->proyecto_model->edit(); 
					$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Los datos de proyecto han sido modificado "));
				}
	 
		}
		else{  $this->load->view("Plantillas/unauthorized");  }
		
}


	 public function delete(){
		if(  $this->user_model->permisos_de_usuario("PROA")){
			$this->proyecto_model->delete();
			$this->load->view("Plantillas/success",  array("title"=>"Registro borrado!", "message"=>"Haz borrado un registro de Proyecto"));    
		}
		else{ $this->load->view("Plantillas/unauthorized"); }
		 }


	 




		 public function cuadrilla(){
			if(  $this->user_model->permisos_de_usuario("PRMC")){
				
			$this->load->library("form_validation");
			$this->load->helper("form");
			$this->form_validation->set_rules("personal_id[]", "Personal", "required",  array("required" => "Seleccione al menos un personal") );
	
			if( $this->form_validation->run() === FALSE ){
				//CONSULTAR TABLA PERSONAL
				$data= $this->db->get("personal")->result();
				$id_pro= $this->input->get("proyecto_id")?$this->input->get("proyecto_id"):$this->input->post("proyecto_id") ;
				$this->load->view(  'Proyecto/cuadrilla/index',  array("list"=>  $data, "proyecto_id"=> $id_pro)  );
			}else{ 
				$this->proyecto_model->cuadrilla();
				$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Se ha definido una cuadrilla! "));
			}	  
			}else{ $this->load->view("Plantillas/unauthorized"); }
	
	
		}
	
	
	 
	
		public function galeria(){
	
			if(  $this->user_model->permisos_de_usuario("PRGG")){
				$this->load->helper("form");
				//get
				if( $this->input->method() == "get"){
					$id_pro= $this->input->get("proyecto_id")? $this->input->get("proyecto_id"):$this->input->post("proyecto_id") ;
					$this->load->view(  'Galeria/create/create',  array(  "proyecto_id"=> $id_pro)  );
				
				}else{
					$this->proyecto_model->galeria();
					$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Haz agregado una foto al &aacute;lbum de proyecto! "));
				}	
			}
			else{  $this->load->view("Plantillas/unauthorized"); }
		}
	
	
		public function ver_cuadrilla( ){
			if(  $this->user_model->permisos_de_usuario("PRCC")){
				$data= $this->proyecto_model->list_cuadrilla();
			$this->load->view("Proyecto/Cuadrilla/list", array("list"=> $data)  );
			}
			else{ $this->load->view("Plantillas/unauthorized");  } 
		}
	

		 



}
