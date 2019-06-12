<?php

class Galeria_model extends CI_Model {
 
    public function __construct(){

        parent::__construct();
        $this->load->database();

    }

    public function add(){
        $this->load->library("upload_file");

        $data= $this->input->post(  NULL,  true);  
		//guardar foto en galeria
        $photo_data= $this->upload_file->do_upload( "galeria_foto", './galeria/proyectos'); //retorna el nombre del archivo
        
        if( !array_key_exists( "error", $photo_data )  ){
            //guardar foto en bd
            $data['Galeria_foto']= "./galeria/proyectos/".$photo_data['upload_data']['file_name'];
            $sql= $this->db->insert('galeria_proyectos', $data); 
            return 1;
        }else{
            return 0;
        }

    }
 



    
 

}


