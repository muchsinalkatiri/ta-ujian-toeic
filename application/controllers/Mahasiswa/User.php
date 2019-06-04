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

	public function edit($id_mahasiswa_terdaftar=null)
	{
		$data['page_title'] = 'Update Profile';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ){ 
			redirect('user/login');
		}

		$id_mahasiswa_terdaftar = $this->session->userdata('id_mahasiswa_terdaftar');
		$data['data_mahasiswa'] = $this->user_model->get_data_mahasiswa_by_id($id_mahasiswa_terdaftar);

				// Kita simpan dulu nama file yang lama
		$old_image = $data['data_mahasiswa']->foto;

		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id_mahasiswa_terdaftar) || !$data['data_mahasiswa'] ) redirect('admin/dashboard');

		//rule validasi
		$this->form_validation->set_rules('nama','Nama','required|min_length[3]',
			array(
				'required'=>'Form Nama Wajib di isi.',
				'min_length'=>'Nama yang anda masukan kurang panjang.',
				));
		if($this->input->post('username') != $data['data_mahasiswa']->username) {
			$is_unique =  '|is_unique[data_mahasiswa_lengkap.username]';
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
		if($this->input->post('email') != $data['data_mahasiswa']->email) {
			$is_unique =  '|is_unique[data_mahasiswa_lengkap.email]';
		} else {
			$is_unique =  '';
		}
		$this->form_validation->set_rules('email','Email','required|valid_email'.$is_unique,
			array(
				'required'=>'Form email Wajib di isi.',
				'valid_email'=>'Masukan email yang benar',
				'is_unique' =>'Email ini sudah ada'
				));
		$this->form_validation->set_rules('notlp2','No Telepon','required|numeric|min_length[3]|max_length[15]',
			array(
				'required'=>'Form No Telepon Wajib di isi.',
				'numeric'=>'No Telepon harusx di isi dengan angka.',
				'min_length'=>'No Telepon yang anda masukan terlalu pendek',
				'max_length'=>'No Telepon yang anda masukan terlalu panjang',
				));
		$this->form_validation->set_rules('alamat','Alamat','required|min_length[3]',
			array(
				'required'=>'Form Alamat Wajib di isi.',
				'min_length'=>'Alamat yang anda masukan kurang panjang.',
				));
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|min_length[3]|alpha',
			array(
				'required'=>'Form Tempat Lahir Wajib di isi.',
				'min_length'=>'Tempat Lahir yang anda masukan kurang panjang.',
				'alpha'=>'Tempat Lahir yang anda masukan harus berbentuk huruf.',
				));
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required',
			array(
				'required'=>'Form Tanggal Lahir Tanggal Lahir di isi.'
				));

		$this->form_validation->set_rules('confirm_password','Konfirmasi Password','required|matches[password]',
			array(
				'required'=>'Form Konfirmasi Password Wajib di isi.',
				'matches'=>'Konfirmasi Password anda tidak sama dengan password'
				));


		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_mahasiswa/user/v_edit_user',$data);
		}
		else{
			$nim = $this->input->post('nim');
			$id_mahasiswa_terdaftar = $this->session->userdata('id_mahasiswa_terdaftar');
			$username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$notlp2 = $this->input->post('notlp2');
			$alamat = $this->input->post('alamat');
			$email = $this->input->post('email');
			$ttl = $this->input->post('tempat_lahir').", ".$this->input->post('tanggal_lahir');
			$password = md5($this->input->post('password'));

			// Apakah user upload gambar?
			if ( isset($_FILES['foto']) && $_FILES['foto']['size'] > 0 ){//jika upload file
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
				$config['file_name'] 			= $this->input->post('nim').'-img-user';
				$config['upload_path']          = './uploads/img-user/';
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
						if ( file_exists( './uploads/img-user/'.$old_image ) ){
							if( $old_image != 'default-user.png' ) {
								unlink( './uploads/img-user/'.$old_image);
							}
						}else {
							echo 'File tidak ditemukan.';
						}
					}

	        	// Simpan nama file-nya jika berhasil diupload
					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];
					$data = array(
						'nama' => $nama,
						'alamat' => $alamat,
						'ttl' => $ttl,
						);
					$data2 = array(
						'username' => $username,
						'notlp2' => $notlp2,
						'email' => $email,
						'foto' => $post_image,
						'password' => $password,
						);
			//jika tidak ada error error
					if( empty($data['upload_error']) ) {
						$where = array(
							'nim' => $nim
							);

						$update = $this->user_model->update($where,$data,'data_mahasiswa');
						$update2 = $this->user_model->update($where,$data2,'data_mahasiswa_terdaftar');

						if ($update && $update2) {
							$this->session->set_flashdata('msg',
								'<div class="alert alert-success">
								<h5> <span class=" fa fa-check" ></span> '.$username.' berhasil diupdate.</h5>
							</div>');    
							$session_data = array(
								'id_mahasiswa_terdaftar' => $id_mahasiswa_terdaftar,
								'username' => $username,
								'password' => $password,
								'foto' => $post_image,
								'level' => $this->session->userdata('level'),
								'logged_in' => true,
								);
							$this->session->set_userdata($session_data);
							redirect('mahasiswa/user');
						}else{
							$this->session->set_flashdata('msg',
								'<div class="alert alert-danger">
								<h5> <span class=" fa fa-cross" ></span> '.$username.' gagal diupdate.</h5>
							</div>');    
							redirect('mahasiswa/user');
						}	
					}

				}
			}
			else{ //jika tidak upload file
					$data = array(
						'nama' => $nama,
						'alamat' => $alamat,
						'ttl' => $ttl,
						);
					$data2 = array(
						'username' => $username,
						'notlp2' => $notlp2,
						'email' => $email,
						'password' => $password,
						);
			//jika tidak ada error error
				if( empty($data['upload_error']) ) {
					$where = array(
						'nim' => $nim
						);

					$update = $this->user_model->update($where,$data,'data_mahasiswa');
					$update2 = $this->user_model->update($where,$data2,'data_mahasiswa_terdaftar');

					if ($update && $update2) {
						$this->session->set_flashdata('msg',
							'<div class="alert alert-success">
							<h5> <span class=" fa fa-check" ></span> '.$username.' berhasil diupdate.</h5>
						</div>');    
						$session_data = array(
							'id_mahasiswa_terdaftar' => $id_mahasiswa_terdaftar,
							'username' => $username,
							'password' => $password,
							'foto' => $old_image,
							'level' => $this->session->userdata('level'),
							'logged_in' => true,
							);
						$this->session->set_userdata($session_data);
						redirect('mahasiswa/user');
					}else{
						$this->session->set_flashdata('msg',
							'<div class="alert alert-danger">
							<h5> <span class=" fa fa-cross" ></span> '.$username.' gagal diupdate.</h5>
						</div>');    
						redirect('mahasiswa/user');
					}	
				}
			}
		}
	}


}
