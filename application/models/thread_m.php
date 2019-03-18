<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thread_m extends CI_Model {
	

	public function get_all_thread() {
		$this->db->from('d_thread');
		$query = $this->db->get();
		return $query->result();
	}

	public function jumlah_data() {
		return $this->db->get('d_thread')->num_rows();
	}

	public function data($limit, $start) {
		$query = $this->db->get('d_thread', $limit, $start);
		return $query;
	}
}
