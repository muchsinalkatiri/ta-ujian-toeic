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
		redirect('mahasiswa/ujian');
	}
	
}
