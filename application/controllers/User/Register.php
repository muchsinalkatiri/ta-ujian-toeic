<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('register_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Register';

		if($this->session->userdata('logged_in') || $this->session->userdata('level') == '0'|| $this->session->userdata('level') == '1' ){ 
			redirect('admin/dashboard');
		}elseif ($this->session->userdata('logged_in') || $this->session->userdata('level') == '2') {
			redirect('mahasiswa/dashboard');
		}

		//rule validasi
		$this->form_validation->set_rules('nim','Nim','required|numeric|exact_length[10]|is_unique[data_mahasiswa_terdaftar.nim]',
			array(
				'required'=>'Form Nim Wajib di isi.',
				'numeric'=>'nim harus diisi dengan angka',
				'exact_length'=>'nim harus berjumlah 10 angka',
				'is_unique' =>'Nim %s sudah ada')
			);
		$this->form_validation->set_rules('username','Username','required|min_length[3]',
			array(
				'required'=>'Form Username Wajib di isi.',
				'min_length'=>'Username yang anda masukan kurang panjang.',
				));
		$this->form_validation->set_rules('notlp2','No Telepon','required|numeric|min_length[3]|max_length[15]',
			array(
				'required'=>'Form No Telepon Wajib di isi.',
				'numeric'=>'No Telepon harus di isi dengan angka.',
				'min_length'=>'No Telepon yang anda masukan terlalu pendek',
				'max_length'=>'No Telepon yang anda masukan terlalu panjang',
				));
		$this->form_validation->set_rules('angkatan','Angkatan','required|numeric|exact_length[4]',
			array(
				'required'=>'Form Angkatan Tanggal Lahir di isi.',
				'exact_length'=>'Masukan Tahun Masuk Polinema',
				'numeric'=>'Masukan Tahun Masuk Polinema',
				));
		$this->form_validation->set_rules('email','Email','required|valid_email',
			array(
				'required'=>'Form email Wajib di isi.',
				'valid_email'=>'Masukan email yang benar',
				));
		$this->form_validation->set_rules('password','Password','required|alpha_numeric|min_length[6]|max_length[12]',
			array(
				'required'=>'Form Password Wajib di isi.',
				'alpha_numeric'=>'Password hanya boleh di isi dengan angka dan huruf',
				'min_length'=>'password yang anda masukan terlalu pendek.',
				'max_length'=>'password yang anda masukan terlalu panjang.'
				));
		$this->form_validation->set_rules('confirm_password','Konfirmasi Password','required|matches[password]',
			array(
				'required'=>'Form Konfirmasi Password Wajib di isi.',
				'matches'=>'Konfirmasi Password anda tidak sama dengan password'
				));

		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_users/v_register',$data);
		}
		else{
			$nim= $this->input->post('nim');
			$username = $this->input->post('username');
			$notlp2 = $this->input->post('notlp2');
			$angkatan = $this->input->post('angkatan');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$query = $this->db->get_where('data_mahasiswa', array('nim' => $nim));
			$check = $query->num_rows();

			$data = array(
				'nim'=>$nim,
				'username' => $username,
				'notlp2' => $notlp2,
				'angkatan'=> $angkatan,
				'email' => $email,
				'password' => $password,
				'tanggal_pendaftaran'=> date("Y-m-d H:i:s"),
				'foto' => 'default-user.png'
				);

			if ($check != 0){//jika nim sudah ada di data_mahasiswa
				if( empty($data['upload_error']) ) {
					$insert = $this->register_model->register('data_mahasiswa_terdaftar',$data);

					if ($insert) {
						$this->session->set_flashdata('msg',
							'<div class="alert alert-success">
							<h5> <span class=" fa fa-check" ></span> '.$nim.' berhasil ditambahkan. Silahkan melakukan Login</h5>
						</div>');    
						redirect('user/register');
					}else{
						$this->session->set_flashdata('msg',
							'<div class="alert alert-danger">
							<h5> <span class=" fa fa-cross" ></span> '.$nim.' gagal ditambahkan.</h5>
						</div>');    
						redirect('user/register');
					}	
				}
			}
			else{//jika nim belum ada di data_mahasiswa
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<span class=" fa fa-ban" ></span> NIM '.$nim.' ini belum terdaftar di sistem, silahkan hubungi admin untuk mendaftarkan.
				</div>');
			$this->load->view('v_users/v_register',$data);
			}

		}
	}
}
