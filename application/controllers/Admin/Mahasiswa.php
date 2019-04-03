<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('mahasiswa_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Data Mahasiswa';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		$data['mahasiswa']=$this->mahasiswa_model->get_all_mahasiswa()->result();

		$this->load->view('v_admin/mahasiswa/daftar_mahasiswa',$data);
	}

	public function create()
	{
		$data['page_title'] = 'Tambah Data Mahasiswa';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		//rule validasi
		$this->form_validation->set_rules('nim','Nim','required|numeric|exact_length[10]|is_unique[data_mahasiswa.nim]',
			array(
				'required'=>'Form Nim Wajib di isi.',
				'numeric'=>'nim harus diisi dengan angka',
				'exact_length'=>'nim harus berjumlah 10 angka',
				'is_unique' =>'Nim %s sudah ada')
			);
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
				'numeric'=>'No Telepon harus di isi dengan angka.',
				'min_length'=>'No Telepon yang anda masukan terlalu pendek',
				'max_length'=>'No Telepon yang anda masukan terlalu panjang',
				));


		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_admin/mahasiswa/tambah',$data);
		}
		else{
			$nim= $this->input->post('nim');
			$nama = $this->input->post('nama');
			$ttl = $this->input->post('tempat_lahir').", ".$this->input->post('tanggal_lahir');
			$alamat = $this->input->post('alamat');
			$jurusan = $this->input->post('jurusan');
			$notlp = $this->input->post('notlp');

			$data = array(
				'nim'=>$nim,
				'nama' => $nama,
				'ttl' => $ttl,
				'alamat'=> $alamat,
				'jurusan' => $jurusan,
				'notlp'=> $notlp,
				);
			$insert = $this->mahasiswa_model->create('data_mahasiswa',$data);

			if ($insert) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> '.$nim.' berhasil ditambahkan.</h5>
				</div>');    
				redirect('admin/mahasiswa');
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span> '.$nim.' gagal ditambahkan.</h5>
				</div>');    
				redirect('admin/mahasiswa');
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

	public function delete($nim=null){
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');
		
		$where = array('nim' => $nim);
		$delete = $this->mahasiswa_model->delete($where,'data_mahasiswa');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> '.$nim.' Berhasil Dihapus.</h5>
			</div>');    
			redirect('admin/mahasiswa');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> '.$nim.' Gagal Dihapus.</h5>
			</div>');    
			redirect('admin/mahasiswa');
		}
	}
}
