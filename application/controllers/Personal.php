<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {

	 
	public function __construct(){
		parent::__construct();
		$this->load->database();
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


	
	public function create(){

		/*$lista['lista'] = $this->db->select('ciudad.ciudad_id,ciudad.ciudad_nom,departamento.departamento_nom, ciudad.ciudad_readonly')->
		from('ciudad')->join('departamento', 'ciudad.departamento_id=departamento.departamento_id', 'left')->order_by('ciudad.ciudad_readonly', "ASC")->get()->result_object();
		
		 $this->load->view("Ciudad/buscador", $lista);
*/
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
			
			$this->load->view('Personal/create'); 
		}else{

			//subir la foto
			$photo_data= $this->do_upload(); 

			$data= $this->input->post(  NULL,  true);

			if( !array_key_exists( "error", $photo_data ) ){
				$data['personal_foto1']= "./galeria/personal/".$photo_data['upload_data']['file_name'];
			}
			
 
			$sql= $this->db->insert('personal', $data);

			$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Se agreg&oacute; un personal "));
		}
	 }


	 public function edit(){
		 	//mostrar form
			 $this->load->helper("form");
			 $this->load->library("form_validation");
 
		 //settear reglas de validacion 
		 $this->form_validation->set_rules("vehiculo_marca", "Marca", "required", array('required' => 'Indique la marca'));
		 $this->form_validation->set_rules("vehiculo_chapa", "Chapa", "required", array('required' => 'Ingrese numero de chapa'));
		 $this->form_validation->set_rules("vehiculo_anio", "A&ntilde;o", "required", array('required' => 'Indique el a&ntilde;o'));

 
		 //verificar la validacion
		 if( $this->form_validation->run() === FALSE ){

			$id= $this->input->get("personal_id") ? $this->input->get("personal_id") : $this->input->post("personal_id");
			$cli_obj= $this->db->get_where("personal", array("personal_id" => $id )  )->row();
				
			$this->load->view('Personal/edit', array("data" =>  $cli_obj )  ); 
		 }else{

			
			//subir la foto
			$photo_data= $this->do_upload(); 

			$data= $this->input->post(  NULL,  true);

			if( !array_key_exists( "error", $photo_data ) ){
				$data['personal_foto1']= "./galeria/personal/".$photo_data['upload_data']['file_name'];
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







	 private function do_upload()
	 {
			 $config['upload_path']          = './galeria/personal';
			 $config['allowed_types']        = 'gif|jpg|jpeg|png';
			 $config['max_size']             = 100;
			 $config['max_width']            = 2048;
			 $config['max_height']           = 1536;

			 $this->load->library('upload', $config);

			 if ( ! $this->upload->do_upload('personal_foto1'))
			 {
					 $error = array('error' => $this->upload->display_errors()); return $error;
			 }
			 else
			 {
					 $data = array('upload_data' => $this->upload->data()); return $data;
			 }
	 }


}
