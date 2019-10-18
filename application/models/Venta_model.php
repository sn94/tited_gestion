<?php

class Venta_model extends CI_Model {
 
    public function __construct(){

        parent::__construct();
        $this->load->database();

    }

    public function add(){ 

        $data= $this->input->post(  NULL,  true);  
        
        $cabecera= array("Personal_id"=>$data['Personal_id'],  "Venta_nro_fac"=> $data['Venta_nro_fac'], "Venta_tipo"=>$data['Venta_tipo'], "Venta_total"=>$data['Venta_total'] );
        $detalle= array();
        $sql= $this->db->insert('venta', $data);
        return 1;
    }


    public function list(){ 
		$lista= $this->db->select("venta.Venta_fecha,cliente.Empresa_razon, venta.Venta_foto")->
		from("venta")->
		join("proyectos", "venta.Proyecto_id= proyectos.Proyecto_id","left")->
		join("cliente", "cliente.Empresa_id=proyectos.Empresa_id", "left")->
		get()->result_object();
		return $lista;
    }
    



    
 

}


