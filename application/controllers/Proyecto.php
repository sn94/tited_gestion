<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends CI_Controller {

	 
	public function index()
	{
		$this->load->view('Proyecto/index');
	}


	public function cuadrilla(){
		$this->load->view(  'Proyecto/cuadrilla');
	}


}
