<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta extends CI_Controller {

	 

	public function __construct() {
		parent::__construct();
		$this->load->model("Venta_model");
	}



	public function index()
	{
		$lista= $this->list_projects();
		$this->load->view('Venta/index' ,  array( "lista"=> $lista)      );
	}

	
	



	private function list_projects(){
        $lista= $this->db->select("proyectos.Proyecto_id,proyectos.Proyecto_fecha_ini,proyectos.Proyecto_fecha_fin,
		proyectos.Proyecto_hora_ini,proyectos.Proyecto_hora_fin,proyectos.Proyecto_fecha, IF(proyectos.Proyecto_estado='P','PENDIENTE','TERMINADO') as Proyecto_estado,
		ciudad.Ciudad_nom, vehiculo.Vehiculo_marca,vehiculo.Vehiculo_modelo, cliente.Empresa_razon, tipo_servicio.Tiposervicio_des, 
		personal.Personal_id,personal.Personal_nom,personal.Personal_ape")
		->from('proyectos')
		->join('ciudad', 'ciudad.ciudad_id=proyectos.ciudad_id', 'left')
		->join('vehiculo','vehiculo.vehiculo_id=proyectos.vehiculo_id', 'left')
		->join('cliente','cliente.Empresa_id=proyectos.Empresa_id', 'left')
		->join('tipo_servicio','tipo_servicio.tiposervicio_id=proyectos.tiposervicio_id', 'left')
		->join('personal','personal.personal_id=proyectos.personal_id', 'left')
		->get()->result_object();
		return $lista;
	}


	
	 
 

	public function list(){
		$d= $this->Venta_model->list();
		$this->load->view("Venta/list",   array("lista"=>    $d  )    );
	}


	public function create(){ 
		$this->load->helper("form");
		$this->load->library("form_validation");
		//reglas
		$this->form_validation->set_rules("venta_fecha", "Fecha de factura", "required",  array("required" => "Indique la fecha de factura") );
		$this->form_validation->set_rules("venta_total", "Total de factura", "required",  array("required" => "Indique el Monto total") );
		$this->form_validation->set_rules("venta_nro_fac", "N n&uacute;mero de factura", "required",  array("required" => "Indique el n&uacute;mero de factura") );



		//get
		if( $this->input->method() == "get"){
			$id_pro= $this->input->get("proyecto_id")?$this->input->get("proyecto_id"):$this->input->post("proyecto_id") ;
			$this->load->view(  'Venta/create',  array(  "proyecto_id"=> $id_pro)  );
		
		}else{
			//post
			if( $this->form_validation->run()===  FALSE){ 
				$this->load->view("Venta/create");
			}else{
				
				$estado= $this->Venta_model->add();
				if( $estado  ){
						//preparar mensaje json
						$this->load->view("Plantillas/success",  array("title"=>"Registro guardado!", "message"=>"Haz registrado un comprobante de venta! "));
						$this->load->view("Venta/go_back");
				 }else{
					 //var_dump(  $photo_data); 
					 $this->load->view("Plantillas/failure",  array("title"=>"Existen errores en el formulario!", "message"=>" Revise los campos." )   );
					 $this->load->view("Venta/create");
				 }
			}
		}		
			
	}
 




	 




}
