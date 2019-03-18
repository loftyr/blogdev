<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	
	//Job Medan 
	public function index()
	{	
		// Konfig Pagination
		$config['base_url'] = base_url().'beranda/index';
		$config['total_rows'] = $this->thread_m->jumlah_data();
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;
		$pilih = $config['total_rows'] / $config["per_page"];
		$config['num_links'] = floor($pilih);

		// Style Pagination
		$config['first_link']		= "First";
		$config['last_link']		= "Last";
		$config['next_link']		= "Next";
		$config['prev_link']		= "Prev";
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']	= '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // List pagination
        $data['data'] = $this->thread_m->data($config['per_page'], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        // List Data Thread
		$data['d_thread'] = $this->thread_m->get_all_thread();
		$this->load->view('beranda_v', $data);
	}
}
