<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('forgot_password_model');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));

	}

	public function base64url_encode($data) {   
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');   
	}   

	public function base64url_decode($data) {   
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));   
	}   

	public function index()
	{
		$data['page_title'] = 'Forgot the password - Admin';

		if($this->session->userdata('logged_in') || $this->session->userdata('level') == '0'|| $this->session->userdata('level') == '1' ){ 
			redirect('admin/dashboard');
		}elseif ($this->session->userdata('logged_in') || $this->session->userdata('level') == '2') {
			redirect('mahasiswa/dashboard');
		}

		$this->form_validation->set_rules('email','Email','required|valid_email',
			array(
				'required'=>'Form email Wajib di isi.',
				'valid_email'=>'Masukan email yang benar',
				));
		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_users/v_forgot_password',$data);
		}else{
			$email = $this->input->post('email');  
			$userInfo = $this->forgot_password_model->get_data_admin_by_email($email);  

			if(!$userInfo){
				$this->session->set_flashdata('emailMsg','
					<div class="col-sm-12" >
						<div id="notifications">
							<div  class="text-xs font-weight-bold text-danger text-uppercase mb-1">Email yang anda masukan tidak terdaftar</div>
						</div>
					</div>');    

				redirect('user/forgot_password');
			}

			$token = substr(sha1(rand()), 0, 30);  //buat token acak
			$id_user = $userInfo->id_admin;
			if($userInfo->level == '0'){
				$tipe_user = 'Super Admin';
			}elseif($userInfo->level == '1'){
				$tipe_user = 'Admin';
			}
			$data = array(
				'token' => $token,
				'id_user' => $id_user,
				'tanggal_pembuatan'=> date('Y-m-d'),
				'tipe_user'=> $tipe_user,
				'status_reset' => 'Belum diganti',
				'tanggal_ganti_password' => '',
				);

            $token = $this->forgot_password_model->insertToken('token_lupa_password',$data); //return gabungan dari token & id
            $qstring = $this->base64url_encode($token);    //enkripsi menggunakan fungsi base64url

            $url = site_url() . 'user/forgot_password/reset_password/token/' . $qstring;  //digabungkan dengan base url
            $link = '<a href="' . $url . '">' . $url . '</a>';  //dibuat klik

            $message = '';             
            $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
            password anda.</strong><br>';  
            $message .= '<strong>Silakan klik link ini:</strong> ' . $link;         

      $subyek = "Kode Lupa Password | Sistem Informasi Ujian Online Toiec JTI Polinema";

        $send_email = send_email(array($email), $subyek, $message);
        if ($send_email) {
            	$this->session->set_flashdata('msg1','
            		<div id="notifications">
            			<div class="alert alert-success">
            				<center><h5><span class=" fa fa-check" ></span> Permintaan untuk reset password telah dikirim ke email. Silahkan cek ke email anda untuk melakukan langkah selanjutnya</h5></center>
            			</div>
            		</div>
            		'); 
            }else{
             	$this->session->set_flashdata('msg1','
            		<div id="notifications">
            			<div class="alert alert-danger">
            				<center><h5><span class=" fa fa-ban" ></span> Permintaan untuk reset password gagal dikirim ke email. Pastikan Internet anda berjalan dengan baik</h5></center>
            			</div>
            		</div>
            		');  
            }
            redirect('user/login/admin');
        }
    }
    public function reset_password(){
    	if($this->session->userdata('logged_in') || $this->session->userdata('level') == '0'|| $this->session->userdata('level') == '1' ){ 
    		redirect('admin/dashboard');
    	}elseif ($this->session->userdata('logged_in') || $this->session->userdata('level') == '2') {
    		redirect('mahasiswa/dashboard');
    	}

    	$data['page_title'] = 'Reset Password - Admin';
    	$token = $this->base64url_decode($this->uri->segment(5));           

		$id_user = $this->forgot_password_model->isTokenValid($token); //ngambil id dari return di model
		// $user_info = $this->forgot_password_model->get_data_admin_by_id($id_user);  

		if(!$id_user){  
			$this->session->set_flashdata('msg','
				<div id="notifications">
					<div class="alert alert-danger">
						<center><h5><span class=" fa fa-ban" ></span> Token tidak valid atau kadaluarsa.</h5></center>
					</div>
				</div>
				');   
			redirect('user/forgot_password');
		}    
		$data = array(  
			'token'=>$this->base64url_encode($token)  
			);  

		$this->form_validation->set_rules('password','Password','required|alpha_numeric|min_length[6]|max_length[12]',
			array(
				'required'=>'Form Password Wajib di isi.',
				'alpha_numeric'=>'Password hanya boleh di isi dengan angka dan huruf',
				'min_length'=>'password yang anda masukan terlalu pendek.',
				'max_length'=>'password yang anda masukan terlalu panjang.'
				));
		$this->form_validation->set_rules('konfirmasi_password','Konfirmasi Password','required|matches[password]',
			array(
				'required'=>'Form Konfirmasi Password Wajib di isi.',
				'matches'=>'Konfirmasi Password anda tidak sama dengan password'
				));

		if ($this->form_validation->run() == FALSE) {  
			$data['page_title'] = 'Reset Password - Admin';  
			$this->load->view('v_users/v_reset_password',$data); 
		}else{  
			//update password
			$password = md5($this->input->post('password')); 
			$data1 = array(
				'password' => $password
				);
			$where1 = array(
				'id_admin' => $id_user
				);
			$update1 = $this->forgot_password_model->updatePassword($where1,$data1,'data_admin');

			//update tabel token
			$data2 = array(
				'status_reset' => 'Diganti',
				'tanggal_ganti_password' => date("Y-m-d H:i:s"),
				); 
			$tkn = substr($token,0,30); //misah token denga id
			$where2 = array(
				'token' => $tkn
				);
			$update2 = $this->forgot_password_model->updateDataToken($where2,$data2,'token_lupa_password');

			if($update1 && $update2){  
				$this->session->set_flashdata('msg','
					<div id="notifications">
						<div class="alert alert-success">
							<center><h5><span class=" fa fa-check" ></span> Password anda sudah diperbaharui. Silakan login.</h5></center>
						</div>
					</div>
					');   
			}else{  
				$this->session->set_flashdata('msg','
					<div id="notifications">
						<div class="alert alert-danger">
							<center><h5><span class=" fa fa-ban" ></span> Password anda gagal diperbaharui.</h5></center>
						</div>
					</div>
					');    
			}  
			redirect('user/forgot_password');    
		}    
	}
	public function send_email($pesan,$email_tujuan)
	{
      // Konfigurasi email
		$config = [
		'mailtype'  => 'html',
		'charset'   => 'utf-8',
		'protocol'  => 'smtp',
		'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'tugasakhirtoeic@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'aremania123',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
               ];

        // Load library email dan konfigurasinya
               $this->load->library('email', $config);

        // Email dan nama pengirim
               $this->email->from('tugasakhirtoeic@gmail.com', 'Sistem Informasi Ujian Toeic Online');

        // Email penerima
        $this->email->to($email_tujuan); // Ganti dengan email tujuan kamu

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Kode Lupa Password | Sistem Informasi Ujian Toeic Online');

        // Isi email
        $this->email->message($pesan);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
        	return true;
        } else {
        	return false;
        }
    }
}
