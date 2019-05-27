<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

	public function index()
	{
		$this->load->view('request_v');
	}

	public function send_request(){
		$this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Ket', 'Ket', 'required');
        $this->form_validation->set_rules('Tgl', 'Tgl', 'required');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('Link', 'Link', 'required');
        
        if ($this->form_validation->run() == false) {
            $result['Msg'] = 'Please Fill All Field !!!';
            $result['Status'] = false;
        }else{
            $config['upload_path']      = '././file/img_upload/';
            $config['allowed_types']    = 'jpg|png';
            $config['max_size']         = 1000;
            $config['encrypt_name']     = true;

            $this->upload->initialize($config);
            if($this->upload->do_upload("Logo")){
                $dataimage  = array('upload_data' => $this->upload->data());
                $imagename  = $dataimage['upload_data']['file_name']; 
                $config2['upload_path']     = '././file/brosur_upload/';
                $config2['allowed_types']   = 'jpg|png';
                $config2['max_size']        = 2500;
                $config2['encrypt_name']    = true;

                $this->upload->initialize($config2);
                if($this->upload->do_upload("Brosur")){

                    $databrosur     = array('upload_data' => $this->upload->data());
                    $imagebrosur    = $databrosur['upload_data']['file_name']; 

                    $data = [
                        'judul_thread'  => htmlspecialchars($this->input->post('Judul')),
                        'ket_thread'    => htmlspecialchars($this->input->post('Ket')),
                        'tanggal'       => $this->input->post('Tgl').' '.date('H:i:s'),
                        'alamat_thread' => htmlspecialchars($this->input->post('Alamat')),
                        'url_logo'      => $imagename,
                        'url_brosur'    => $imagebrosur,
                        'Posting'       => 0,
                        'link_website'  => htmlspecialchars($this->input->post('Link'))
                    ];
                    $hasil = $this->thread_m->save_thread($data);

                    if($hasil == true){
                        $result['Msg'] = 'Data Berhasil Dikirim . . .';
                        $result['Status'] = true;
                    }else{
                        $result['Msg']      = $this->db->error()['message'];
                        $result['Status']   = false;
                    }

                }else{
                    $data = [
                        'judul_thread'  => htmlspecialchars($this->input->post('Judul')),
                        'ket_thread'    => htmlspecialchars($this->input->post('Ket')),
                        'tanggal'       => $this->input->post('Tgl').' '.date('H:i:s'),
                        'alamat_thread' => htmlspecialchars($this->input->post('Alamat')),
                        'url_logo'      => $imagename,
                        'url_brosur'    => NULL,
                        'Posting'       => 0,
                        'link_website'  => htmlspecialchars($this->input->post('Link'))
                    ];
                    $hasil = $this->thread_m->save_thread($data);

                    if($hasil == true){
                        $result['Msg'] = 'Data Berhasil Dikirim . . .';
                        $result['Status'] = true;
                    }else{
                        $result['Msg']      = $this->db->error()['message'];
                        $result['Status']   = false;
                    }
                }
            }else{
                $result['Msg'] = $this->upload->display_errors();
                $result['Status'] = false;
            }
        }   
    
        echo json_encode($result);
	}
}
