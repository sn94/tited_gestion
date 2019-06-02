<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permiso extends CI_Controller {

 
	 


	
	public function __construct(){
        parent::__construct(); 
        $this->load->model("permiso_model");
	}



	public function index()
	{
		
		$lista['lista'] = $this->permiso_model->list(); 
		$this->load->view('Permiso/index' ,  $lista);
	}


	public function list()
	{
		
		$lista['lista'] = $this->permiso_model->list(); 
		$this->load->view('Permiso/list' ,  $lista);
	}
 



	public function create(){

		//mostrar form
			$this->load->helper("form");
			$this->load->library("form_validation");

		//settear reglas de validacion
			$this->form_validation->set_rules("permiso_nombre", "Descripcion", "required", array('required' => 'Ingrese una descripci&oacute;n'));
		 
		//verificar la validacion
		if( $this->form_validation->run() === FALSE ){
			
			$this->load->view('Permiso/create', array("permiso_id"=> $this->input->get( 'permiso_id') )); 
		}else{ 
            $this->permiso_model->add();
			$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Se agreg&oacute; un permiso "));
		}
	 }


	 public function edit(){
		 	//mostrar form
		$this->load->helper("form");
		$this->load->library("form_validation");
 
		//settear reglas de validacion
		$this->form_validation->set_rules("Permiso_nombre", "Descripcion", "required", array('required' => 'Ingrese una descripci&oacute;n'));
		
		 //verificar la validacion
		 if( $this->form_validation->run() === FALSE ){
				 
			$_obj= $this->permiso_model->get();
				
			 $this->load->view('Permiso/edit', array("data" =>  $_obj )  ); 
		 }else{
			 $this->permiso_model->update();
			$this->load->view("Plantillas/success",  array("title"=>"Registro editado!", "message"=>"Cambiaste la descripci&oacute;n de permiso"));
		 }
		}


	 public function delete(){
		
		//verificar usos del permiso
    $this->permiso_model->del();
		 $this->load->view("Plantillas/success",  array("title"=>"Registro borrado!", "message"=>"Haz borrado un permiso"));
	 }
  
}
