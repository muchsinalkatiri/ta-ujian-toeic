<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_soal extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('Soal/part_soal_model');
		$this->load->model('Soal/paket_soal_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Data Paket Soal';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
			redirect('user/login/admin');
		}

		$data['paket_soal']=$this->paket_soal_model->get_all_data()->result();

		$this->form_validation->set_rules('nama_paket','Nama Paket','required|min_length[3]|alpha_numeric_spaces|is_unique[data_paket.nama_paket]',
			array(
				'required'=>'Form Nama Paket Wajib di isi.',
				'alpha_numeric_spaces'=>'Nama yang anda masukan hanya boleh huruf dan angka.',
				'min_length'=>'Nama yang anda masukan kurang panjang.',
				'is_unique'=>'Nama yang anda masukan sudah terdaftar.',
				));
		if (empty($_FILES['file_audio']['name']))
		{
			$this->form_validation->set_rules('file_audio','File Audio','required',
				array(
					'required'=>'File Audio Wajib di inputkan'
					));
		}


		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_admin/soal/paket_soal/read',$data);
		}
		else{
			// Apakah user upload ?
			if ( isset($_FILES['file_audio']) && $_FILES['file_audio']['size'] > 0 )
			{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
				$config['upload_path']          = './uploads/sound-ujian//';
				$config['allowed_types']        = 'mp3';
				$config['max_size']             = 1000000;
				$config['file_name'] 			= $this->input->post('nama_paket').'-listening';

    	        // Load library upload
				$this->load->library('upload', $config);

    	        // Apakah file berhasil diupload?
				if ( ! $this->upload->do_upload('file_audio'))
				{
					$data['upload_error'] = $this->upload->display_errors();

    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang

					$this->session->set_flashdata('msg1',$this->upload->display_errors());
					redirect('admin/soal/paket_soal');

				} else {

    	        	// Simpan nama file-nya jika berhasil diupload
					$audio_data = $this->upload->data();
					$post_audio = $audio_data['file_name'];

				}
			} else {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<span class=" fa fa-ban" ></span> silahkan memasukan file audio terlebih dahulu
				</div>');
				redirect('admin/soal/paket_soal');
			}
			$nama_paket= $this->input->post('nama_paket');
			$data = array(
				'nama_paket' => $nama_paket,
				'file_audio'=>$post_audio,
				'tanggal_dibuat'=> date("Y-m-d"),
				'jumlah_soal'=> '0',
				'jumlah_soal_listening'=> '0',
				'jumlah_soal_reading'=> '0',
				'penjelasan_listening'=> '',
				'penjelasan_reading'=> '',
				);
			$data2=array(
				array('nama_paket' => $nama_paket,'untuk_soal_nomor' => '1-10','nama_part'=>'Photograps','jenis_soal'=> 'listening'),
				array('nama_paket' => $nama_paket,'untuk_soal_nomor' => '11-20','nama_part'=>'Question-Response','jenis_soal'=> 'listening'),
				array('nama_paket' => $nama_paket,'untuk_soal_nomor' => '41-70','nama_part'=>'Conversation','jenis_soal'=> 'listening'),
				array('nama_paket' => $nama_paket,'untuk_soal_nomor' => '71-100','nama_part'=>'Short Talks','jenis_soal'=> 'listening'),
				array('nama_paket' => $nama_paket,'untuk_soal_nomor' => '101-140','nama_part'=>'Incomplete Sentences','jenis_soal'=> 'reading'),
				array('nama_paket' => $nama_paket,'untuk_soal_nomor' => '141-152','nama_part'=>'Text Completion','jenis_soal'=> 'reading'),
				array('nama_paket' => $nama_paket,'untuk_soal_nomor' => '153-200','nama_part'=>'Reading Comprehension','jenis_soal'=> 'reading')
				);

			if( empty($data['upload_error']) ) {
				$insert = $this->paket_soal_model->create('data_paket',$data);
				$insert2 = $this->part_soal_model->insert_batch('data_part_soal',$data2);
				if ($insert && $insert2) {
					$this->session->set_flashdata('msg',
						'<div class="alert alert-success">
						<h5> <span class=" fa fa-check" ></span> Paket '.$nama_paket.' berhasil ditambahkan.</h5>
					</div>');    
					redirect('admin/soal/paket_soal');
				}else{
					$this->session->set_flashdata('msg',
						'<div class="alert alert-danger">
						<h5> <span class=" fa fa-cross" ></span> Paket '.$nama_paket.' gagal ditambahkan.</h5>
					</div>');    
					redirect('admin/soal/paket_soal');
				}
			}
		}
	}

	public function update($id=null)
	{
		$data['page_title'] = 'Update Data Paket Soal';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
			redirect('user/login/admin');
		}

		$data['paket_soal']=$this->paket_soal_model->get_data_by_id($id);

		$old_audio= $data['paket_soal']->file_audio;

		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id) || !$data['paket_soal'] ) redirect('admin/soal/paket_soal');

		if($this->input->post('nama_paket') != $data['paket_soal']->nama_paket) {
			$is_unique =  '|is_unique[data_paket.nama_paket]';
		} else {
			$is_unique =  '';
		}
		$this->form_validation->set_rules('nama_paket','Nama Paket','required|alpha_numeric_spaces|min_length[3]'.$is_unique,
			array(
				'required'=>'Form Nama Paket Wajib di isi.',
				'min_length'=>'Nama yang anda masukan kurang panjang.',
				'alpha_numeric_spaces'=>'Nama yang hanya boleh dengan huruf dan angka.',
				'is_unique'=>'Nama yang anda masukan sudah terdaftar.',
				));
		$this->form_validation->set_rules('penjelasan_listening','Penjelasan Listening','min_length[10]',
			array(
				'required'=>'Form Ini Wajib di isi.',
				'min_length'=>'Penjelasan yang anda masukan kurang panjang.',
				));
		$this->form_validation->set_rules('penjelasan_reading','Penjelasan Reading','min_length[10]',
			array(
				'required'=>'Form Ini Wajib di isi.',
				'min_length'=>'Penjelasan yang anda masukan kurang panjang.',
				));


		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_admin/soal/paket_soal/update',$data);
		}
		else{
			$id_paket= $this->input->post('id_paket');
			$nama_paket= $this->input->post('nama_paket');
			$penjelasan_listening= $this->input->post('penjelasan_listening');
			$penjelasan_reading= $this->input->post('penjelasan_reading');
			// Apakah user upload ?
			if ( isset($_FILES['file_audio']) && $_FILES['file_audio']['size'] > 0 )
			{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
				$config['upload_path']          = './uploads/sound-ujian//';
				$config['allowed_types']        = 'mp3';
				$config['max_size']             = 1000000;
				$config['file_name'] 			= $this->input->post('nama_paket').'-listening';

    	        // Load library upload
				$this->load->library('upload', $config);

    	        // Apakah file berhasil diupload?
				if ( ! $this->upload->do_upload('file_audio'))
				{
					$data['upload_error'] = $this->upload->display_errors();

    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang

					$this->session->set_flashdata('msg1',$this->upload->display_errors());
					$this->load->view('v_admin/soal/paket_soal/update',$data);

				} else {

					if ( file_exists( './uploads/sound-ujian/'.$old_audio ) ){
						unlink( './uploads/sound-ujian/'.$old_audio);
					}else {
						echo 'File tidak ditemukan.';
					}
					$audio_data = $this->upload->data();
					$post_audio = $audio_data['file_name'];
					$data = array(
						'nama_paket' => $nama_paket,
						'file_audio'=>$post_audio,
						'penjelasan_listening'=> $penjelasan_listening,
						'penjelasan_reading'=> $penjelasan_reading,
						);
					if( empty($data['upload_error']) ) {
						$where = array(
							'id_paket' => $id_paket
							);
						$update = $this->paket_soal_model->update($where,$data,'data_paket');
						if ($update) {
							$this->session->set_flashdata('msg',
								'<div class="alert alert-success">
								<h5> <span class=" fa fa-check" ></span> Paket '.$nama_paket.' berhasil diupdate.</h5>
							</div>');    
							redirect('admin/soal/paket_soal');
						}else{
							$this->session->set_flashdata('msg',
								'<div class="alert alert-danger">
								<h5> <span class=" fa fa-cross" ></span> Paket '.$nama_paket.' gagal diupdate.</h5>
							</div>');    
							redirect('admin/soal/paket_soal');
						}
					}

				}
			} else { //jika tidak upload file
				$data = array(
					'nama_paket' => $nama_paket,
					'penjelasan_listening'=> $penjelasan_listening,
					'penjelasan_reading'=> $penjelasan_reading,
					);
				if( empty($data['upload_error']) ) {
					$where = array(
						'id_paket' => $id_paket
						);
					$update = $this->paket_soal_model->update($where,$data,'data_paket');
					if ($update) {
						$this->session->set_flashdata('msg',
							'<div class="alert alert-success">
							<h5> <span class=" fa fa-check" ></span> Paket '.$nama_paket.' berhasil diupdate.</h5>
						</div>');    
						redirect('admin/soal/paket_soal');
					}else{
						$this->session->set_flashdata('msg',
							'<div class="alert alert-danger">
							<h5> <span class=" fa fa-cross" ></span> Paket '.$nama_paket.' gagal diupdate.</h5>
						</div>');    
						redirect('admin/soal/paket_soal');
					}
				}
			}
		}
	}

	public function delete($id=null)
	{
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		$data['page_title'] = 'Delete mahasiswa terdaftar';

		// Get data dari model berdasarkan $id
		$data['data_paket'] = $this->paket_soal_model->get_data_by_id($id);

		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id) || !$data['data_paket'] ) show_404();

		// Kita simpan dulu nama file yang lama
		$old_audio = $data['data_paket']->file_audio;

    	// Hapus file image yang lama jika ada
		if( !empty($old_audio) ) {
			if ( file_exists( './uploads/sound-ujian/'.$old_audio ) ){
				unlink( './uploads/sound-ujian/'.$old_audio );
			} 
		}

		// Hapus data sesuai id-nya
		$where = array('id_paket' => $id);
		$delete = $this->paket_soal_model->delete($where,'data_paket');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Data Berhasil Dihapus.</h5>
			</div>');    
			redirect('admin/soal/paket_soal');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Data Gagal Dihapus.</h5>
			</div>');    
			redirect('admin/soal/paket_soal');
		}
	}

}