<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('user_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index()
	{
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ) 
			redirect('user/login');

		$data['page_title'] = 'Profile User';

		$id = $this->session->userdata('id_mahasiswa_terdaftar');
		$data['data_mahasiswa_terdaftar'] = $this->user_model->get_data_mahasiswa_by_id($id);

		$this->load->view('v_mahasiswa/user/v_user',$data);
	}

	public function edit()
	{
		$data['page_title'] = 'Edit User';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ){ 
			redirect('user/login');
		}

		$id = $this->session->userdata('id_admin');
		$data['data_mahasiswa_terdaftar'] = $this->user_model->get_data_mahasiswa_by_id($id);

				// Kita simpan dulu nama file yang lama
		$old_image = $data['data_user']->foto;

		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id) || !$data['data_user'] ) redirect('admin/dashboard');

		//rule validasi
		$this->form_validation->set_rules('nama','Nama','required|min_length[3]',
			array(
				'required'=>'Form Nama Wajib di isi.',
				'min_length'=>'Nama yang anda masukan kurang panjang.',
				));
		if($this->input->post('username') != $data['data_user']->username) {
			$is_unique =  '|is_unique[data_admin.username]';
		} else {
			$is_unique =  '';
		}
		$this->form_validation->set_rules('username','Username','required|min_length[3]'.$is_unique,
			array(
				'required'=>'Form Username Wajib di isi.',
				'min_length'=>'Username yang anda masukan kurang panjang.',
				'is_unique' => 'Username ini sudah terdaftar.'
				));
		$this->form_validation->set_rules('password','Password','required|alpha_numeric|min_length[6]|max_length[12]',
			array(
				'required'=>'Form Password Wajib di isi.',
				'alpha_numeric'=>'Password hanya boleh di isi dengan angka dan huruf',
				'min_length'=>'password yang anda masukan terlalu pendek.',
				'max_length'=>'password yang anda masukan terlalu panjang.'
				));
		if($this->input->post('email') != $data['data_user']->email) {
			$is_unique =  '|is_unique[data_admin.email]';
		} else {
			$is_unique =  '';
		}
		$this->form_validation->set_rules('email','Email','required|valid_email'.$is_unique,
			array(
				'required'=>'Form email Wajib di isi.',
				'valid_email'=>'Masukan email yang benar',
				'is_unique' =>'Email ini sudah ada'
				));

		$this->form_validation->set_rules('confirm_password','Konfirmasi Password','required|matches[password]',
			array(
				'required'=>'Form Konfirmasi Password Wajib di isi.',
				'matches'=>'Konfirmasi Password anda tidak sama dengan password'
				));


		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_admin/user/v_edit_user',$data);
		}
		else{
			$id_admin= $this->input->post('id_admin');
			$username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$password = md5($this->input->post('password'));
			$email = $this->input->post('email');

			// Apakah user upload gambar?
			if ( isset($_FILES['foto']) && $_FILES['foto']['size'] > 0 ){//jika upload file
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
				$config['file_name'] 			= $this->input->post('username').'-img-user';
				$config['upload_path']          = './uploads/img-user/admin/';
				$config['allowed_types']        = 'jpg|png';
				$config['max_size']             = 1024;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

    	        // Load library upload
				$this->load->library('upload', $config);

    	        // Apakah file berhasil diupload?
				if ( ! $this->upload->do_upload('foto')){//jika gagal upload
    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang

					$this->session->set_flashdata('msg',
						'<div class="alert alert-danger">
						<span class=" fa fa-ban" ></span> '.$this->upload->display_errors().'
					</div>');

					$this->load->view('v_admin/user/v_edit_user',$data);
				}
				else{//jika berhasil upload
					if( !empty($old_image) ) {
						if ( file_exists( './uploads/img-user/admin/'.$old_image ) ){
							unlink( './uploads/img-user/admin/'.$old_image);
						}else {
							echo 'File tidak ditemukan.';
						}
					}

	        	// Simpan nama file-nya jika berhasil diupload
					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];
					$data = array(
						'username' => $username,
						'nama' => $nama,
						'password' => $password,
						'foto' => $post_image,
						'email' =>$email
						);
			//jika tidak ada error error
					if( empty($data['upload_error']) ) {
						$where = array(
							'id_admin' => $id_admin
							);

						$update = $this->user_model->update($where,$data,'data_admin');

						if ($update) {
							$this->session->set_flashdata('msg',
								'<div class="alert alert-success">
								<h5> <span class=" fa fa-check" ></span> '.$username.' berhasil diupdate.</h5>
							</div>');    
							$session_data = array(
								'id_admin' => $id,
								'username' => $username,
								'password' => $password,
								'foto' => $post_image,
								'level' => $this->session->userdata('level'),
								'logged_in' => true,
								);
							$this->session->set_userdata($session_data);
							redirect('admin/user');
						}else{
							$this->session->set_flashdata('msg',
								'<div class="alert alert-danger">
								<h5> <span class=" fa fa-cross" ></span> '.$username.' gagal diupdate.</h5>
							</div>');    
							redirect('admin/user');
						}	
					}

				}
			}
			else{ //jika tidak upload file
				$data = array(
					'username' => $username,
					'nama' => $nama,
					'password' => $password,
					'email' =>$email
					);
			//jika tidak ada error error
				if( empty($data['upload_error']) ) {
					$where = array(
						'id_admin' => $id_admin
						);

					$update = $this->user_model->update($where,$data,'data_admin');

					if ($update) {
						$this->session->set_flashdata('msg',
							'<div class="alert alert-success">
							<h5> <span class=" fa fa-check" ></span> '.$username.' berhasil diupdate.</h5>
						</div>');    
						$session_data = array(
							'id_admin' => $id,
							'username' => $username,
							'password' => $password,
							'foto' => $old_image,
							'level' => $this->session->userdata('level'),
							'logged_in' => true,
							);
						$this->session->set_userdata($session_data);
						redirect('admin/user');
					}else{
						$this->session->set_flashdata('msg',
							'<div class="alert alert-danger">
							<h5> <span class=" fa fa-cross" ></span> '.$username.' gagal diupdate.</h5>
						</div>');    
						redirect('admin/user');
					}	
				}
			}
		}
	}


}
