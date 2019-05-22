<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ujian extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('data_ujian_dan_nilai_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}
	public function index(){

		$data['page_title'] = 'Data Ujian';
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		$data['data_ujian']=$this->data_ujian_dan_nilai_model->get_all_data_ujian()->result();

		$this->load->view('v_admin/data_ujian/read',$data);
		
	}
	public function delete($id_data_ujian=null){
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		$where = array('id_data_ujian' => $id_data_ujian);
		$delete = $this->data_ujian_dan_nilai_model->delete($where,'data_ujian');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Data Berhasil Dihapus.</h5>
			</div>');    
			redirect('admin/ujian/data_ujian');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Data Gagal Dihapus.</h5>
			</div>');    
			redirect('admin/ujian/data_ujian');
		}
	}
}
