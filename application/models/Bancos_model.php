<?php

class Bancos_model extends CI_Model {
 
    public function __construct(){

        parent::__construct();
        $this->load->database();

    }

    public function add(){ 
        $data= $this->input->post(  NULL,  true);
            //actualizar cuenta banc.
        $sql= $this->db->insert('cuenta_banc',  $data); 

    }


    public function list(){ 

        $data= $this->db->select("cuenta_banc.Cuenta_mov,cuenta_banc.Cuenta_monto,cuenta_banc.Cuenta_obs, cuenta_banc.Cuenta_fecha, personal.Personal_nom,personal.Personal_ape")
        ->from("cuenta_banc")->join("personal","personal.personal_id=cuenta_banc.personal_id")->get()->result();
        return $data;
    }
    



    
 

}


