<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thread_m extends CI_Model {
	var $table = 'd_thread';

	public function get_all_thread() {
		$this->db->order_by('tanggal', 'desc');
		$this->db->from('d_thread');
		$this->db->where('Posting', '1');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_thread() {
		$this->db->order_by('tanggal', 'desc');
		$this->db->from('d_thread');
		$this->db->where('Posting', '0');
		$query = $this->db->get();
		return $query->result();
	}

	public function jumlah_data() {
		$this->db->where('Posting', '1');
		return $this->db->get('d_thread')->num_rows();
	}

	public function data($limit, $start) {
		$this->db->order_by('tanggal', 'desc');
		$this->db->where('Posting', '1');
		$query = $this->db->get('d_thread', $limit, $start);
		return $query;
	}

	public function get_thread_by_id($id) {
		$this->db->from('d_thread');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	// Save Thread Loker
	public function save_thread($data){
		$query	= $this->db->insert('d_thread', $data);

		if (!$query) {
			return false;
		}else{
			return true;
		}
	}

	// Save Edit Thread
	public function edit_thread($where, $data){
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	// Posting Thread
	public function posting($where, $data){
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	// Delete Thread
	public function delete_by_id($id) {
		$this->db->where('id', $id);
		$query = $this->db->delete($this->table);

		if (!$query) {
			return false;
		}else{
			return true;
		}
	}
	
}
