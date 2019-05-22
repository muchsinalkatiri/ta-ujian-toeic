<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_nilai extends CI_Controller {

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

		$data['data_nilai']=$this->data_ujian_dan_nilai_model->get_all_data_nilai()->result();

		$this->load->view('v_admin/data_nilai/read',$data);
		
	}
	public function delete($id_data_nilai=null){
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		$where = array('id_data_nilai' => $id_data_nilai);
		$delete = $this->data_ujian_dan_nilai_model->delete($where,'data_nilai');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Data Berhasil Dihapus.</h5>
			</div>');    
			redirect('admin/ujian/data_nilai');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Data Gagal Dihapus.</h5>
			</div>');    
			redirect('admin/ujian/data_nilai');
		}
	}
}
