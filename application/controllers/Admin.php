<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	//Job Medan 
	public function dashboard()
	{	
		if (@$_GET['page'] == "data-anggota") {
			$data['all_anggota'] = $this->anggota_model->get_all_anggota();
		}else{
			$data = '';
		}
		$this->load->view('admin_v', $data);
	}
}
