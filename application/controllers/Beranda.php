<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	
	//Job Medan 
	public function index()
	{
		$this->load->view('beranda_v');
	}
}
