<?php

class Personal_model extends CI_Model {

    


    public function __construct(){

        parent::__construct();
        $this->load->database();

    }

    public function add(){ 
        //subir la foto, cedula
			$photo_data= $this->do_upload( "personal_foto1"); 
			//subir la foto, registro de c.
			$photo_data2= $this->do_upload( "personal_foto2"); 
			//obtener los valores del resto de los campos
			$data= $this->input->post(  NULL,  true);
			//Verificar los datos que se guardaran
			if( !array_key_exists( "error", $photo_data ) && !array_key_exists( "error", $photo_data2 )  ){
				//Si existe un error en la subida

				$data['personal_foto1']= "./galeria/personal/".$photo_data['upload_data']['file_name'];
                $data['personal_foto2']= "./galeria/personal/".$photo_data2['upload_data']['file_name'];
               }
               $sql= $this->db->insert('personal', $data);
			 
    }


    public function edit(){ 
        //subir la foto, cedula
			$photo_data= $this->do_upload( "personal_foto1"); 
			//subir la foto, registro de c.
			$photo_data2= $this->do_upload( "personal_foto2"); 
			//obtener los valores del resto de los campos
			$data= $this->input->post(  NULL,  true);
			//Verificar los datos que se guardaran
			if( !array_key_exists( "error", $photo_data ) && !array_key_exists( "error", $photo_data2 )  ){
				//Si existe un error en la subida

				$data['personal_foto1']= "./galeria/personal/".$photo_data['upload_data']['file_name'];
                $data['personal_foto2']= "./galeria/personal/".$photo_data2['upload_data']['file_name'];
			}
            $this->db->where('personal_id', $this->input->post("personal_id"));
            $this->db->update('personal', $data); 
			
			
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

