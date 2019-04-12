<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	//Job Medan 
	public function dashboard()
	{	
		if (@$_GET['page'] == "loker") {
			$data['all_thread']	 	= $this->thread_m->get_all_thread();
		}else{
			$data = '';
		}
		$this->load->view('admin_v', $data);
	}
}
