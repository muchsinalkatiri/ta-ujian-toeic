<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Dashboard Mahasiswa';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ) 
			redirect('user/login');

		$this->load->view('v_mahasiswa/v_db',$data);
	}
	
}
