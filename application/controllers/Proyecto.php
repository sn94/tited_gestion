<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends CI_Controller {

	 

	public function __construct() {
		parent::__construct();
		$this->load->model("proyecto_model");
	}



	public function index()
	{
		$lista= $this->proyecto_model->list();
		$this->load->view('Proyecto/index' ,  array( "lista"=> $lista)      );
	}

	
	


	



	public function list()
	{//list view
		$lista= $this->proyecto_model->list();	
		$this->load->view('Proyecto/list' , array( "lista"=> $lista)   );
	}

	public function search()
	{//list view
		$lista= $this->proyecto_model->list();
		$this->load->view('Proyecto/list_pro' , array( "lista"=> $lista)   );
	}

	
	
	public function create(){

	 
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
		

	 }


	 

	public function cuadrilla(){
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
	}


 

	public function galeria(){

		$this->load->helper("form");
		if( $this->input->method()=="get"){
			$this->load->view("Galeria/create/create");
		}else{
			if($this->proyecto_model->galeria()){
				$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Foto agregada a galeria! "));
			}else{
				$this->load->view("Plantillas/failure",  array("title"=>"Error al grabar!", "message"=>"Es posible que algunas caracteristicas del archivo no estan permitidas "));
			
			}
		}
		
	}


	public function ver_cuadrilla( ){
		$data= $this->proyecto_model->list_cuadrilla();
		$this->load->view("Proyecto/Cuadrilla/lista", array("lista"=> $data)  );
	}




	 public function edit(){
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
	 

}


	 public function delete(){
	 
		$id= $this->input->get("personal_id"); 
		$sql= $this->db->delete('personal',  array('personal_id' => $id)  ) ;
		 $this->load->view("Plantillas/success",  array("title"=>"Registro borrado!", "message"=>"Haz borrado un registro de Personal"));
		 //$this->load->view("Plantillas/failure",   array("title"=>"Oops!", "message"=>"Hubo un error al intentar borrar") );
	 }


	 






	 private function do_upload(  $fieldname)
	 {
			 $config['upload_path']          = './galeria/proyectos';
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
