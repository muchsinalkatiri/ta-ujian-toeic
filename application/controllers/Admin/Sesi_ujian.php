<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesi_ujian extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('sesi_ujian_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Sesi Ujian';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		$data['sesi_ujian']=$this->sesi_ujian_model->get_all_data()->result();

		//rule validasi
		$this->form_validation->set_rules('nama_sesi_ujian','Nama Sesi Ujian','required|min_length[3]|is_unique[sesi_ujian.nama_sesi_ujian]',
			array(
				'required'=>'Form Nama Wajib di isi.',
				'min_length'=>'Nama yang anda masukan kurang panjang.',
				'is_unique' => 'Nama paket yang anda masukan sudah ada.'
				));
		$this->form_validation->set_rules('waktu_dimulai','Waktu Dimulai','required',
			array(
				'required'=>'Form ini wajib di isi.'
				));
		$this->form_validation->set_rules('waktu_berakhir','Waktu Berakhir','required',
			array(
				'required'=>'Form ini wajib di isi.'
				));


		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_admin/sesi_ujian/read',$data);
		}
		else{
			$nama_sesi_ujian= $this->input->post('nama_sesi_ujian');
			$waktu_dimulai = $this->input->post('waktu_dimulai');
			$waktu_berakhir = $this->input->post('waktu_berakhir');

			$data = array(
				'nama_sesi_ujian'=>$nama_sesi_ujian,
				'waktu_dimulai' => $waktu_dimulai,
				'waktu_berakhir' => $waktu_berakhir,
				'durasi' => '7200',
				'id_admin' => $this->session->userdata('id_admin'),
				'status' => 'tersedia',
				);
			$insert = $this->sesi_ujian_model->create('sesi_ujian',$data);

			if ($insert) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> '.$nama_sesi_ujian.' berhasil ditambahkan.</h5>
				</div>');    
				redirect('admin/sesi_ujian');
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span> '.$nama_sesi_ujian.' gagal ditambahkan.</h5>
				</div>');    
				redirect('admin/Sesi_ujian');
			}	
		}
	}

	public function update($nim = NULL)
	{
		$data['page_title'] = 'Edit Data Mahasiswa';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		$where = array('nim' => $nim);
		$data['mahasiswa'] = $this->mahasiswa_model->get_update_data_by_nim($where,'data_mahasiswa')->result();
		// $data['mahasiswa'] = $this->mahasiswa_model->get_update_data_by_nim($nim);
		// Jika nim kosong atau tidak ada nim yg dimaksud, lempar user ke halaman blog
		// if ( empty($nim) || !$data['mahasiswa'] ) redirect('mahasiswa');

		//rule validasi
		$this->form_validation->set_rules('nama','Nama','required|min_length[3]',
			array(
				'required'=>'Form Nama Wajib di isi.',
				'min_length'=>'Nama yang anda masukan kurang panjang.',
				));
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|min_length[3]|alpha',
			array(
				'required'=>'Form Tempat Lahir Wajib di isi.',
				'min_length'=>'Tempat Lahir yang anda masukan kurang panjang.',
				'alpha'=>'Tempat Lahir yang anda masukan harus berbentuk huruf.',
				));
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required',
			array(
				'required'=>'Form Nim Tanggal Lahir di isi.'
				));
		$this->form_validation->set_rules('alamat','Alamat','required|min_length[3]',
			array(
				'required'=>'Form Alamat Wajib di isi.',
				'min_length'=>'Alamat yang anda masukan kurang panjang.',
				));
		$this->form_validation->set_rules('jurusan','Jurusan','required',
			array(
				'required'=>'Form Jurusan Wajib di isi.'
				));
		$this->form_validation->set_rules('notlp','No Telepon','required|numeric|min_length[3]|max_length[15]',
			array(
				'required'=>'Form No Telepon Wajib di isi.',
				'numeric'=>'No Telepon harusx di isi dengan angka.',
				'min_length'=>'No Telepon yang anda masukan terlalu pendek',
				'max_length'=>'No Telepon yang anda masukan terlalu panjang',
				));


		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_admin/mahasiswa/edit',$data);
		}
		else{
			$nim= $this->input->post('nim');
			$nama = $this->input->post('nama');
			$ttl = $this->input->post('tempat_lahir').", ".$this->input->post('tanggal_lahir');
			$alamat = $this->input->post('alamat');
			$jurusan = $this->input->post('jurusan');
			$notlp = $this->input->post('notlp');

			$data = array(
				'nama' => $nama,
				'ttl' => $ttl,
				'alamat'=> $alamat,
				'jurusan' => $jurusan,
				'notlp'=> $notlp,
				);
			$where = array(
				'nim' => $nim
				);

			$update = $this->mahasiswa_model->update($where,$data,'data_mahasiswa');

			if ($update) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> '.$nim.' berhasil di perbarui.</h5>
				</div>');    
				redirect('admin/mahasiswa');
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span> '.$nim.' gagal disimpan.</h5>
				</div>');    
				redirect('admin/mahasiswa');
			}	
		}
	}

	public function berhenti($id=null){
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');
		
		$data = array(
				'status' => 'dihentikan'
				);
			$where = array(
				'id_sesi_ujian' => $id
				);

			$update = $this->sesi_ujian_model->update($where,$data,'sesi_ujian');

		if ($update) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Sesi Berhasil Dihentikan.</h5>
			</div>');    
			redirect('admin/sesi_ujian');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Sesi Gagal Dihentikan.</h5>
			</div>');    
			redirect('admin/sesi_ujian');
		}
	}
	public function delete($id=null){
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');
		
		$where = array('id_sesi_ujian' => $id);
		$delete = $this->sesi_ujian_model->delete($where,'sesi_ujian');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Data Berhasil Dihapus.</h5>
			</div>');    
			redirect('admin/sesi_ujian');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Data Gagal Dihapus.</h5>
			</div>');    
			redirect('admin/sesi_ujian');
		}
	}
}
