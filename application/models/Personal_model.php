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

 
    public function get( $id){
         $this->db->select('personal.personal_id,personal.personal_nom,personal.personal_ape,personal.personal_ci,personal.personal_cel,personal.personal_tel,personal.personal_dir,personal.personal_email,personal.personal_fecha_nac,personal.personal_foto1,personal.personal_foto2,ciudad.ciudad_id,ciudad.ciudad_nom');
        $this->db->from('personal');
        $this->db->join("ciudad", "ciudad.ciudad_id=personal.ciudad_id" ,"left");
        $this->db->where('personal.personal_id', $id);  
        $data= $this->db->get()->row();  return $data;
    }
 
    public function getWithoutId(){
        $id= $this->input->get("personal_id") ? $this->input->get("personal_id") : $this->input->post("personal_id");
        $data= $this->get($id);  return $data;
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

