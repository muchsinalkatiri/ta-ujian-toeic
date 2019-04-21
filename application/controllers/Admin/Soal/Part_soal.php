<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Part_soal extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('Soal/part_soal_model');
		$this->load->model('Soal/paket_soal_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index(){
		redirect('admin/soal/paket_soal');
	}

	public function listening($nama_paket=null)
	{
		$data['page_title'] = 'Data Part Soal : Listening';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
			redirect('user/login/admin');
		}

		$nama_paket = str_replace('%20', ' ', $nama_paket);
		$data['paket_soal']=$this->paket_soal_model->get_data_by_nama($nama_paket);

		$data['part_soal']=$this->part_soal_model->get_all_data_where_listening($nama_paket)->result();

		if ( empty($nama_paket) || !$data['paket_soal'] ) redirect('admin/soal/paket_soal');

		$this->form_validation->set_rules('penjelasan_listening','Penjelasan Listening','required|min_length[10]',
			array(
				'required'=>'Form Ini Wajib di isi.',
				'min_length'=>'Penjelasan yang anda masukan kurang panjang.',
				));
		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_admin/soal/part_soal/listening',$data);
		}
		else{
			$penjelasan_listening= $this->input->post('penjelasan_listening');
			$data = array(
				'penjelasan_listening'=> $penjelasan_listening,
				);
			$where = array(
				'nama_paket' => $nama_paket
				);
			$update = $this->paket_soal_model->update($where,$data,'data_paket');
			if ($update) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> Penjelasan Listening berhasil simpan.</h5>
				</div>');    
				redirect('admin/soal/part_soal/listening/'.$nama_paket);
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					// <h5> <span class=" fa fa-cross" ></span> Penjelasan Listening gagal simpan.</h5>
				</div>');    
				redirect('admin/soal/part_soal/listening/'.$nama_paket);
			}
		}
	}
	public function reading($nama_paket=null)
	{
		$data['page_title'] = 'Data Part Soal : Reading';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
			redirect('user/login/admin');
		}

		$nama_paket = str_replace('%20', ' ', $nama_paket);
		$data['paket_soal']=$this->paket_soal_model->get_data_by_nama($nama_paket);

		$data['part_soal']=$this->part_soal_model->get_all_data_where_reading($nama_paket)->result();

		if ( empty($nama_paket) || !$data['paket_soal'] ) redirect('admin/soal/paket_soal');

		$this->form_validation->set_rules('penjelasan_reading','Penjelasan reading','required|min_length[10]',
			array(
				'required'=>'Form Ini Wajib di isi.',
				'min_length'=>'Penjelasan yang anda masukan kurang panjang.',
				));
		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_admin/soal/part_soal/reading',$data);
		}
		else{
			$penjelasan_reading= $this->input->post('penjelasan_reading');
			$data = array(
				'penjelasan_reading'=> $penjelasan_reading,
				);
			$where = array(
				'nama_paket' => $nama_paket
				);
			$update = $this->paket_soal_model->update($where,$data,'data_paket');
			if ($update) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> Penjelasan Reading berhasil simpan.</h5>
				</div>');    
				redirect('admin/soal/part_soal/reading/'.$nama_paket);
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					// <h5> <span class=" fa fa-cross" ></span> Penjelasan Reading gagal simpan.</h5>
				</div>');    
				redirect('admin/soal/part_soal/reading/'.$nama_paket);
			}
		}
	}
	public function directions_example($id_part=null)
	{
		$data['page_title'] = 'Directions & Example';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
			redirect('user/login/admin');
		}

		$data['part_soal']=$this->part_soal_model->get_data_by_id($id_part);

		// if ( empty($id_part) || !$data['part_soal'] ) redirect('admin/soal/paket_soal');

		$this->load->view('v_admin/soal/part_soal/update',$data);
	}

	public function directions()
	{
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
			redirect('user/login/admin');
		}
		$id_part = $this->input->post('id_part');
		$directions = $this->input->post('directions', FALSE);

		$data = array(
			'directions' => $directions
			);
		$where = array(
			'id_part' => $id_part
			);
		$update = $this->part_soal_model->update($where,$data,'data_part_soal');
		if ($update) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Directions berhasil ditambahkan.</h5>
			</div>');    
			redirect('admin/soal/part_soal/directions_example/'.$id_part);
		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Directions gagal ditambahkan.</h5>
			</div>');    
			redirect('admin/soal/part_soal/directions_example/'.$id_part);
		}
	}
	public function example()
	{
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ){ 
			redirect('user/login/admin');
		}
		$id_part = $this->input->post('id_part');
		$example = $this->input->post('example', FALSE);

		$data = array(
			'example' => $example
			);
		$where = array(
			'id_part' => $id_part
			);
		$update = $this->part_soal_model->update($where,$data,'data_part_soal');
		if ($update) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Example berhasil ditambahkan.</h5>
			</div>');    
			redirect('admin/soal/part_soal/directions_example/'.$id_part);
		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Example gagal ditambahkan.</h5>
			</div>');    
			redirect('admin/soal/part_soal/directions_example/'.$id_part);
		}
	}
}