<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudad extends CI_Controller {

	 
	public function index()
	{
		$this->load->view('Ciudad/index');
	}
}
