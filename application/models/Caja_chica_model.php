<?php

class Caja_chica_model extends CI_Model {
 
    public function __construct(){

        parent::__construct();
        $this->load->database();

    }

    public function add(){ 
        $data= $this->input->post(  NULL,  true); 
        $sql= $this->db->insert('caja_chica',  $data); 

    }


    public function list(){ 

        $data= $this->db->select("caja_chica.Caja_mov,caja_chica.Caja_monto,caja_chica.Caja_obs, caja_chica.Caja_fecha, personal.Personal_nom,personal.Personal_ape")
        ->from("caja_chica")->join("personal","personal.personal_id=caja_chica.personal_id")->get()->result();
        return $data;
    }
    



    
 

}


