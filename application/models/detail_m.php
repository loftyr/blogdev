<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_m extends CI_Model {
	

	public function get_all_detail($id) {
		$this->db->from('syarat_thread');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	
}
