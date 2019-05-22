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
				redirect('admin/ujian/sesi_ujian');
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span> '.$nama_sesi_ujian.' gagal ditambahkan.</h5>
				</div>');    
				redirect('admin/ujian/sesi_ujian');
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
			redirect('admin/ujian/sesi_ujian');
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
			redirect('admin/ujian/sesi_ujian');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Data Gagal Dihapus.</h5>
			</div>');    
			redirect('admin/ujian/sesi_ujian');
		}
	}
	public function delete_ujian($id_data_ujian=null){
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');
		$data['ujian'] = $this->sesi_ujian_model->get_data_by_id('data_ujian','id_data_ujian', $id_data_ujian);
		$id_sesi_ujian = $data['ujian']->id_sesi_ujian;

		$where = array('id_data_ujian' => $id_data_ujian);
		$delete = $this->sesi_ujian_model->delete($where,'data_ujian');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Data Berhasil Dihapus.</h5>
			</div>');    
			redirect('admin/ujian/sesi_ujian/peserta/'.$id_sesi_ujian);

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Data Gagal Dihapus.</h5>
			</div>');    
			redirect('admin/sesi_ujian/peserta/'.$id_sesi_ujian);
		}
	}
	public function peserta($id_sesi_ujian=null){

		$data['page_title'] = 'Data Ujian';
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		$data['data_ujian']=$this->sesi_ujian_model->get_data_ujian_join_data_mahasiswa_join_data_nilai_lengkap_by_id($id_sesi_ujian)->result();
		if ( empty($id_sesi_ujian)  ) redirect('admin/sesi_ujian');

		$this->load->view('v_admin/sesi_ujian/read_data_ujian',$data);
		
	}
}
