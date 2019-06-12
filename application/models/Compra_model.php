<?php

class Compra_model extends CI_Model {
 
    public function __construct(){

        parent::__construct();
        $this->load->database();

    }

    public function add(){
        $this->load->library("upload_file");

        $data= $this->input->post(  NULL,  true);  
		//guardar foto en galeria
        $photo_data= $this->upload_file->do_upload( "compra_foto", './galeria/compras'); //retorna el nombre del archivo
        
        if( !array_key_exists( "error", $photo_data )  ){
            //guardar compra en bd
            $data['Compra_foto']= "./galeria/compras/".$photo_data['upload_data']['file_name'];
            $sql= $this->db->insert('compras', $data);	
            //actualizar caja chica
            $sql= $this->db->insert('caja_chica', 
            array("Caja_mov" =>"S", "Caja_monto"=>$data['venta_total'], "Caja_obs"=> "Compras varias",
             "Personal_id"=> $data['personal_id'],  "Caja_fecha"=> $data['compra_fecha'] ));
             
            return 1;
        }else{
            return 0;
        }

    }
 


    
 

}


