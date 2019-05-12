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

	// 
	public function lihat() {
		$id = $this->input->post('id');
		$detail = $this->detail_m->get_all_detail($id);
		
		foreach ($detail as $val) {
			if (is_null($val)) {
				echo '
					<tr>
						<td colspan="4">Data Kosong !!!</td>
					</tr>
				';
			}else {
				echo '
					<tr>
		                <td class="td-no">'.$val->no_id.'</td>
		                <td class="td-uraian">'.$val->uraian.'</td>
		                <td class="td-ket">'.$val->keterangan.'</td>
		                <td>
							<button dataID="'.$val->no_id.'" class="btn btn-primary btn-sm mb-1 editSyarat">
		                      <i class="fa fa-edit"></i>
		                    </button>
		                    <button dataID="'.$val->no_id.'" class="btn btn-danger btn-sm mb-1 hapusSyarat">
		                      <i class="fa fa-trash"></i>
		                    </button>
		                </td>
		            </tr>
				';
			}
		}
	}

	public function save() {
		// var_dump($this->input->post('Tgl'));die();
		$this->form_validation->set_rules('Judul', 'Judul', 'required');
		$this->form_validation->set_rules('Ket', 'Ket', 'required');
		$this->form_validation->set_rules('Tgl', 'Tgl', 'required');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == false) {
			$result['Msg'] = 'Please Fill All Field !!!';
			$result['Status'] = false;
		}else{
			$config['upload_path']		= '././file/img_upload/';
		    $config['allowed_types']	= 'jpg|png';
		    $config['max_size']			= 100;
		    $config['encrypt_name']		= true;

		    $this->upload->initialize($config);
		    $this->load->library('upload', $config);
	        if($this->upload->do_upload("Logo")){
	            $dataimage 	= array('upload_data' => $this->upload->data());
	            $imagename	= $dataimage['upload_data']['file_name']; 

	            $data = [
					'judul_thread' 	=> htmlspecialchars($this->input->post('Judul')),
					'ket_thread' 	=> htmlspecialchars($this->input->post('Ket')),
					'tanggal'		=> $this->input->post('Tgl'),
					'alamat_thread'	=> htmlspecialchars($this->input->post('Alamat')),
					'url_logo'		=> $imagename
				];
				$hasil = $this->thread_m->save_thread($data);

				if($hasil == true){
					$result['Msg'] = 'Data Berhasil Disimpan . . .';
					$result['Status'] = true;
				}else{
					$result['Msg'] = $this->db->error()['message'];
					$result['Status'] = false;
				}

	        }else{
	        	$result['Msg'] = $this->upload->display_errors();
				$result['Status'] = false;
	        }
		}	

		echo json_encode($result);
	}

	public function saveEdit() {

	}
}
