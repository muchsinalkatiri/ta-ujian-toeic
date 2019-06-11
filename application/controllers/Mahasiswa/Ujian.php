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
		$data['page_title'] = 'List Exam';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ) 
			redirect('user/login');
		
		$this->load->model('sesi_ujian_model');
		$data['sesi_ujian']=$this->sesi_ujian_model->get_all_data()->result();

		$this->load->view('v_mahasiswa/ujian/v_sesi_ujian',$data);
	}
	public function konfirmasi($id=null)
	{

		if($this->session->userdata('foto') == 'default-user.png'){
			$this->session->set_flashdata('msg',
				'<div class="alert alert-warning">
				<h5> <span class=" fa fa-exclamation-triangle" ></span> You must change your profile photo before starting the exam.</h5>
			</div>');    
			redirect('mahasiswa/user/edit');
		}
		$data['page_title'] = 'Exam Confirmation';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ) 
			redirect('user/login');
		$id_mahasiswa_terdaftar = $this->session->userdata('id_mahasiswa_terdaftar');

		$data['sesi']=$this->ujian_model->get_data_by_id($id);
		$data['ujian']=$this->ujian_model->get_data_ujian_by_id_mahasiswa_and_id_sesi($id,$id_mahasiswa_terdaftar);
		if ( !empty($data['ujian']) || empty($id) || !$data['sesi'] || $data['sesi']->status == 'dihentikan' || $data['sesi']->waktu_berakhir < date('Y-m-d H:i:s') || $data['sesi']->waktu_dimulai > date('Y-m-d H:i:s') ) redirect('mahasiswa/ujian');

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
		if ( !empty($data['ujian']) || empty($id) || !$data['sesi'] || $data['sesi']->status == 'dihentikan' || $data['sesi']->waktu_berakhir < date('Y-m-d H:i:s') || $data['sesi']->waktu_dimulai > date('Y-m-d H:i:s') ) redirect('mahasiswa/ujian');

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
				<h5> <span class=" fa fa-cross" ></span> Failed test added.</h5>
			</div>');    
			redirect('mahasiswa/ujian');
		}else{
			// echo $insert;
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-child" ></span> Have a great time doing it.</h5>
			</div>');    
			redirect('mahasiswa/ujian/pengerjaan/'.$insert);
		}	
		// $this->load->view('v_mahasiswa/ujian/v_konfirmasi_ujian',$data);
	}

	public function pengerjaan($id_data_ujian=null)
	{
		$data['page_title'] = 'Pengerjaan Ujian';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ) 
			redirect('user/login');
		$id_mahasiswa_terdaftar = $this->session->userdata('id_mahasiswa_terdaftar');

		$data['ujian']=$this->ujian_model->get_data_ujian_by_id_mahasiswa_and_id_ujian($id_data_ujian,$id_mahasiswa_terdaftar);
		if ( empty($data['ujian']) || empty($id_data_ujian) || $data['ujian']->waktu_berakhir < date("Y-m-d H:i:s") || $data['ujian']->status_pengerjaan != 'mengerjakan'  ) redirect('mahasiswa/ujian');

		$nama_paket = $data['ujian']->nama_paket;
		$data['paket']=$this->ujian_model->get_data_paket_by_nama_paket($nama_paket);

		$this->load->view('v_mahasiswa/ujian/v_pengerjaan',$data);
	}

	public function frameujian_listening($id_data_ujian_n_nomer_soal = null){
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ) 
			redirect('user/login');

		list($id_data_ujian, $nomer_soal) = explode('4_5', $id_data_ujian_n_nomer_soal); //split

		$id_mahasiswa_terdaftar = $this->session->userdata('id_mahasiswa_terdaftar');
		$data['ujian']=$this->ujian_model->get_data_ujian_by_id_mahasiswa_and_id_ujian($id_data_ujian,$id_mahasiswa_terdaftar);
		if ( empty($data['ujian']) || empty($id_data_ujian_n_nomer_soal) || $data['ujian']->waktu_berakhir < date("Y-m-d H:i:s")  ) redirect ('e404');

		$nama_paket =  $data['ujian']->nama_paket;
		$data['paket']=$this->ujian_model->get_data_paket_by_nama_paket($nama_paket);
		$data['soal']=$this->ujian_model->get_data_soal_by_nama_paket_n_nomer_soal($nama_paket,$nomer_soal);
		$data['jawaban']=$this->ujian_model->get_jawabanmahasiswa_by_id_data_ujian_and_nomer_soal($id_data_ujian,$nomer_soal);
		if(!empty($data['soal'])){
			$id_part = $data['soal']->id_part;
			$data['part']=$this->ujian_model->get_data_part_by_id_part($id_part);
			$id_kelompok_soal = $data['soal']->id_kelompok_soal;
			$data['kelompok']=$this->ujian_model->get_data_kelompok_by_id_kelompok($id_kelompok_soal);
		}
		$this->load->view('v_mahasiswa/ujian/v_frameujian_listening', $data);
	}
	public function frameujian_reading($id_data_ujian_n_nomer_soal = null){
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ) 
			redirect('user/login');

		list($id_data_ujian, $nomer_soal) = explode('4_5', $id_data_ujian_n_nomer_soal); //split

		$id_mahasiswa_terdaftar = $this->session->userdata('id_mahasiswa_terdaftar');
		$data['ujian']=$this->ujian_model->get_data_ujian_by_id_mahasiswa_and_id_ujian($id_data_ujian,$id_mahasiswa_terdaftar);
		if ( empty($data['ujian']) || empty($id_data_ujian_n_nomer_soal) || $data['ujian']->waktu_berakhir < date("Y-m-d H:i:s")  ) redirect ('e404');

		$nama_paket =  $data['ujian']->nama_paket;
		$data['paket']=$this->ujian_model->get_data_paket_by_nama_paket($nama_paket);
		$data['soal']=$this->ujian_model->get_data_soal_by_nama_paket_n_nomer_soal($nama_paket,$nomer_soal);
		$data['jawaban']=$this->ujian_model->get_jawabanmahasiswa_by_id_data_ujian_and_nomer_soal($id_data_ujian,$nomer_soal);
		if(!empty($data['soal'])){
			$id_part = $data['soal']->id_part;
			$data['part']=$this->ujian_model->get_data_part_by_id_part($id_part);
			$id_kelompok_soal = $data['soal']->id_kelompok_soal;
			$data['kelompok']=$this->ujian_model->get_data_kelompok_by_id_kelompok($id_kelompok_soal);
		}
		$this->load->view('v_mahasiswa/ujian/v_frameujian_reading', $data);
	}
	public function masukan_jawaban($redirect=null){
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ) 
			redirect('user/login');		
		if($redirect=="") redirect('mahasiswa/ujian/');

		$id_mahasiswa_terdaftar = $this->session->userdata('id_mahasiswa_terdaftar');
		$nomer_soal = $this->input->post('nomer_soal');
		if($nomer_soal >= 1 && $nomer_soal <= 100 ){$jenis_soal = 'listening';}else{$jenis_soal = 'reading';}
		$id_data_ujian = $this->input->post('id_data_ujian');
		$jawaban_siswa = $this->input->post('jawaban_siswa');

		$data['jawaban']=$this->ujian_model->get_jawabanmahasiswa_by_id_data_ujian_and_nomer_soal($id_data_ujian,$nomer_soal);

		if($redirect == 1){
			$rdr = $nomer_soal -1;
		}elseif ($redirect == 2) {
			$rdr = $nomer_soal +1;
		}elseif ($redirect == 0) {
			$rdr = $nomer_soal 	;
		}

		$data = array(
			'id_mahasiswa_terdaftar'=>$id_mahasiswa_terdaftar,
			'nomer_soal' => $nomer_soal,
			'jenis_soal' => $jenis_soal,
			'id_data_ujian' => $id_data_ujian,
			'jawaban' => $jawaban_siswa
			);
		$query = $this->db->get_where('jawaban_mahasiswa', array('jawaban_mahasiswa.id_data_ujian' => $id_data_ujian, 'nomer_soal' => $nomer_soal));
		$check = $query->num_rows();
		if ($check == 0){
			if(!empty($jawaban_siswa)){
				if($jawaban_siswa != $data['jawaban']->jawaban){
					$insert = $this->ujian_model->insert_jawaban('jawaban_mahasiswa',$data);
				}
			}
			redirect('mahasiswa/ujian/frameujian_'.$jenis_soal.'/'.$id_data_ujian."4_5".$rdr);	
		}else{
			$where = array(
				'id_data_ujian' => $id_data_ujian,
				'nomer_soal' => $nomer_soal
				);
			$data2 = array(
				'jawaban' => $jawaban_siswa
				);
			if(!empty($jawaban_siswa)){
				if($jawaban_siswa != $data['jawaban']->jawaban){
					$update = $this->ujian_model->update($where,$data2,'jawaban_mahasiswa');
				}
			}
			redirect('mahasiswa/ujian/frameujian_'.$jenis_soal.'/'.$id_data_ujian."4_5".$rdr);
		}
	}


	public function update_audio($cur, $id_data_ujian) {
		$this->db->update('data_ujian', array('audio_curent_time' => $cur), array('id_data_ujian' => $id_data_ujian));
	}	
}
