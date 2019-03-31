<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class error extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
 
	}

	public function index()
	{

		$data['page_title'] = '';
		$this->load->view('errors/error404.php',$data);
	}
}
