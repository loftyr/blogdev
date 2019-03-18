<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
	
	//Job Medan 
	public function id()
	{	
		//List Thread
		$id = $this->uri->segment(3);
		

		$this->load->view('detail_v', $data);
	}
}
