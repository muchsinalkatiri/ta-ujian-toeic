<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));
		$this->load->model('ujian_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'List Ujian';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ) 
			redirect('user/login');
		
		$this->load->model('sesi_ujian_model');
		$data['sesi_ujian']=$this->sesi_ujian_model->get_all_data()->result();

		$this->load->view('v_mahasiswa/ujian/v_sesi_ujian',$data);
	}
	public function konfirmasi($id=null)
	{
		$data['page_title'] = 'Konfirmasi Ujian';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ) 
			redirect('user/login');
		$id_mahasiswa_terdaftar = $this->session->userdata('id_mahasiswa_terdaftar');

		$data['sesi']=$this->ujian_model->get_data_by_id($id);
		$data['ujian']=$this->ujian_model->get_data_ujian_by_id_mahasiswa_and_id_sesi($id,$id_mahasiswa_terdaftar);
		if ( !empty($data['ujian']) || empty($id) || !$data['sesi'] || $data['sesi']->status == 'dihentikan' || $data['sesi']->waktu_berakhir < date('Y-m-d H:i:s') ) redirect('mahasiswa/ujian');

		$this->load->view('v_mahasiswa/ujian/v_konfirmasi_ujian',$data);
	}
	public function create_ujian()
	{
		$data['page_title'] = 'Create Ujian';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ) 
			redirect('user/login');

		$id = $this->input->post('id_sesi_ujian');
		
		$data['sesi']=$this->ujian_model->get_data_by_id($id);
		$data['ujian']=$this->ujian_model->get_data_ujian_by_id_mahasiswa_and_id_sesi($id,$id_mahasiswa_terdaftar);
		if ( !empty($data['ujian']) || empty($id) || !$data['sesi'] || $data['sesi']->status == 'dihentikan' || $data['sesi']->waktu_berakhir < date('Y-m-d H:i:s') ) redirect('mahasiswa/ujian');

		$id_mahasiswa_terdaftar = $this->session->userdata('id_mahasiswa_terdaftar');
		
		$this->db->select('nama_paket')->from('data_paket')->order_by("nama_paket", "random")->limit(1);
		$result = $this->db->get()->result(); 

		$nama_paket = $result[0]->nama_paket;
		$waktu_dimulai = date("Y-m-d H:i:s");
		// $waktu_berakhir = date("Y-m-d H:i:s", strtotime("+$data['sesi']->durasi sec"));
		$selisih = strtotime($data['sesi']->waktu_berakhir) - strtotime($waktu_dimulai); //selisih antara waktumulai mahasiswa dan waktu terakhir sesi
		if ($selisih < $data['sesi']->durasi) {//jika selisih dibawa 2 jam, waktu mulai ditambah dengan selisi
			$waktu_berakhir = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s"))+$selisih);
			$sisa_waktu = $selisih;
		}else{//jika selsih diatas 2 jam, waktu mulai ditambah dengan dengan durasi asli ujian
			$waktu_berakhir = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s"))+$data['sesi']->durasi);
			$sisa_waktu = $data['sesi']->durasi;
		}

		$data = array(
			'id_mahasiswa_terdaftar' => $id_mahasiswa_terdaftar,
			'id_sesi_ujian' => $id,
			'nama_paket' => $nama_paket,
			'waktu_dimulai' => $waktu_dimulai,
			'waktu_berakhir' => $waktu_berakhir,
			'waktu_selesai' => '',
			'sisa_waktu' => $sisa_waktu,
			'status_pengerjaan' => 'mengerjakan',
			);
		$insert = $this->ujian_model->create_ujian('data_ujian',$data); //return nya id ujian

		if (!$insert) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Ujian gagal ditambahkan.</h5>
			</div>');    
			redirect('mahasiswa/ujian');
		}else{
			echo $insert;
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Selamat Mengerjakan.</h5>
			</div>');    
			redirect('mahasiswa/ujian/pengerjaan/'.$insert);
		}	
		// $this->load->view('v_mahasiswa/ujian/v_konfirmasi_ujian',$data);
	}

	
}
