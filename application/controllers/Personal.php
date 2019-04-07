<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {

	 
	public function index()
	{
		$this->load->view('Personal/index');
	}
}
