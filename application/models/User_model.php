<?php

class User_model extends CI_Model {

    


    public function __construct(){

        parent::__construct();
        $this->load->database();

    }

    public function add(){ 
    
        $data= $this->input->post(  NULL,  true); 
        $sql= $this->db->insert('usuario', $data);	
    }


    public function edit(){ 
        $data= $this->input->post(  NULL,  true); 
        $this->db->where("usuario_id", $data['usuario_id']);
        $sql= $this->db->update('usuario', $data);	
    }

    public function del(){ 
        $id= $this->input->get( 'usuario_id'); 
        $sql= $this->db->delete('usuario', array('usuario_id' => $id) );	
    }


    public function enabled(){ 
        $id= $this->input->get( 'usuario_id'); 
        $this->db->where( "usuario_id",   $id);
        $sql= $this->db->update('usuario', array( "usuario_estado" => "A" )     );	
    }

    public function disabled(){ 
        $id= $this->input->get( 'usuario_id'); 
        $this->db->where( "usuario_id",   $id);
        $sql= $this->db->update('usuario', array( "usuario_estado" => "B" )     );	
    }


    public function list(){ 
		$lista= $this->db->select("usuario.Usuario_id,usuario.Usuario_estado, usuario.Usuario_nick,usuario.Usuario_key, personal.Personal_nom, personal.Personal_ape ")->
		from("usuario")->
		join("personal", "personal.Personal_id= usuario.Personal_id","left")-> 
		get()->result_object();
		return $lista;
    }
    

    public function get(){
        $id= $this->input->get("usuario_id") ? $this->input->get("usuario_id") : $this->input->post("usuario_id");
        $_obj= $this->db->get_where("usuario", array("usuario_id" => $id )  )->row();
        return $_obj;
    }


public function asignar_permisos(){

    $pers_ids= $this->input->post("permiso_id")   ;
    $data["Usuario_id"]=  $this->input->post("usuario_id");

    //borrar registros anteriores antes de reasignar 
    $this->db->delete('accesos', array('usuario_id' => $data["Usuario_id"]) );


    foreach( $pers_ids as $per){
        $data["Permiso_id"]=   $per; 
        $sql= $this->db->insert('accesos', $data);						
			}	
}


public function permisos_asignados(){ 
    $lista= $this->db->select("permisos.Permiso_id, permisos.Permiso_nombre, accesos.Permiso_id as acceid")->
		from("usuario")->
        join("accesos", "accesos.Usuario_id= usuario.Usuario_id","right")-> 
        join("permisos", "permisos.Permiso_id=accesos.Permiso_id", "right")->
        get()->result_object(); 
		return $lista;
}
}


