<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_terdaftar extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('mahasiswa_terdaftar_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Data Mahasiswa Terdaftar';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		$data['mahasiswa_terdaftar']=$this->mahasiswa_terdaftar_model->get_all_mahasiswa_terdaftar()->result();

		$this->load->view('v_admin/mahasiswa_terdaftar/read',$data);
	}


	public function create()
	{
		$data['page_title'] = 'Tambah Data Mahasiswa Terdaftar';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		//rule validasi
		$this->form_validation->set_rules('nim','Nim','required|numeric|exact_length[10]|is_unique[data_mahasiswa_terdaftar.nim]',
			array(
				'required'=>'Form Nim Wajib di isi.',
				'numeric'=>'nim harus diisi dengan angka',
				'exact_length'=>'nim harus berjumlah 10 angka',
				'is_unique' =>'Nim ini sudah ada')
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
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[data_mahasiswa_terdaftar.email]',
			array(
				'required'=>'Form email Wajib di isi.',
				'valid_email'=>'Masukan email yang benar',
				'is_unique' =>'Email ini sudah ada'
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
		if (empty($_FILES['foto']['name']))
		{
			$this->form_validation->set_rules('foto','Foto','required',
				array(
					'required'=>'Gambar wajib Di isi'
					));
		}

		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_admin/mahasiswa_terdaftar/create',$data);
		}
		else{
			// Apakah user upload gambar?
			if ( isset($_FILES['foto']) && $_FILES['foto']['size'] > 0 )
			{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
				$config['upload_path']          = './uploads/img-user/';
				$config['allowed_types']        = 'jpg|png';
				$config['max_size']             = 1024;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$config['file_name'] 			= $this->input->post('nim').'-img-user';

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
					redirect('admin/mahasiswa_terdaftar/create');

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
				redirect('admin/mahasiswa_terdaftar/create');
			}

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
				'foto' => $post_image
				);

			if ($check != 0){//jika nim tidak ada di data_mahasiswa
				if( empty($data['upload_error']) ) {
					$insert = $this->mahasiswa_terdaftar_model->create('data_mahasiswa_terdaftar',$data);

					if ($insert) {
						$this->session->set_flashdata('msg',
							'<div class="alert alert-success">
							<h5> <span class=" fa fa-check" ></span> '.$nim.' berhasil ditambahkan.</h5>
						</div>');    
						redirect('admin/mahasiswa_terdaftar');
					}else{
						$this->session->set_flashdata('msg',
							'<div class="alert alert-danger">
							<h5> <span class=" fa fa-cross" ></span> '.$nim.' gagal ditambahkan.</h5>
						</div>');    
						redirect('admin/mahasiswa_terdaftar');
					}	
				}
			}
			else{//jika nim belum ada di data_mahasiswa
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<span class=" fa fa-ban" ></span>NIM '.$nim.' ini belum terdaftar di sistem, silahkan daftarkan dahulu di data mahasiswa.
				</div>');
				redirect('admin/mahasiswa_terdaftar/create');
			}

		}
	}
	public function update($id = NULL)
	{
		$data['page_title'] = 'Edit Data Mahasiswa Terdaftar';
		// Must login
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		// Get data dari model berdasarkan $id
		$data['mahasiswa_terdaftar'] = $this->mahasiswa_terdaftar_model->get_data_by_id($id);

				// Kita simpan dulu nama file yang lama
		$old_image = $data['mahasiswa_terdaftar']->foto;

		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id) || !$data['mahasiswa_terdaftar'] ) redirect('admin/mahasiswa_terdaftar');

		//rule validasi
		if($this->input->post('username') != $data['mahasiswa_terdaftar']->username) {
			$is_unique =  '|is_unique[data_mahasiswa_terdaftar.username]';
		} else {
			$is_unique =  '';
		}
		$this->form_validation->set_rules('username','Username','required|min_length[3]'.$is_unique,
			array(
				'required'=>'Form Username Wajib di isi.',
				'min_length'=>'Username yang anda masukan kurang panjang.',
				'is_unique' => 'Username ini sudah terdaftar.'
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
		if($this->input->post('email') != $data['mahasiswa_terdaftar']->email) {
			$is_unique =  '|is_unique[data_mahasiswa_terdaftar.email]';
		} else {
			$is_unique =  '';
		}
		$this->form_validation->set_rules('email','Email','required|valid_email'.$is_unique,
			array(
				'required'=>'Form email Wajib di isi.',
				'valid_email'=>'Masukan email yang benar',
				'is_unique' =>'Email ini sudah ada'
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
			$this->load->view('v_admin/mahasiswa_terdaftar/update',$data);
		}
		else{
			$id_mahasiswa_terdaftar= $this->input->post('id_mahasiswa_terdaftar');
			$nim= $this->input->post('nim');
			$username = $this->input->post('username');
			$notlp2 = $this->input->post('notlp2');
			$angkatan = $this->input->post('angkatan');
			$email = $this->input->post('email');
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

					$this->load->view('v_admin/mahasiswa_terdaftar/update',$data);
				}
				else{//jika berhasil upload
					if( $old_image != 'default-user.png' ) {
						if ( file_exists( './uploads/img-user/'.$old_image ) ){
							unlink( './uploads/img-user/'.$old_image);
						}else {
							echo 'File tidak ditemukan.';
						}
					}

	        	// Simpan nama file-nya jika berhasil diupload
					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];
					$data = array(
						'username' => $username,
						'notlp2' => $notlp2,
						'angkatan'=> $angkatan,
						'email' => $email,
						'password' => $password,
						'foto' => $post_image
						);
			//jika tidak ada error error
					if( empty($data['upload_error']) ) {
						$where = array(
							'id_mahasiswa_terdaftar' => $id_mahasiswa_terdaftar
							);

						$update = $this->mahasiswa_terdaftar_model->update($where,$data,'data_mahasiswa_terdaftar');

						if ($update) {
							$this->session->set_flashdata('msg',
								'<div class="alert alert-success">
								<h5> <span class=" fa fa-check" ></span> '.$nim.' berhasil diupdate.</h5>
							</div>');    
							redirect('admin/mahasiswa_terdaftar');
						}else{
							$this->session->set_flashdata('msg',
								'<div class="alert alert-danger">
								<h5> <span class=" fa fa-cross" ></span> '.$nim.' gagal diupdate.</h5>
							</div>');    
							redirect('admin/mahasiswa_terdaftar');
						}	
					}

				}
			}
			else{ //jika tidak upload file
				$data = array(
					'username' => $username,
					'notlp2' => $notlp2,
					'angkatan'=> $angkatan,
					'email' => $email,
					'password' => $password,
					'tanggal_pendaftaran'=> date("Y-m-d H:i:s")
					);
			//jika tidak ada error error
				if( empty($data['upload_error']) ) {
					$where = array(
						'id_mahasiswa_terdaftar' => $id_mahasiswa_terdaftar
						);

					$update = $this->mahasiswa_terdaftar_model->update($where,$data,'data_mahasiswa_terdaftar');

					if ($update) {
						$this->session->set_flashdata('msg',
							'<div class="alert alert-success">
							<h5> <span class=" fa fa-check" ></span> '.$nim.' berhasil diupdate.</h5>
						</div>');    
						redirect('admin/mahasiswa_terdaftar');
					}else{
						$this->session->set_flashdata('msg',
							'<div class="alert alert-danger">
							<h5> <span class=" fa fa-cross" ></span> '.$nim.' gagal diupdate.</h5>
						</div>');    
						redirect('admin/mahasiswa_terdaftar');
					}	
				}
			}
		}
	}

	public function delete($id=null)
	{
		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == '2' ) 
			redirect('user/login/admin');

		$data['page_title'] = 'Delete mahasiswa terdaftar';

		// Get data dari model berdasarkan $id
		$data['mahasiswa_terdaftar'] = $this->mahasiswa_terdaftar_model->get_data_by_id($id);

		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id) || !$data['mahasiswa_terdaftar'] ) show_404();

		// Kita simpan dulu nama file yang lama
		$old_image = $data['mahasiswa_terdaftar']->foto;

    	// Hapus file image yang lama jika ada
		if( !empty($old_image) ) {
			if ( file_exists( './uploads/img-user/'.$old_image ) ){
				unlink( './uploads/img-user/'.$old_image );
			} 
			// else {
			// 	echo 'File tidak ditemukan.';
			// }
		}

		// Hapus data sesuai id-nya
		$where = array('id_mahasiswa_terdaftar' => $id);
		$delete = $this->mahasiswa_terdaftar_model->delete($where,'data_mahasiswa_terdaftar');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Data Berhasil Dihapus.</h5>
			</div>');    
			redirect('admin/mahasiswa_terdaftar');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Data Gagal Dihapus.</h5>
			</div>');    
			redirect('admin/mahasiswa_terdaftar');
		}
	}
}