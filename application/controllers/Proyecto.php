<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends CI_Controller {

	 

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}



	public function index()
	{
		$lista= $this->list_from_db();
		$this->load->view('Proyecto/index' ,  array( "lista"=> $lista)      );
	}


	public function cuadrilla(){
		$this->load->view(  'Proyecto/cuadrilla');
	}




	
	private function list_from_db(){
		$lista= $this->db->select('proyectos.Proyecto_id,proyectos.Proyecto_fecha_ini,proyectos.Proyecto_fecha_fin,
		proyectos.Proyecto_hora_ini,proyectos.Proyecto_hora_fin,proyectos.Proyecto_fecha,proyectos.Proyecto_estado,
		ciudad.Ciudad_nom, vehiculo.Vehiculo_marca,vehiculo.Vehiculo_modelo, cliente.Empresa_razon, tipo_servicio.Tiposervicio_des, 
		personal.Personal_id,personal.Personal_nom,personal.Personal_ape')
		->from('proyectos')
		->join('ciudad', 'ciudad.ciudad_id=proyectos.ciudad_id', 'left')
		->join('vehiculo','vehiculo.vehiculo_id=proyectos.vehiculo_id', 'left')
		->join('cliente','cliente.Empresa_id=proyectos.Empresa_id', 'left')
		->join('tipo_servicio','tipo_servicio.tiposervicio_id=proyectos.tiposervicio_id', 'left')
		->join('personal','personal.personal_id=proyectos.personal_id', 'left')
		->get()->result_object();
		return $lista;
	}


	public function list()
	{
		$lista= $this->list_from_db();	
		$this->load->view('Proyecto/list' , array( "lista"=> $lista)   );
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

			//subir la foto, cedula
			/*$photo_data= $this->do_upload( "personal_foto1"); 
			//subir la foto, registro de c.
			$photo_data2= $this->do_upload( "personal_foto2"); 
			//obtener los valores del resto de los campos
			$data= $this->input->post(  NULL,  true);
			//Verificar los datos que se guardaran
			if( !array_key_exists( "error", $photo_data ) && !array_key_exists( "error", $photo_data2 )  ){
				//Si existe un error en la subida

				$data['personal_foto1']= "./galeria/personal/".$photo_data['upload_data']['file_name'];
				$data['personal_foto2']= "./galeria/personal/".$photo_data2['upload_data']['file_name'];
			}
			*/
			//obtener los valores del resto de los campos
			$data= $this->input->post(  NULL,  true);
			$sql= $this->db->insert('proyectos', $data);

			$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"El proyecto ha sido dado de alta "));
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

			//subir la foto, cedula
			$photo_data= $this->do_upload( "personal_foto1"); 
			//subir la foto, registro de c.
			$photo_data2= $this->do_upload( "personal_foto2"); 
			//obtener los valores del resto de los campos
			$data= $this->input->post(  NULL,  true);
			//Verificar los datos que se guardaran
			if( !array_key_exists( "error", $photo_data ) && !array_key_exists( "error", $photo_data2 )  ){
				//Si existe un error en la subida

				$data['personal_foto1']= "./galeria/personal/".$photo_data['upload_data']['file_name'];
				$data['personal_foto2']= "./galeria/personal/".$photo_data2['upload_data']['file_name'];
			}
			
			
			 $this->db->where('personal_id', $this->input->post("personal_id"));
			$this->db->update('personal', $data);
			$this->load->view("Plantillas/success",  array("title"=>"Registro editado!", "message"=>"Haz editado un registro de personal"));
		 }
		}


	 public function delete(){
	 
		$id= $this->input->get("personal_id"); 
		$sql= $this->db->delete('personal',  array('personal_id' => $id)  ) ;
		 $this->load->view("Plantillas/success",  array("title"=>"Registro borrado!", "message"=>"Haz borrado un registro de Personal"));
		 //$this->load->view("Plantillas/failure",   array("title"=>"Oops!", "message"=>"Hubo un error al intentar borrar") );
	 }


	 







}
