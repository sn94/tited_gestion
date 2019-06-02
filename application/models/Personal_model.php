<?php

class Personal_model extends CI_Model {

    


    public function __construct(){

        parent::__construct();
        $this->load->database();

    }

    public function add(){ 
        $data= $this->input->post(  NULL,  true); 
        $sql= $this->db->insert('personal', $data);	
    }


    public function edit(){ 
        $data= $this->input->post(  NULL,  true); 
        $this->db->set_where("personal_id", $data['personal_id']);
        $sql= $this->db->update('personal', $data);	
    }

    public function del(){ 
        $id= $this->input->get( 'personal_id'); 
        $sql= $this->db->delete('personal', array('personal_id' => $id) );	
    }

 
 
    public function list(){ 
       return $this->db->get('Personal')->result();
    }
    




    /***
     * PERMISOS
     */
    public function add_permiso(){
        $data= $this->input->post(  NULL,  true); 
        $sql= $this->db->insert('permisos', $data);
    }


    public function del_permiso(){
        $id= $this->input->get( 'permiso_id');  
        $sql= $this->db->delete('permisos',   array('permiso_id' => $id));
    }

    public function up_permiso(){
        $data= $this->input->post(  NULL,  true); 
        $this->db->set_where("permiso_id", $data['permiso_id']);
        $sql= $this->db->update('permisos', $data);	
    }

    public function list_permisos(){
        $Res=$this->db->get("permisos")->result(); return $Res;
    }
    
 

}

