<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa_terdaftar extends CI_Controller {

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
		if(!$this->session->userdata('logged_in')) 
			redirect('login/admin');

		$data['mahasiswa_terdaftar']=$this->mahasiswa_terdaftar_model->get_all_mahasiswa_terdaftar()->result();

		$this->load->view('v_admin/mahasiswa_terdaftar/read',$data);
	}


	public function create()
	{
		$data['page_title'] = 'Tambah Data Mahasiswa Terdaftar';
		// Must login
		if(!$this->session->userdata('logged_in')) 
			redirect('login/admin');

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
				'required'=>'Form Nim Tanggal Lahir di isi.',
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
				'required'=>'Form Alamat Wajib di isi.',
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
			if ( isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0 )
			{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 100;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

    	        // Load library upload
				$this->load->library('upload', $config);

    	        // Apakah file berhasil diupload?
				if ( ! $this->upload->do_upload('thumbnail'))
				{
					$data['upload_error'] = $this->upload->display_errors();

					$post_image = '';

    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
					$this->load->view('templates/header');
					$this->load->view('blogs/blog_create', $data);
					$this->load->view('templates/footer'); 

				} else {

    	        	// Simpan nama file-nya jika berhasil diupload
					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];
					
				}
			} else {

    			// User tidak upload gambar, jadi kita kosongkan field ini
				$post_image = '';
			}

			$nim= $this->input->post('nim');
			$username = $this->input->post('username');
			$notlp2 = $this->input->post('notlp2');
			$angkatan = $this->input->post('angkatan');
			$email = $this->input->post('email');

			$query = $this->db->get_where('data_mahasiswa', array('nim' => $nim));
			$check = $query->num_rows();

			if ($check != 0){//jika nim sudah ada di data_mahasiswa
				$data = array(
					'nim'=>$nim,
					'username' => $username,
					'notlp2' => $notlp2,
					'angkatan'=> $angkatan,
					'email' => $email,
					'tanggal_pendaftaran'=> date("Y-m-d H:i:s"),
					'foto' => 'default-user.png'
					);
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
			else{//jika nim belum ada di data_mahasiswa
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-ban" ></span> '.$nim.' ini belum terdaftar di sistem, silahkan daftarkan dahulu di data mahasiswa.</h5>
				</div>');
				redirect('admin/mahasiswa_terdaftar/create');
			}

		}
	}

}