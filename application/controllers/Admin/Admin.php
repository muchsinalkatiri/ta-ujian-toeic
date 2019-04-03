<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('admin_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Data Admin';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '0' ){ 
			redirect('user/login/admin');
		}

		$data['admin']=$this->admin_model->get_all_admin()->result();

		$this->load->view('v_admin/admin/read',$data);
	}


	public function create()
	{
		$data['page_title'] = 'Tambah Data Admin';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '0' ){ 
			redirect('user/login/admin');
		}

		//rule validasi
		$this->form_validation->set_rules('nama','Nama','required|min_length[3]',
			array(
				'required'=>'Form Nama Wajib di isi.',
				'min_length'=>'Nama yang anda masukan kurang panjang.',
				));
		$this->form_validation->set_rules('username','Username','required|min_length[3]|is_unique[data_admin.username]',
			array(
				'required'=>'Form Username Wajib di isi.',
				'min_length'=>'Username yang anda masukan kurang panjang.',
				'is_unique' =>'Username ini sudah ada'
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
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[data_admin.email]',
			array(
				'required'=>'Form email Wajib di isi.',
				'valid_email'=>'Masukan email yang benar',
				'is_unique' =>'Email ini sudah ada'
				));
		if (empty($_FILES['foto']['name']))
		{
			$this->form_validation->set_rules('foto','Foto','required',
				array(
					'required'=>'Gambar wajib Di isi'
					));
		}

		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_admin/admin/create',$data);
		}
		else{
			// Apakah user upload gambar?
			if ( isset($_FILES['foto']) && $_FILES['foto']['size'] > 0 )
			{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
				$config['upload_path']          = './uploads/img-user/admin/';
				$config['allowed_types']        = 'jpg|png';
				$config['max_size']             = 1024;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$config['file_name'] 			= $this->input->post('username').'-img-admin';

    	        // Load library upload
				$this->load->library('upload', $config);

    	        // Apakah file berhasil diupload?
				if ( ! $this->upload->do_upload('foto'))
				{
					$data['upload_error'] = $this->upload->display_errors();

    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang

					$this->session->set_flashdata('msg',
						'<div class="alert alert-danger">
						<span class=" fa fa-ban" ></span> '.$this->upload->display_errors().'
					</div>');
					redirect('admin/admin/create');

				} else {

    	        	// Simpan nama file-nya jika berhasil diupload
					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

				}
			} else {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<span class=" fa fa-ban" ></span> silahkan memasukan gambar terlebih dahulu
				</div>');
				redirect('admin/admin/create');
			}

			$username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$data = array(
				'username' => $username,
				'nama' => $nama,
				'password' => $password,
				'tanggal_pendaftaran'=> date("Y-m-d H:i:s"),
				'foto' => $post_image,
				'level' => '1',
				'email' => $email
				);

			if( empty($data['upload_error']) ) {
				$insert = $this->admin_model->create('data_admin',$data);

				if ($insert) {
					$this->session->set_flashdata('msg',
						'<div class="alert alert-success">
						<h5> <span class=" fa fa-check" ></span> '.$username.' berhasil ditambahkan.</h5>
					</div>');    
					redirect('admin/admin');
				}else{
					$this->session->set_flashdata('msg',
						'<div class="alert alert-danger">
						<h5> <span class=" fa fa-cross" ></span> '.$username.' gagal ditambahkan.</h5>
					</div>');    
					redirect('admin/admin');
				}	
			}
		}
	}

	public function update($id = NULL)
	{
		$data['page_title'] = 'Edit Data Admin';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '0' ){ 
			redirect('user/login/admin');
		}

		// Get data dari model berdasarkan $id
		$data['admin'] = $this->admin_model->get_data_by_id($id);

				// Kita simpan dulu nama file yang lama
		$old_image = $data['admin']->foto;

		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id) || !$data['admin'] ) redirect('admin/admin');

		//rule validasi
		$this->form_validation->set_rules('nama','Nama','required|min_length[3]',
			array(
				'required'=>'Form Nama Wajib di isi.',
				'min_length'=>'Nama yang anda masukan kurang panjang.',
				));
		if($this->input->post('username') != $data['admin']->username) {
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
		$this->form_validation->set_rules('confirm_password','Konfirmasi Password','required|matches[password]',
			array(
				'required'=>'Form Konfirmasi Password Wajib di isi.',
				'matches'=>'Konfirmasi Password anda tidak sama dengan password'
				));
		if($this->input->post('email') != $data['admin']->email) {
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


		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_admin/admin/update',$data);
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

					$this->load->view('v_admin/admin/update',$data);
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
						'level' => '1',
						'email' => $email
						);
			//jika tidak ada error error
					if( empty($data['upload_error']) ) {
						$where = array(
							'id_admin' => $id_admin
							);

						$update = $this->admin_model->update($where,$data,'data_admin');

						if ($update) {
							$this->session->set_flashdata('msg',
								'<div class="alert alert-success">
								<h5> <span class=" fa fa-check" ></span> '.$username.' berhasil diupdate.</h5>
							</div>');    
							redirect('admin/admin');
						}else{
							$this->session->set_flashdata('msg',
								'<div class="alert alert-danger">
								<h5> <span class=" fa fa-cross" ></span> '.$username.' gagal diupdate.</h5>
							</div>');    
							redirect('admin/admin');
						}	
					}

				}
			}
			else{ //jika tidak upload file
				$data = array(
					'username' => $username,
					'nama' => $nama,
					'password' => $password,
					'email' => $email
					);
			//jika tidak ada error error
				if( empty($data['upload_error']) ) {
					$where = array(
						'id_admin' => $id_admin
						);

					$update = $this->admin_model->update($where,$data,'data_admin');

					if ($update) {
						$this->session->set_flashdata('msg',
							'<div class="alert alert-success">
							<h5> <span class=" fa fa-check" ></span> '.$username.' berhasil diupdate.</h5>
						</div>');    
						redirect('admin/admin');
					}else{
						$this->session->set_flashdata('msg',
							'<div class="alert alert-danger">
							<h5> <span class=" fa fa-cross" ></span> '.$nim.' gagal diupdate.</h5>
						</div>');    
						redirect('admin/admin');
					}	
				}
			}
		}
	}

	public function delete($id=null)
	{
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '0' ){ 
			redirect('user/login/admin');
		}elseif($id == '1'){
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-ban" ></span> Akun Super Admin Tidak Bisa Dihapus.</h5>
			</div>');    
			redirect('admin/admin');
		}
		
		$data['page_title'] = 'Delete Admin';

		// Get data dari model berdasarkan $id
		$data['admin'] = $this->admin_model->get_data_by_id($id);

		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id) || !$data['admin'] ) show_404();

		// Kita simpan dulu nama file yang lama
		$old_image = $data['admin']->foto;

    	// Hapus file image yang lama jika ada
		if( !empty($old_image) ) {
			if ( file_exists( './uploads/img-user/admin/'.$old_image ) ){
				unlink( './uploads/img-user/admin/'.$old_image );
			}
		}

		// Hapus data sesuai id-nya
		$where = array('id_admin' => $id);
		$delete = $this->admin_model->delete($where,'data_admin');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Data Berhasil Dihapus.</h5>
			</div>');    
			redirect('admin/admin');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Data Gagal Dihapus.</h5>
			</div>');    
			redirect('admin/admin');
		}
	}

}