<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

 
	 


	
	public function __construct(){
        parent::__construct(); 
        $this->load->model("user_model");
	}



	public function index()
	{
		
		$lista['lista'] = $this->user_model->list(); 
		$this->load->view('User/index' ,  $lista);
	}


	public function list()
	{
		
		$lista['lista'] = $this->user_model->list(); 
		$this->load->view('User/list' ,  $lista);
	}


	public function select_personal(){
		$this->load->model("Personal_model");
		
		//mostrar en tabla
		$lista['lista'] = $this->personal_model->list();
		$this->load->view('User/select_personal' ,  $lista);
	}
	
	public function create(){

		//mostrar form
			$this->load->helper("form");
			$this->load->library("form_validation");

		//settear reglas de validacion
			$this->form_validation->set_rules("Usuario_nick", "Nick de usuario", "required", array('required' => 'Ingrese un nick'));
			$this->form_validation->set_rules("Usuario_key", "Clave de usuario", "required", array('required' => 'Escriba una clave'));
			$this->form_validation->set_rules("Personal_id", "Personal a vincular", "required", array('required' => 'Indique el personal al cual se vincular&aacute; el usuario'));

		//verificar la validacion
		if( $this->form_validation->run() === FALSE ){
			
			$this->load->view('User/create', array("personal_id"=> $this->input->get( 'personal_id') )); 
		}else{ 
            $this->user_model->add();
			$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Se agreg&oacute; un usuario "));
		}
	 }


	 public function edit(){
		 	//mostrar form
		$this->load->helper("form");
		$this->load->library("form_validation");
 
		//settear reglas de validacion
        $this->form_validation->set_rules("Usuario_nick", "Nick de usuario", "required", array('required' => 'Ingrese un nick'));
        $this->form_validation->set_rules("Usuario_key", "Clave de usuario", "required", array('required' => 'Escriba una clave'));
        $this->form_validation->set_rules("personal_id", "Personal a vincular", "required", array('required' => 'Indique el personal al cual se vincular&aacute; el usuario'));

		 //verificar la validacion
		 if( $this->form_validation->run() === FALSE ){
			$_obj= $this->user_model->get( );
			 $this->load->view('User/edit', array("data" =>  $_obj )  ); 
		 }else{
			 $this->user_model->edit();
			$this->load->view("Plantillas/success",  array("title"=>"Registro editado!", "message"=>"Haz editado un registro de usuario"));
		 }
		}


	 public function delete(){
	  
        $this->user_model->del();
		 $this->load->view("Plantillas/success",  array("title"=>"Registro borrado!", "message"=>"Haz borrado un registro de usuario"));
	 }


     public function on(){
     
        $this->user_model->enabled();
		 $this->load->view("Plantillas/success",  array("title"=>"Cambios sobre Usuario!", "message"=>"Haz habilitado al usuario"));
	  }
     


      public function off(){
     
        $this->user_model->disabled();
		 $this->load->view("Plantillas/success",  array("title"=>"Cambios sobre Usuario!", "message"=>"Haz deshabilitado al usuario"));
	  }
     
		 
		public function permisos(){
			$this->load->helper("form");
			$this->load->library("form_validation");
      $this->form_validation->set_rules("permiso_id[]", "Permiso", "required", array('required' => 'Marque al menps un permiso'));
			 
			if( $this->form_validation->run() === FALSE){

				if( $this->input->method() == "get"){
					
					$data['lista']= $this->user_model->permisos_asignados();
					$id = $this->input->get("usuario_id");  $data["usuario_id"]= $id;
					$this->load->view("User/permisos",   $data);

				}else{
					$this->load->view("User/validation",   $data);
				}
			}else{
				$this->user_model->asignar_permisos();
				$this->load->view("Plantillas/success",  array("title"=>"Concesi&oacute;n de permisos!", "message"=>"Permisos asignados al Usuario."));
	  
			}
}

 








	
}
