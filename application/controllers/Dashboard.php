<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('user_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'DASHBOARD';
		// Must login
		if(!$this->session->userdata('logged_in')) 
			redirect('user');

		// $id_user = $this->session->userdata('id_user');
        // Dapatkan detail user
        // $data['user'] = $this->user_model->get_user_details( $user_id );
 		// $userData = $this->get_userdata();

        $this->load->view('v_admin/v_admin_header');
		$this->load->view('v_admin/v_db',$data);
        $this->load->view('v_admin/v_admin_footer');
	}
	
}
