<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_response extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('Soal/soal_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function data_soal($nama_paket_id_part=null)
	{
		$data['page_title'] = 'Data Soal : Question-Response';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
			redirect('user/login/admin');
		}

		list($nama_paket, $id_part) = explode('4_5', $nama_paket_id_part); //split
		$nama_paket = str_replace('%20', ' ', $nama_paket); //replace
		$nama_part = 'Question-Response';

		$data['paket_dan_part_soal']=$this->soal_model->cek_paket_dan_part($nama_paket, $id_part, $nama_part); //ambil data paket untuk dicek ada apa endak

		$data['data_soal']=$this->soal_model->get_all_data_where_namapaket_idpart($nama_paket, $id_part)->result();
		$data['kelompok_soal']=$this->soal_model->get_all_kelompok_where_namapaket_idpart($nama_paket, $id_part)->result();

		if ( empty($nama_paket_id_part) || !$data['paket_dan_part_soal'] ) redirect('admin/soal/paket_soal');

		$this->load->view('v_admin/soal/soal/question_response/read',$data);

	}
	public function tambah($nama_paket_id_part=null){
		$data['page_title'] = 'Tambah Data Soal : Question-Response';
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
			redirect('user/login/admin');
		}

		$split = explode('4_5', $nama_paket_id_part); //split
		$nama_paket = $split[0];
		$id_part = $split[1];
		if(!empty($split[2] )){
			$id_kelompok_soal = $split[2];
		}else{
			$id_kelompok_soal = 0;
		}
		$nama_paket = str_replace('%20', ' ', $nama_paket); //replace
		$nama_part = 'Question-Response';

		$jawaban = $this->input->post('jawaban');
		$nomer_soal = $this->input->post('nomer_soal');

			if ($nomer_soal < 11 || $nomer_soal >40) { //cek nomer soal bener ta gak
				$this->session->set_flashdata('nomer_soal_msg','nomer soal harus antara 11-40');   
				if($id_kelompok_soal == 0){redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);}
				else{redirect('admin/soal/question_response/data_kelompok_soal/'.$nama_paket.'4_5'.$id_part.'4_5'.$id_kelompok_soal);}
			}
			else{//nomer soal bener
				$query = $this->db->get_where('data_soal', array('nomer_soal' => $nomer_soal,'part_soal'=> $nama_part, 'nama_paket' => $nama_paket, 'id_part'=> $id_part));
				$check = $query->num_rows();
				if($check != 0){ //cek nomer soal di paket itu sudah ada apa belum
					$this->session->set_flashdata('nomer_soal_msg','nomer soal ' .$nomer_soal.' sudah ada ');    
						if($id_kelompok_soal == 0){redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);}
						else{redirect('admin/soal/question_response/data_kelompok_soal/'.$nama_paket.'4_5'.$id_part.'4_5'.$id_kelompok_soal);}
				}
				else{//nomer soal di paket belum ada
					$data = array(
						'nomer_soal' => $nomer_soal,
						'isi_soal' => $post_image,
						'part_soal'=> $nama_part,
						'jenis_soal' => 'listening',
						'id_kelompok_soal' => $id_kelompok_soal,
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
						if($id_kelompok_soal == 0){redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);}
						else{redirect('admin/soal/question_response/data_kelompok_soal/'.$nama_paket.'4_5'.$id_part.'4_5'.$id_kelompok_soal);}
					}else{
						$this->session->set_flashdata('msg',
							'<div class="alert alert-danger">
							<h5> <span class=" fa fa-cross" ></span>Nomer '.$nomer_soal.' gagal ditambahkan.</h5>
						</div>');    
						if($id_kelompok_soal == 0){redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);}
						else{redirect('admin/soal/question_response/data_kelompok_soal/'.$nama_paket.'4_5'.$id_part.'4_5'.$id_kelompok_soal);}
					}	

				}
			}
		}


		public function edit($id_soal = null){
			$data['page_title'] = 'Edit Data Soal : Question-Response';
			if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
				redirect('user/login/admin');
			}
			$nama_part = 'Question-Response';


			$data['soal'] = $this->soal_model->get_data_by_id($id_soal, $nama_part);
		// if ( empty($id_soal) || !$data['soal'] ) redirect('admin/soal/paket_soal');


			$jawaban = $this->input->post('jawaban_edit');
			$nomer_soal = $this->input->post('nomer_soal_edit');
			$nama_paket = $data['soal']->nama_paket;
			$id_part = $data['soal']->id_part;
			$id_kelompok_soal = $data['soal']->id_kelompok_soal;

			$data = array(
				'jawaban' => $jawaban
				);
			$where = array(
				'id_soal' => $id_soal
				);

			$update = $this->soal_model->update($where,$data,'data_soal');

			if ($update) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> Nomer '.$nomer_soal.' berhasil diupdate.</h5>
				</div>');    
				if($id_kelompok_soal == 0){redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);}
				else{redirect('admin/soal/question_response/data_kelompok_soal/'.$nama_paket.'4_5'.$id_part);}
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span>Nomer '.$nomer_soal.' gagal diupdate.</h5>
				</div>');    
				if($id_kelompok_soal == 0){redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);}
				else{redirect('admin/soal/question_response/data_kelompok_soal/'.$nama_paket.'4_5'.$id_part);}
			}	
		}
		public function delete($id_soal = null){
			if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
				redirect('user/login/admin');

			$data['page_title'] = 'Delete soal';

			$nama_part = 'Question-Response';
		// Get data dari model berdasarkan $id
			$data['soal'] = $this->soal_model->get_data_by_id($id_soal, $nama_part);
			$nomer_soal = $data['soal']->nomer_soal;
			$id_part = $data['soal']->id_part;
			$nama_paket = $data['soal']->nama_paket;
			$id_kelompok_soal = $data['soal']->id_kelompok_soal;

		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
			if ( empty($id_soal) || !$data['soal'] ) redirect('admin/soal/paket_soal');


		// Hapus data sesuai id-nya
			$where = array('id_soal' => $id_soal);
			$delete = $this->soal_model->delete($where,'data_soal');
			if ($delete) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> Nomer '.$nomer_soal.' berhasil hapus.</h5>
				</div>');    
				if($id_kelompok_soal == 0){redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);}
				else{redirect('admin/soal/question_response/data_kelompok_soal/'.$nama_paket.'4_5'.$id_part.'4_5'.$id_kelompok_soal);}

			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span>Nomer '.$nomer_soal.' Gagal Dihapus.</h5>
				</div>');    
				if($id_kelompok_soal == 0){redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);}
				else{redirect('admin/soal/question_response/data_kelompok_soal/'.$nama_paket.'4_5'.$id_part.'4_5'.$id_kelompok_soal);}
			}
		}
		public function data_kelompok_soal($nama_paket_id_part=null)
		{
			$data['page_title'] = 'Data Kelompok Soal : Question-Response';
		// Must login
			if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
				redirect('user/login/admin');
			}

		list($nama_paket, $id_part, $id_kelompok_soal) = explode('4_5', $nama_paket_id_part); //split
		$nama_paket = str_replace('%20', ' ', $nama_paket); //replace
		$nama_part = 'Question-Response';

		$data['paket_dan_part_soal']=$this->soal_model->cek_paket_dan_part($nama_paket, $id_part, $nama_part); //ambil data paket untuk dicek ada apa endak

		$data['data_soal']=$this->soal_model->get_all_data_where_namapaket_idpart_idkelompok($nama_paket, $id_part, $id_kelompok_soal)->result();

		if ( empty($nama_paket_id_part) || !$data['paket_dan_part_soal'] ) redirect('admin/soal/paket_soal');

		$this->load->view('v_admin/soal/soal/question_response/read_kelompok',$data);

	}
	public function tambah_kelompok($nama_paket_id_part=null){
		$data['page_title'] = 'Tambah Data Soal : Question-Response';
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
			redirect('user/login/admin');
		}

		list($nama_paket, $id_part, $id_kelompok_soal) = explode('4_5', $nama_paket_id_part, 3); //split
		$nama_paket = str_replace('%20', ' ', $nama_paket); //replace
		$nama_part = 'Question-Response';

		$bacaan = $this->input->post('bacaan', FALSE);

		$data = array(
			'part_soal'=> $nama_part,
			'nama_paket' => $nama_paket,
			'id_part' => $id_part,
			'bacaan' => $bacaan,
			'jenis_soal' => 'listening',
			'tanggal_dibuat'=> date("Y-m-d")
			);
		$insert = $this->soal_model->create('kelompok_soal',$data);

		if ($insert) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Kelompok Soal berhasil ditambahkan.</h5>
			</div>');    
			redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);
		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span>Kelompok Soal gagal ditambahkan.</h5>
			</div>');    
			redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);

		}	
	}
	public function edit_kelompok($id_kelompok_soal=null){
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		$data['page_title'] = 'Edit Kelompok soal';

		$nama_part = 'Question-Response';
		// Get data dari model berdasarkan $id
		$data['kelompok'] = $this->soal_model->get_data_kelompok_by_id($id_kelompok_soal, $nama_part);
		$id_part = $data['kelompok']->id_part;
		$nama_paket = $data['kelompok']->nama_paket;

		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id_kelompok_soal) || !$data['kelompok']  || $id_kelompok_soal == '0') redirect('admin/soal/paket_soal');

		$this->form_validation->set_rules('bacaan','bacaan','required',
			array(
				'required'=>'Form Ini Wajib di isi.'
				));

		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_admin/soal/soal/question_response/update_kelompok',$data);
		}
		else{
		// Hapus data sesuai id-nya
			$where = array('id_kelompok_soal' => $id_kelompok_soal);
			$bacaan = $this->input->post('bacaan', FALSE);

			$data = array(
				'bacaan' => $bacaan
				);
			$update = $this->soal_model->update($where,$data,'kelompok_soal');
			if ($update) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> Kelompok Soal berhasil diupdate.</h5>
				</div>');    
				redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);

			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span>Kelompok Soal Gagal diupdate.</h5>
				</div>');    
				redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);
			}
		}
	}
	public function delete_kelompok($id_kelompok_soal=null){
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		$data['page_title'] = 'Delete Kelompok soal';

		$nama_part = 'Question-Response';
		// Get data dari model berdasarkan $id
		$data['kelompok'] = $this->soal_model->get_data_kelompok_by_id($id_kelompok_soal, $nama_part);
		$id_part = $data['kelompok']->id_part;
		$nama_paket = $data['kelompok']->nama_paket;

		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id_kelompok_soal) || !$data['kelompok']  || $id_kelompok_soal == '0') redirect('admin/soal/paket_soal');

		// Hapus data sesuai id-nya
		$where = array('id_kelompok_soal' => $id_kelompok_soal);
		$delete = $this->soal_model->delete($where,'kelompok_soal');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Kelompok Soal berhasil hapus.</h5>
			</div>');    
			redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span>Kelompok Soal Gagal Dihapus.</h5>
			</div>');    
			redirect('admin/soal/question_response/data_soal/'.$nama_paket.'4_5'.$id_part);
		}
	}
}