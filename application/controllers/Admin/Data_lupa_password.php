<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_lupa_password extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('forgot_password_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Data Lupa Password';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '0' ){ 
			redirect('user/login/admin');
		}

		$data['lp']=$this->forgot_password_model->get_all_data()->result();

		$this->load->view('v_admin/data_lupa_password/read',$data);
	}
	public function delete($id=null){
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '0' ) 
			redirect('user/login/admin');
		
		$where = array('id_token' => $id);
		$delete = $this->forgot_password_model->delete($where,'token_lupa_password');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Data Berhasil Dihapus.</h5>
			</div>');    
			redirect('admin/data_lupa_password');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Data Gagal Dihapus.</h5>
			</div>');    
			redirect('admin/data_lupa_password');
		}
	}

}