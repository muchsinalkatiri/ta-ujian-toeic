<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kirim extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		// $this->load->helper('MY');
		$this->load->model('user_model');
		$this->load->model('nilai_model');

	}


	public function kirim_email($id_sesi_ujian){

		$id_mahasiswa_terdaftar = $this->session->userdata('id_mahasiswa_terdaftar');

		$data['mahasiswa_terdaftar']=$this->user_model->get_data_mahasiswa_by_id($id_mahasiswa_terdaftar);
		$data['nilai']=$this->nilai_model->get_data_nilai($id_sesi_ujian, $id_mahasiswa_terdaftar);

		$nama = $data['mahasiswa_terdaftar']->nama;
		$email = $data['mahasiswa_terdaftar']->email;

		$terjawab_listening = $data['nilai']->terjawab_listening;
		$terjawab_reading = $data['nilai']->terjawab_reading;
		$benar_listening = $data['nilai']->benar_listening;
		$benar_reading = $data['nilai']->benar_reading;
		$score_listening = $data['nilai']->score_listening;
		$score_reading = $data['nilai']->score_reading;
		$total_score = $data['nilai']->total_score;
		$level_of_competent = $data['nilai']->level_of_competent;

		$message = '';             
		$message .= '<strong>Hai '.$nama.', Terimakasih Telah Melakukan Ujian TOEIC.</strong><br>';  
		$message .= '<br><br>Anda berhasil mengerjakan '.$terjawab_listening.' soal dari 100 soal listening dan ' .$terjawab_listening.' soal dari 100 soal listening. <br> '; 
		$message .=   'Anda Berhasil Menjawab dengan benar ' .$benar_listening.' soal listening dan '.$benar_reading.' soal reading. <br><br> '; 
		$message .=   'Score Listening : '.$score_listening.'  <br> '; 
		$message .=   'Score Reading : '.$score_reading.'  <br> '; 
		$message .=   'Total Score : '.$total_score.'  <br> '; 
		$message .=   'Level Of Competent : '.$level_of_competent.'  <br> '; 

		// echo $message;
        $send_email = $this->send_email($message,$email); //dikirim ke email
        if ($send_email) {
        	$this->session->set_flashdata('msg','
        		<div id="notifications">
        			<div class="alert alert-success">
        				<center><h5><span class=" fa fa-check" ></span> Hasil Ujian Anda telah Dikirim Ke Email</h5></center>
        			</div>
        		</div>
        		'); 
        }else{
        	$this->session->set_flashdata('msg','
        		<div id="notifications">
        			<div class="alert alert-danger">
        				<center><h5><span class=" fa fa-ban" ></span> Hasil Ujian Anda Gagal Dikirim Ke Email</h5></center>
        			</div>
        		</div>
        		');  
        }
        redirect('mahasiswa/ujian');

    }

    public function send_email($message,$email)
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
        $this->email->to($email); // Ganti dengan email tujuan kamu

        // Lampiran email, isi dengan url/path file
        // Subject email
        $this->email->subject('Hasil Ujian | Sistem Informasi Ujian Toeic Online');

        // Isi email
        $this->email->message($message);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
        	return true;
        } else {
        	return false;
        }
    }
}
