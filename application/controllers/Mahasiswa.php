<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('user_model');
		$this->load->model('mahasiswa_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Data Mahasiswa';
		// Must login
		if(!$this->session->userdata('logged_in')) 
			redirect('user');

		$data['mahasiswa']=$this->mahasiswa_model->get_all_mahasiswa()->result();

        $this->load->view('v_admin/v_admin_header');
		$this->load->view('v_admin/mahasiswa/daftar_mahasiswa',$data);
        $this->load->view('v_admin/v_admin_footer');
	}
	
}
