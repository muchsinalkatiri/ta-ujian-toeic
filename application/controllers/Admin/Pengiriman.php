<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengiriman extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Pengiriman';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');


		$query = $this->db->get('pengiriman_whatsapp')->row();

		$data['pengiriman'] = $query;

		$this->load->view('v_admin/pengiriman/read',$data);
	}

	public function edit($nama_api = null){

		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		if(empty($nama_api)) redirect('admin/pengiriman');

		$token = $this->input->post('token');

		$data = array('token' => $token);
		$where = array('nama_api' => $nama_api);

		if($this->db->update('pengiriman_whatsapp', $data, $where)){
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<span class=" fa fa-check" ></span> Token Berhasil Di Update.
			</div>');
			redirect('admin/pengiriman');
		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<span class=" fa fa-ban" ></span> Token Gagal Di Update.
			</div>');
			redirect('admin/pengiriman');
		}
	}
	
}
