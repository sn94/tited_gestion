<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compra extends CI_Controller {

	 

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}



		
	private function list_from_db(){ 
		$lista= $this->db->get("compras")->result_object();
		return $lista;
	}

 
 

	public function list(){
		$d= $this->list_from_db();
		$this->load->view("Compra/list",   array("lista"=>    $d  )    );
	}


  public function create(){ 
		$this->load->helper("form");
		$this->load->library("form_validation");
		//reglas
		$this->form_validation->set_rules("compra_fecha", "Fecha de factura", "required",  array("required" => "Indique la fecha de factura") );
		$this->form_validation->set_rules("compra_total", "Total de factura", "required",  array("required" => "Indique el Monto total") );
		$this->form_validation->set_rules("compra_nro_fac", "N n&uacute;mero de factura", "required",  array("required" => "Indique el n&uacute;mero de factura") );



		//get
		if( $this->input->method() == "get"){
			$this->load->view(  'Compra/create' );
		
		}else{
			//post
			if( $this->form_validation->run()===  FALSE){ 
				$this->load->view("Compra/create");
			}else{
				$data= $this->input->post(  NULL,  true);  
			
				//guardar foto en galeria
				$photo_data= $this->do_upload(  "compra_foto"); //retorna el nombre del archivo
				if( !array_key_exists( "error", $photo_data )  ){
						//Si existe un error en la subida
						$data['Compra_foto']= "./galeria/compras/".$photo_data['upload_data']['file_name'];
						//guardar en bd
						$sql= $this->db->insert('compras', $data);	 
						//preparar mensaje json
						$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Haz registrado un comprobante de Compra! "));
						$this->load->view("Compra/go_back");
				 }else{
					 //var_dump(  $photo_data); 
					 $this->load->view("Plantillas/failure",  array("title"=>"Existen errores en el formulario!", "message"=>" Revise los campos. Mensaje del error->".$photo_data["error"] )   );
					 $this->load->view("Compra/create");
				 }
			}
		}		
			
	}

	  






	 private function do_upload(  $fieldname)
	 {
			 $config['upload_path']          = './galeria/compras';
			 $config['allowed_types']        = 'gif|jpg|jpeg|png';
			 $config['max_size']             = 500;
			 $config['max_width']            = 3072;//1024 * 3
			 $config['max_height']           = 3072; 

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
