<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_servicio extends CI_Controller {
 
	public function index()
	{
		$this->load->view('Tipo_servicio/index');
	}
}
