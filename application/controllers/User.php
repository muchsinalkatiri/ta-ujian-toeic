<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('user_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

// 	}

// 	public function index()
// 	{
// 		$this->load->view('v_login');
// 	}

// 	public function login(){
// 		$data['page_title'] = 'Log In';

// 		$this->form_validation->set_rules('username', 'username', 'required');
// 		$this->form_validation->set_rules('password', 'Password', 'required');

// 		if($this->form_validation->run() === FALSE){
// 			$this->load->view('v_login');
// 		} else {
			
// 			// Get username
// 			$username = $this->input->post('username');
// 			// Get & encrypt password
// 			$password = md5($this->input->post('password'));

// 			// Login user
// 			$cek_user = $this->user_model->login('data_admin', array('username' => $username), array('password' => $password));
// 			if($cek_user != FALSE){
// 				foreach ($cek_user as $apps) {
// 					$session_data = array(
// 						'id_admin' => $apps->id_admin,
// 						'username' => $apps->username,
// 						'password' => $apps->password,
// 						'level' => $apps->level,
// 						'logged_in' => true,
// 						);
// 					$this->session->set_userdata($session_data);
// 					redirect('dashboard');
// 				}
// 			}

// 			else {
// 				// Set message
// 				$this->session->set_flashdata('login_failed', 'Login invalid');

// 				redirect('user');
// 			}		
// 		}
// 	}
// 	public	function logout(){
// 		$this->session->sess_destroy();
// 		redirect('user/login');
// 	}

// 	public function v_register()
// 	{
// 		$this->load->view('v_register');
// 	}

// }
