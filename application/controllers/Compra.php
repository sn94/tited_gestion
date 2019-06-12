<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compra extends CI_Controller {

	 

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model("compra_model");

	}



		
	private function list_from_db(){ 
		$lista= $this->db->get("compras")->result_object();
		return $lista;
	}

 
 

	public function list(){

		if(  $this->user_model->permisos_de_usuario("COBC")){
			$d= $this->list_from_db();
			$this->load->view("Compra/list",   array("lista"=>    $d  )    );
		}else{
			$this->load->view("Plantillas/unauthorized");
		} 
	}


  public function create(){ 

	if(  $this->user_model->permisos_de_usuario("COFC")){
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
				$estado= $this->Compra_model->add(); 
				
				if( $estado  ){ 
						$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Haz registrado un comprobante de Compra! "));
						$this->load->view("Compra/go_back");
				 }else{
					 //var_dump(  $photo_data); 
					 $this->load->view("Plantillas/failure",  array("title"=>"Existen errores en el formulario!", "message"=>" Revise los campos. Mensaje del error->".$photo_data["error"] )   );
					 $this->load->view("Compra/create");
				 }
			}
		}	
	}else{
		$this->load->view("Plantillas/unauthorized");
	}
}

	  



 


}
