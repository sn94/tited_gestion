<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudad extends CI_Controller {

	 

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}



	public function index()
	{
		
		$lista['lista'] = $this->db->select('ciudad.ciudad_id,ciudad.ciudad_nom,departamento.departamento_nom, ciudad.ciudad_readonly')->
		from('ciudad')->join('departamento', 'ciudad.departamento_id=departamento.departamento_id')->order_by('ciudad.ciudad_readonly')->get()->result_object();
		//var_dump( $lista);
		$this->load->view('Ciudad/index' ,  $lista);
	}


	public function create(){
		$data = array(
			'title' => 'My title',
			'name' => 'My Name',
			'date' => 'My date'
	);
		$sql= $this->db->insert('ciudad', $data);
	}
}
