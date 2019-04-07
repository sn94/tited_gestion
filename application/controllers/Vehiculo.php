<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculo extends CI_Controller {

	 
	public function index()
	{
		$this->load->view('Vehiculo/index');
	}
}
