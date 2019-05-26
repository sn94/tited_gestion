<?php

class Proyecto_model extends CI_Model {

    public $title;
    public $content;
    public $date;


    public function __construct(){


        $this->load->database();

    }

    public function add(){
        
		//obtener los valores del resto de los campos
		$data= $this->input->post(  NULL,  true);
		$sql= $this->db->insert('proyectos', $data); 

    }


		public function cuadrilla(){
			$pers_ids= $this->input->post("personal_id")   ;
			$data["Proyecto_id"]=  $this->input->post("proyecto_id");
			foreach( $pers_ids as $per){
				$data["Personal_id"]=   $per;
				//guardar
				$sql= $this->db->insert('cuadrilla', $data);						
			}	}


		public function list_cuadrilla(){
		return $proyecto_id= $this->input->get("proyecto_id");
		$data= $this->db->select("personal.Personal_ci,personal.Personal_nom,personal.Personal_ape")->from("personal")
		->join("cuadrilla", "personal.personal_id=cuadrilla.personal_id")
		->join("proyectos","proyectos.proyecto_id=cuadrilla.proyecto_id")->where("proyectos.proyecto_id", $proyecto_id )->get()->result();


		}


		public function galeria(){
			$this->load->library("upload_file");

			$data= $this->input->post(  NULL,  true);  
	//guardar foto en galeria
			$photo_data= $this->upload_file->do_upload( "galeria_foto", './galeria/proyectos'); //retorna el nombre del archivo
			
			if( !array_key_exists( "error", $photo_data )  ){
					//guardar venta en bd
					$sql= $this->db->insert('galeria_proyectos', $data);	 
					return 1;
			}else{
					return 0;
			}
		}

	public function list(){
		$lista= $this->db->select('proyectos.Proyecto_id,proyectos.Proyecto_fecha_ini,proyectos.Proyecto_fecha_fin,
		proyectos.Proyecto_hora_ini,proyectos.Proyecto_hora_fin,proyectos.Proyecto_fecha,proyectos.Proyecto_estado,
		ciudad.Ciudad_nom, vehiculo.Vehiculo_marca,vehiculo.Vehiculo_modelo, cliente.Empresa_razon, tipo_servicio.Tiposervicio_des, 
		personal.Personal_id,personal.Personal_nom,personal.Personal_ape')
		->from('proyectos')
		->join('ciudad', 'ciudad.ciudad_id=proyectos.ciudad_id', 'left')
		->join('vehiculo','vehiculo.vehiculo_id=proyectos.vehiculo_id', 'left')
		->join('cliente','cliente.Empresa_id=proyectos.Empresa_id', 'left')
		->join('tipo_servicio','tipo_servicio.tiposervicio_id=proyectos.tiposervicio_id', 'left')
		->join('personal','personal.personal_id=proyectos.personal_id', 'left')
		->where("proyectos.Proyecto_estado<>'C'")
		->get()->result_object();
		return $lista;
	}
    



    
 

}


