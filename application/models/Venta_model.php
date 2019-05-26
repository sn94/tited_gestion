<?php

class Venta_model extends CI_Model {

    public $title;
    public $content;
    public $date;


    public function __construct(){


        $this->load->database();

    }

    public function add(){
        $this->load->library("upload_file");

        $data= $this->input->post(  NULL,  true);  
		//guardar foto en galeria
        $photo_data= $this->upload_file->do_upload( "venta_foto", './galeria/ventas'); //retorna el nombre del archivo
        
        if( !array_key_exists( "error", $photo_data )  ){
            //guardar venta en bd
            $sql= $this->db->insert('venta', $data);	
            //actualizar cuenta banc.
            $sql= $this->db->insert('cuenta_banc', 
            array("Cuenta_mov" =>"E", "Cuenta_monto"=>$data['venta_total'], "Cuenta_fecha"=>"CURRENT_DATE",
            "Cuenta_fecha_reg"=>"CURRENT_DATE", "Cuenta_hora_reg"=>"CURRENT_TIME", "Personal_id"=> $data['personal_id']));
            //cambiar estado de proyecto a COBRADO
            $this->db->set("Proyecto_estado", "C");
            $this->db->where('Proyecto_id', $data['proyecto_id']);
            $sql2= $this->db->update('proyectos'); 
            return 1;
        }else{
            return 0;
        }

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

