<?php

class Permiso_model extends CI_Model {

    


    public function __construct(){

        parent::__construct();
        $this->load->database();

    }

    public function add(){ 
    
        $data= $this->input->post(  NULL,  true); 
        $sql= $this->db->insert('permisos', $data);	
    }


    public function update(){ 
        $data= $this->input->post(  NULL,  true); 
        $this->db->where("permiso_id", $data['Permiso_id']);
        $sql= $this->db->update('permisos', $data);	
    }

    public function del(){ 
        $id= $this->input->get( 'permiso_id'); 
        $sql= $this->db->delete('permisos', array('permiso_id' => $id) );	
    }
 
    public function get(){
        $id= $this->input->get("permiso_id") ? $this->input->get("permiso_id") : $this->input->post("permiso_id");
        $_obj= $this->db->get_where("permisos", array("permiso_id" => $id )  )->row(); 
        return $_obj;
    }

    public function list(){
        $Res=$this->db->get("permisos")->result(); return $Res;
    }

}


