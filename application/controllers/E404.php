<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class E404 extends CI_Controller {

	public function index()
	{
		$data['page_title'] = '';
		$this->load->view('errors/error404.php',$data);
	}
}
