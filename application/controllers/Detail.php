<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
	
	//Job Medan 
	public function id()
	{	
		//Id Thread
		$id = $this->uri->segment(3);

		// Detail Thread
		$data['detail_thread'] = $this->thread_m->get_thread_by_id($id);

		// var_dump($data);exit();
		$this->load->view('detail_v', $data);
	}
}
