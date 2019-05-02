<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculo extends CI_Controller {

	 
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}



	public function index()
	{
		
		$lista['lista'] = $this->db->get('Vehiculo')->result();
		 
		//var_dump( $lista);
		$this->load->view('Vehiculo/index' ,  $lista);
	}


	public function list(){
		$lista['lista'] = $this->db->get('vehiculo')->result();
		 
		//var_dump( $lista);
		$this->load->view('Vehiculo/list' ,  $lista);
	}


	
	public function create(){

		//mostrar form
			$this->load->helper("form");
			$this->load->library("form_validation");

		//settear reglas de validacion
			$this->form_validation->set_rules("vehiculo_marca", "Marca", "required", array('required' => 'Indique la marca'));
			$this->form_validation->set_rules("vehiculo_chapa", "Chapa", "required", array('required' => 'Ingrese numero de chapa'));
			$this->form_validation->set_rules("vehiculo_anio", "A&ntilde;o", "required", array('required' => 'Indique el a&ntilde;o'));
			///$this->form_validation->set_rules("vehiculo_foto", "Foto", "required", array('required' => 'Cargue una foto'));

		//verificar la validacion
		if( $this->form_validation->run() === FALSE ){
			
			$this->load->view('Vehiculo/create'); 
		}else{

			//subir la foto
			$photo_data= $this->do_upload(); 

			$data= $this->input->post(  NULL,  true);

			if( !array_key_exists( "error", $photo_data ) ){
				$data['vehiculo_foto']= "./galeria/vehiculos/".$photo_data['upload_data']['file_name'];
			}
			
 
			$sql= $this->db->insert('vehiculo', $data);

			$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Se agreg&oacute; un vehiculo "));
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

			$id= $this->input->get("vehiculo_id") ? $this->input->get("vehiculo_id") : $this->input->post("vehiculo_id");
			$cli_obj= $this->db->get_where("vehiculo", array("vehiculo_id" => $id )  )->row();
				
			$this->load->view('Vehiculo/edit', array("data" =>  $cli_obj )  ); 
		 }else{

			
			//subir la foto
			$photo_data= $this->do_upload(); 

			$data= $this->input->post(  NULL,  true);

			if( !array_key_exists( "error", $photo_data ) ){
				$data['vehiculo_foto']= "./galeria/vehiculos/".$photo_data['upload_data']['file_name'];
			}
			
			 $this->db->where('vehiculo_id', $this->input->post("vehiculo_id"));
			$this->db->update('vehiculo', $data);
			$this->load->view("Plantillas/success",  array("title"=>"Registro editado!", "message"=>"Haz editado un registro de vehiculo"));
		 }
		}


	 public function delete(){
	 
		$id= $this->input->get("vehiculo_id"); 
		$sql= $this->db->delete('vehiculo',  array('vehiculo_id' => $id)  ) ;
		 $this->load->view("Plantillas/success",  array("title"=>"Registro borrado!", "message"=>"Haz borrado un registro de Cliente"));
		 //$this->load->view("Plantillas/failure",   array("title"=>"Oops!", "message"=>"Hubo un error al intentar borrar") );
	 }







	 private function do_upload()
	 {
			 $config['upload_path']          = './galeria/vehiculos';
			 $config['allowed_types']        = 'gif|jpg|jpeg|png';
			 $config['max_size']             = 100;
			 $config['max_width']            = 2048;
			 $config['max_height']           = 1536;

			 $this->load->library('upload', $config);

			 if ( ! $this->upload->do_upload('vehiculo_foto'))
			 {
					 $error = array('error' => $this->upload->display_errors()); return $error;
			 }
			 else
			 {
					 $data = array('upload_data' => $this->upload->data()); return $data;
			 }
	 }



	 public function list_json(){
		echo json_encode( $this->db->get("vehiculo"  )->result() );		
	 }


	 public function foto($id){
		$veh_obj= $this->db->get_where("vehiculo", array("vehiculo_id" => $id )  )->row();
		echo "<img src='".$veh_obj->Vehiculo_foto1."' class='img-responsive' />";
	 }

}
