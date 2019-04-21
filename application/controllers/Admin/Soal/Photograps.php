<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photograps extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('Soal/soal_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}



	public function data_soal($nama_paket_id_part=null)
	{
		$data['page_title'] = 'Data Soal : Photograps';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
			redirect('user/login/admin');
		}

		list($nama_paket, $id_part) = explode('4_5', $nama_paket_id_part); //split
		$nama_paket = str_replace('%20', ' ', $nama_paket); //replace
		$nama_part = 'Photograps';

		$data['paket_dan_part_soal']=$this->soal_model->cek_paket_dan_part($nama_paket, $id_part, $nama_part); //ambil data paket untuk dicek ada apa endak

		$data['data_soal']=$this->soal_model->get_all_data_where_namapaket_idpart($nama_paket, $id_part)->result();

		if ( empty($nama_paket_id_part) || !$data['paket_dan_part_soal'] ) redirect('admin/soal/paket_soal');

		$this->load->view('v_admin/soal/soal/photograps/read',$data);

	}
	public function tambah($nama_paket_id_part=null){
		$data['page_title'] = 'Tambah Data Soal : Photograps';
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
			redirect('user/login/admin');
		}

		list($nama_paket, $id_part) = explode('4_5', $nama_paket_id_part); //split
		$nama_paket = str_replace('%20', ' ', $nama_paket); //replace
		$nama_part = 'Photograps';
		$data['paket_dan_part_soal']=$this->soal_model->cek_paket_dan_part($nama_paket, $id_part, $nama_part); //ambil data paket untuk dicek ada apa endak

		if ( empty($nama_paket_id_part) || !$data['paket_dan_part_soal'] ) redirect('admin/soal/paket_soal');

		$this->form_validation->set_rules('nomer_soal','Nomer Soal','required',
			array(
				'required'=>'Form Ini Wajib di isi.'
				));
		$this->form_validation->set_rules('jawaban','Jawaban','required',
			array(
				'required'=>'Form Ini Wajib di isi.'
				));
		if (empty($_FILES['gambar_soal']['name']))
		{
			$this->form_validation->set_rules('gambar_soal','Gambar Soal','required',
				array(
					'required'=>'Gambar wajib Di isi'
					));
		}

		$jawaban = $this->input->post('jawaban');
		$nomer_soal = $this->input->post('nomer_soal');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_admin/soal/soal/photograps/tambah',$data);
		}
		else{
			// Apakah user upload gambar?
			if ($nomer_soal < 1 || $nomer_soal >10) { //cek nomer soal bener ta gak
				$this->session->set_flashdata('nomer_soal_msg','nomer soal harus antara 1-10');    
				redirect('admin/soal/photograps/tambah/'.$nama_paket.'4_5'.$id_part);
			}
			else{//nomer soal bener
				$query = $this->db->get_where('data_soal', array('nomer_soal' => $nomer_soal,'part_soal'=> $nama_part, 'nama_paket' => $nama_paket, 'id_part'=> $id_part));
				$check = $query->num_rows();
				if($check != 0){ //cek nomer soal di paket itu sudah ada apa belum
					$this->session->set_flashdata('nomer_soal_msg','nomer soal ' .$nomer_soal.' sudah ada ');    
					redirect('admin/soal/photograps/tambah/'.$nama_paket.'4_5'.$id_part);
				}
				else{//nomer soal di paket belum ada
					if ( isset($_FILES['gambar_soal']) && $_FILES['gambar_soal']['size'] > 0 )//cek gambar dimasukan ndak
					{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
						$config['upload_path']          = './uploads/img-soal/photograps/';
						$config['allowed_types']        = 'jpg|png';
						$config['max_size']             = 1024;
						$config['max_width']            = 1024;
						$config['max_height']           = 768;
						$config['file_name'] 			= $nama_paket.'-part '.$id_part.'-'.$nama_part.'-'.$nomer_soal;

    	        // Load library upload
						$this->load->library('upload', $config);

    	        // Apakah file berhasil diupload?
						if ( ! $this->upload->do_upload('gambar_soal'))//jika upload error
						{
							$data['upload_error'] = $this->upload->display_errors();

    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang

							$this->session->set_flashdata('gambar_soal_msg',$this->upload->display_errors()); 
							redirect('admin/soal/photograps/tambah/'.$nama_paket.'4_5'.$id_part);

						} else { //upload berhasil & langsung insert
							$img_data = $this->upload->data();
							$post_image = $img_data['file_name']; // Simpan nama file-nya jika berhasil diupload
							$data = array(
								'nomer_soal' => $nomer_soal,
								'isi_soal' => $post_image,
								'part_soal'=> $nama_part,
								'jenis_soal' => 'listening',
								'id_kelompok_soal' => '0',
								'nama_paket' => $nama_paket,
								'id_part' => $id_part,
								'jawaban' => $jawaban,
								'tanggal_dibuat'=> date("Y-m-d")
								);
							$insert = $this->soal_model->create('data_soal',$data);

							if ($insert) {
								$this->session->set_flashdata('msg',
									'<div class="alert alert-success">
									<h5> <span class=" fa fa-check" ></span> Nomer '.$nomer_soal.' berhasil ditambahkan.</h5>
								</div>');    
								redirect('admin/soal/photograps/data_soal/'.$nama_paket.'4_5'.$id_part);
							}else{
								$this->session->set_flashdata('msg',
									'<div class="alert alert-danger">
									<h5> <span class=" fa fa-cross" ></span>Nomer '.$nomer_soal.' gagal ditambahkan.</h5>
								</div>');    
								redirect('admin/soal/photograps/data_soal/'.$nama_paket.'4_5'.$id_part);
							}	

						}
					} else {//ndak masukan gambar
						$this->session->set_flashdata('gambar_soal_msg','Silahkan masukan gambar dahulu'); 
						redirect('admin/soal/photograps/tambah/'.$nama_paket.'4_5'.$id_part);
					}
				}
			}
		}
	}
	public function delete($id_soal = null){
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		$data['page_title'] = 'Delete soal';

		// Get data dari model berdasarkan $id
		$data['soal'] = $this->soal_model->get_data_by_id($id_soal);
		$nomer_soal = $data['soal']->nomer_soal;
		$id_part = $data['soal']->id_part;
		$nama_paket = $data['soal']->nama_paket;

		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id_soal) || !$data['soal'] ) redirect('admin/soal/paket_soal');

		// Kita simpan dulu nama file yang lama
		$old_image = $data['soal']->isi_soal;

    	// Hapus file image yang lama jika ada
		if( !empty($old_image) ) {
			if ( file_exists( './uploads/img-soal/photograps/'.$old_image ) ){
				unlink( './uploads/img-soal/photograps/'.$old_image );
			} 
		}

		// Hapus data sesuai id-nya
		$where = array('id_soal' => $id_soal);
		$delete = $this->soal_model->delete($where,'data_soal');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Nomer '.$nomer_soal.' berhasil hapus.</h5>
			</div>');    
			redirect('admin/soal/photograps/data_soal/'.$nama_paket.'4_5'.$id_part);

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span>Nomer '.$nomer_soal.' Gagal Dihapus.</h5>
			</div>');    
			redirect('admin/soal/photograps/data_soal/'.$nama_paket.'4_5'.$id_part);
		}
	}
}