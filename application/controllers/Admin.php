<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	//Job Medan 
	public function dashboard()
	{	
		if (@$_GET['page'] == "loker") {
			$data['all_thread']	 	= $this->thread_m->get_all_thread();
			$data['data_thread']			= $this->thread_m->get_thread();
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
		$this->form_validation->set_rules('Judul', 'Judul', 'required');
		$this->form_validation->set_rules('Ket', 'Ket', 'required');
		$this->form_validation->set_rules('Tgl', 'Tgl', 'required');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('Link', 'Link', 'required');

		
		if ($this->form_validation->run() == false) {
			$result['Msg'] = 'Please Fill All Field !!!';
			$result['Status'] = false;
		}else{
			$config['upload_path']		= '././file/img_upload/';
		    $config['allowed_types']	= 'jpg|png';
		    $config['max_size']			= 1000;
		    $config['encrypt_name']		= true;

		    $this->upload->initialize($config);
	        if($this->upload->do_upload("Logo")){
	        	$dataimage 	= array('upload_data' => $this->upload->data());
		        $imagename	= $dataimage['upload_data']['file_name']; 
	        	$config2['upload_path']		= '././file/brosur_upload/';
			    $config2['allowed_types']	= 'jpg|png';
			    $config2['max_size']		= 2500;
			    $config2['encrypt_name']	= true;

			    $this->upload->initialize($config2);
			    if($this->upload->do_upload("Brosur")){

			    	$databrosur 	= array('upload_data' => $this->upload->data());
		            $imagebrosur	= $databrosur['upload_data']['file_name']; 

		            $data = [
						'judul_thread' 	=> htmlspecialchars($this->input->post('Judul')),
						'ket_thread' 	=> htmlspecialchars($this->input->post('Ket')),
						'tanggal'		=> $this->input->post('Tgl').' '.date('H:i:s'),
						'alamat_thread'	=> htmlspecialchars($this->input->post('Alamat')),
						'url_logo'		=> $imagename,
						'url_brosur'	=> $imagebrosur,
						'Posting' 		=> 1,
                        'link_website'  => htmlspecialchars($this->input->post('Link'))
					];
					$hasil = $this->thread_m->save_thread($data);

					if($hasil == true){
						$result['Msg'] = 'Data Berhasil Disimpan . . .';
						$result['Status'] = true;
					}else{
						$result['Msg'] 		= $this->db->error()['message'];
						$result['Status'] 	= false;
					}

			    }else{
			    	$data = [
						'judul_thread' 	=> htmlspecialchars($this->input->post('Judul')),
						'ket_thread' 	=> htmlspecialchars($this->input->post('Ket')),
						'tanggal'		=> $this->input->post('Tgl').' '.date('H:i:s'),
						'alamat_thread'	=> htmlspecialchars($this->input->post('Alamat')),
						'url_logo'		=> $imagename,
						'url_brosur'	=> NULL,
						'Posting' 		=> 1,
                        'link_website'  => htmlspecialchars($this->input->post('Link'))
					];
					$hasil = $this->thread_m->save_thread($data);

					if($hasil == true){
						$result['Msg'] = 'Data Berhasil Disimpan . . .';
						$result['Status'] = true;
					}else{
						$result['Msg'] 		= $this->db->error()['message'];
						$result['Status'] 	= false;
					}
			    }
	        }else{
	        	$result['Msg'] = $this->upload->display_errors();
				$result['Status'] = false;
	        }
		}	
	
		echo json_encode($result);
	}

	public function saveEdit() {
		$id = $this->input->post('id');

		$this->db->where('id', $id);
		$linkImage 	= $this->db->get('d_thread')->row('url_logo');

		$this->db->where('id', $id);
		$linkBrosur = $this->db->get('d_thread')->row('url_brosur');

		$this->form_validation->set_rules('Judul', 'Judul', 'required');
		$this->form_validation->set_rules('Ket', 'Ket', 'required');
		$this->form_validation->set_rules('Tgl', 'Tgl', 'required');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'required');
		
		// Setting Config Upload Logo
		$config['upload_path']		= '././file/img_upload/';
	    $config['allowed_types']	= 'jpg|png';
	    $config['max_size']			= 1000;
	    $config['encrypt_name']		= true;

		// Setting Config Upload Brosur
    	$config2['upload_path']		= '././file/brosur_upload/';
	    $config2['allowed_types']	= 'jpg|png';
	    $config2['max_size']		= 2500;
	    $config2['encrypt_name']	= true;

		if ($this->form_validation->run() == false) {
			$result['Msg'] = 'Please Fill All Field !!!';
			$result['Status'] = false;
		}else{
			if (!empty($_FILES['Logo']['name']) && !empty($_FILES['Brosur']['name'])) {
				
				$this->upload->initialize($config);
	        	if($this->upload->do_upload("Logo")){
	        		@unlink('././file/img_upload/'.$linkImage);
	        		$dataimage 	= array('upload_data' => $this->upload->data());
		        	$imagename	= $dataimage['upload_data']['file_name']; 

		        	$this->upload->initialize($config2);
		        	if($this->upload->do_upload("Brosur")){
		        		@unlink('././file/brosur_upload/'.$linkBrosur);
		        		$databrosur 	= array('upload_data' => $this->upload->data());
		            	$imagebrosur	= $databrosur['upload_data']['file_name']; 

		        		$data = [
								'judul_thread' 	=> htmlspecialchars($this->input->post('Judul')),
								'ket_thread' 	=> htmlspecialchars($this->input->post('Ket')),
								'tanggal'		=> $this->input->post('Tgl').' '.date('H:i:s'),
								'alamat_thread'	=> htmlspecialchars($this->input->post('Alamat')),
								'url_logo'		=> $imagename,
								'url_brosur'	=> $imagebrosur,
                        		'link_website'  => htmlspecialchars($this->input->post('Link'))
							];

						$hasil = $this->thread_m->edit_thread(array('id' => $id), $data);

						if($hasil == 1){
							$result['Msg'] = 'Data Berhasil Diubah . . .';
							$result['Status'] = true;
						}else{
							$result['Msg'] 		= $this->db->error()['message'];
							$result['Status'] 	= false;
						}
		        	}
	        	}
			}elseif(!empty($_FILES['Logo']['name'])) {
				$this->upload->initialize($config);
	        	if($this->upload->do_upload("Logo")){
	        		@unlink('././file/img_upload/'.$linkImage);
	        		$dataimage 	= array('upload_data' => $this->upload->data());
		        	$imagename	= $dataimage['upload_data']['file_name']; 

		        	$data = [
							'judul_thread' 	=> htmlspecialchars($this->input->post('Judul')),
							'ket_thread' 	=> htmlspecialchars($this->input->post('Ket')),
							'tanggal'		=> $this->input->post('Tgl').' '.date('H:i:s'),
							'alamat_thread'	=> htmlspecialchars($this->input->post('Alamat')),
							'url_logo'		=> $imagename,
                        	'link_website'  => htmlspecialchars($this->input->post('Link'))
						];

					$hasil = $this->thread_m->edit_thread(array('id' => $id), $data);

					if($hasil == 1){
						$result['Msg'] = 'Data Berhasil Diubah . . .';
						$result['Status'] = true;
					}else{
						$result['Msg'] 		= $this->db->error()['message'];
						$result['Status'] 	= false;
					}
	        	}
			}elseif(!empty($_FILES['Brosur']['name'])) {
				$this->upload->initialize($config2);
	        	if($this->upload->do_upload("Brosur")){
	        		@unlink('././file/brosur_upload/'.$linkBrosur);
	        		$databrosur 	= array('upload_data' => $this->upload->data());
	            	$imagebrosur	= $databrosur['upload_data']['file_name']; 

		        	$data = [
							'judul_thread' 	=> htmlspecialchars($this->input->post('Judul')),
							'ket_thread' 	=> htmlspecialchars($this->input->post('Ket')),
							'tanggal'		=> $this->input->post('Tgl').' '.date('H:i:s'),
							'alamat_thread'	=> htmlspecialchars($this->input->post('Alamat')),
							'url_brosur'	=> $imagebrosur,
                       		'link_website'  => htmlspecialchars($this->input->post('Link'))
						];

					$hasil = $this->thread_m->edit_thread(array('id' => $id), $data);

					if($hasil == 1){
						$result['Msg'] = 'Data Berhasil Diubah . . .';
						$result['Status'] = true;
					}else{
						$result['Msg'] 		= $this->db->error()['message'];
						$result['Status'] 	= false;
					}
	        	}
			}else{
				$data = [
						'judul_thread' 	=> htmlspecialchars($this->input->post('Judul')),
						'ket_thread' 	=> htmlspecialchars($this->input->post('Ket')),
						'tanggal'		=> $this->input->post('Tgl').' '.date('H:i:s'),
						'alamat_thread'	=> htmlspecialchars($this->input->post('Alamat')),
                        'link_website'  => htmlspecialchars($this->input->post('Link'))
					];

				$hasil = $this->thread_m->edit_thread(array('id' => $id), $data);

				if($hasil == 1){
					$result['Msg'] = 'Data Berhasil Diubah . . .';
					$result['Status'] = true;
				}else{
					$result['Msg'] 		= $this->db->error()['message'];
					$result['Status'] 	= false;
				}
			}
		}	
	
		echo json_encode($result);
	}

	public function viewEdit() {
		$id 		= $this->input->post('id');
		$query 		= $this->thread_m->get_thread_by_id($id);
		$tanggal 	= date('Y-m-d', strtotime($query->tanggal));
				
		echo json_encode($query);
	}

	public function delete($id) {
		$this->db->where('id', $id);
		$linkImage 	= $this->db->get('d_thread')->row('url_logo');

		$this->db->where('id', $id);
		$linkBrosur = $this->db->get('d_thread')->row('url_brosur');

		@unlink('././file/img_upload/'.$linkImage);
		@unlink('././file/brosur_upload/'.$linkBrosur);

		$query	= $this->thread_m->delete_by_id($id);
		
		if ($query == true) {
			$result['Msg']		= 'Data Berhasil Di Hapus . . .';
			$result['Status']	= true;
		}else{
			$result['Msg'] 		= $this->db->error()['message'];
			$result['Status'] 	= false;
		}

		echo json_encode($result);
	}

	public function posting() {
		$data 	= [
				'Posting' 	=> 1
			];
		$hasil 	= $this->thread_m->posting(array('Posting' => 0), $data);

		if ($hasil == 0) {
			$result['Msg'] 		= 'Tidak Ada Data yang Terposting . .';
			$result['Status'] 	= false;
			$result['Jumlah'] 	= 0;
		}else{
			$result['Msg'] 		= 'Data Berhasil Diposting . . .';
			$result['Status'] 	= true;
			$result['Jumlah']	= $hasil;
		}

		echo json_encode($result);
	}
}
