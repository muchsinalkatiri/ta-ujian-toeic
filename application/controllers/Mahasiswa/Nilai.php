<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nilai extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('nilai_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index(){
		redirect('mahasiswa/ujian');
	}

	public function penilaian($id_data_ujian=null)
	{
		$this->load->model('user_model');

		if(!$this->session->userdata('logged_in') || $this->session->userdata('level') != '2' ) 
			redirect('user/login');

		$query = $this->db->get('pengiriman_whatsapp')->row();
		$data['pengiriman'] = $query;

		$isi_token = $data['pengiriman']->token;

		$id_mahasiswa_terdaftar = $this->session->userdata('id_mahasiswa_terdaftar');

		$data['mahasiswa_terdaftar']=$this->user_model->get_data_mahasiswa_by_id($id_mahasiswa_terdaftar);

		$nama = $data['mahasiswa_terdaftar']->nama;
		$email = $data['mahasiswa_terdaftar']->email;
		$nomor = $data['mahasiswa_terdaftar']->notlp2;

		$data['ujian']=$this->nilai_model->get_data_ujian_by_id_mahasiswa_and_id_ujian($id_data_ujian,$id_mahasiswa_terdaftar);

		$query_listening=$this->nilai_model->get_jawaban_ujian_listening($id_data_ujian);
		$data['jawaban_listening']=$query_listening->result();

		$query_reading=$this->nilai_model->get_jawaban_ujian_reading($id_data_ujian);
		$data['jawaban_reading']=$query_reading->result();


		if ( empty($data['ujian']) || empty($id_data_ujian)  ) redirect('mahasiswa/ujian');

		$terjawab_listening = 0;
		$terjawab_reading = 0;
		$benar_listening = 0;
		$benar_reading = 0;
		
		foreach ($data['jawaban_listening'] as $jawaban) {
			$terjawab_listening = $terjawab_listening +1;
			if ($jawaban->jawaban_mahasiswa == $jawaban->jawaban_kunci) {
				$benar_listening = $benar_listening + 1;
			}
		}	
		foreach ($data['jawaban_reading'] as $jawaban) {
			$terjawab_reading = $terjawab_reading +1;
			if ($jawaban->jawaban_mahasiswa == $jawaban->jawaban_kunci) {
				$benar_reading = $benar_reading + 1;
			}
		}

		$score_listening = $this->scoring_listening($benar_listening);
		$score_reading = $this->scoring_reading($benar_reading);
		$total_score = $score_listening + $score_reading;
		$level_of_competent = $this->level($total_score);

		$message = '';             
		$message .= '*Hai '.$nama.', Terimakasih Telah Melakukan Ujian TOEIC.* ';  
		$message .= '\n2 Anda berhasil mengerjakan '.$terjawab_listening.' soal dari 100 soal listening dan ' .$terjawab_reading.' soal dari 100 soal listening. '; 
		$message .=   '\n Anda Berhasil Menjawab dengan benar ' .$benar_listening.' soal listening dan '.$benar_reading.' soal reading. \n2 '; 
		$message .=   'Score Listening : '.$score_listening.'  \n '; 
		$message .=   'Score Reading : '.$score_reading.'  \n '; 
		$message .=   'Total Score : '.$total_score.'  \n '; 
		$message .=   'Level Of Competent : '.$level_of_competent; 

		$data = array(
			'id_mahasiswa_terdaftar' => $id_mahasiswa_terdaftar,
			'id_data_ujian' => $id_data_ujian,
			'terjawab_listening' => $terjawab_listening,
			'terjawab_reading' => $terjawab_reading,
			'benar_listening' => $benar_listening,
			'benar_reading' => $benar_reading,
			'score_listening' => $score_listening,
			'score_reading' => $score_reading,
			'total_score' => $total_score,
			'level_of_competent' => $level_of_competent
			);

		$insert = $this->nilai_model->create('data_nilai',$data);
		$curl = curl_init();
		$token = $isi_token;
		$data = [
		'phone' => $nomor,
		'message' => $message,
		];

		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array(
				"Authorization: $token",
				)
			);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_URL, "https://wablas.com/api/send-message");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);

		echo "<pre>";
		print_r($result);

		if ($result && $insert) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Thank you for taking the TOEIC exam, your detail score will be sent to whatsapp number immediately. Send to Email or contact admin if the value has not been received on WhatsApp.</h5>
			</div>');    
			redirect('mahasiswa/ujian');
		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Your value failed saved.</h5>
			</div>');    
			redirect('mahasiswa/ujian');
		}
	}

	public function scoring_listening($benar_listening){
		$score_listening = 0;
		if ($benar_listening >= 0 && $benar_listening <= 6 ) $score_listening = 5; 
		elseif ($benar_listening == 7 ) $score_listening = 10; 
		elseif ($benar_listening == 8 ) $score_listening = 15; 
		elseif ($benar_listening == 9 ) $score_listening = 20; 
		elseif ($benar_listening == 10 ) $score_listening = 25; 
		elseif ($benar_listening == 11 ) $score_listening = 30; 
		elseif ($benar_listening == 12 ) $score_listening = 35; 
		elseif ($benar_listening == 13 ) $score_listening = 40; 
		elseif ($benar_listening == 14 ) $score_listening = 45; 
		elseif ($benar_listening == 15 ) $score_listening = 50; 
		elseif ($benar_listening == 16 ) $score_listening = 55; 
		elseif ($benar_listening == 17 ) $score_listening = 60; 
		elseif ($benar_listening == 18 ) $score_listening = 65; 
		elseif ($benar_listening == 19 ) $score_listening = 70; 
		elseif ($benar_listening == 20 ) $score_listening = 75; 
		elseif ($benar_listening == 21 ) $score_listening = 80; 
		elseif ($benar_listening == 22 ) $score_listening = 85; 
		elseif ($benar_listening == 23 ) $score_listening = 90; 
		elseif ($benar_listening == 24 ) $score_listening = 95; 
		elseif ($benar_listening == 25 ) $score_listening = 100; 
		elseif ($benar_listening == 26 ) $score_listening = 110; 
		elseif ($benar_listening == 27 ) $score_listening = 115; 
		elseif ($benar_listening == 28 ) $score_listening = 120; 
		elseif ($benar_listening == 29 ) $score_listening = 125; 
		elseif ($benar_listening == 30 ) $score_listening = 130; 
		elseif ($benar_listening == 31 ) $score_listening = 135; 
		elseif ($benar_listening == 32 ) $score_listening = 140; 
		elseif ($benar_listening == 33 ) $score_listening = 145; 
		elseif ($benar_listening == 34 ) $score_listening = 150; 
		elseif ($benar_listening == 35 ) $score_listening = 160; 
		elseif ($benar_listening == 36 ) $score_listening = 165; 
		elseif ($benar_listening == 37 ) $score_listening = 170; 
		elseif ($benar_listening == 38 ) $score_listening = 175; 
		elseif ($benar_listening == 39 ) $score_listening = 180; 
		elseif ($benar_listening == 40 ) $score_listening = 185; 
		elseif ($benar_listening == 41 ) $score_listening = 190; 
		elseif ($benar_listening == 42 ) $score_listening = 195; 
		elseif ($benar_listening == 43 ) $score_listening = 200; 
		elseif ($benar_listening == 44 ) $score_listening = 210; 
		elseif ($benar_listening == 45 ) $score_listening = 215; 
		elseif ($benar_listening == 46 ) $score_listening = 220; 
		elseif ($benar_listening == 47 ) $score_listening = 230; 
		elseif ($benar_listening == 48 ) $score_listening = 240; 
		elseif ($benar_listening == 49 ) $score_listening = 245; 
		elseif ($benar_listening == 50 ) $score_listening = 250; 
		elseif ($benar_listening == 51 ) $score_listening = 255; 
		elseif ($benar_listening == 52 ) $score_listening = 260; 
		elseif ($benar_listening == 53 ) $score_listening = 265; 
		elseif ($benar_listening == 54 ) $score_listening = 270; 
		elseif ($benar_listening == 55 ) $score_listening = 275; 
		elseif ($benar_listening == 56 ) $score_listening = 280; 
		elseif ($benar_listening == 57 ) $score_listening = 290; 
		elseif ($benar_listening == 58 ) $score_listening = 295; 
		elseif ($benar_listening == 59 ) $score_listening = 300; 
		elseif ($benar_listening == 60 ) $score_listening = 305; 
		elseif ($benar_listening == 61 ) $score_listening = 310; 
		elseif ($benar_listening == 62 ) $score_listening = 315; 
		elseif ($benar_listening == 63 ) $score_listening = 320; 
		elseif ($benar_listening == 64 ) $score_listening = 325; 
		elseif ($benar_listening == 65 ) $score_listening = 330; 
		elseif ($benar_listening == 66 ) $score_listening = 335; 
		elseif ($benar_listening == 67 ) $score_listening = 340; 
		elseif ($benar_listening == 68 ) $score_listening = 345; 
		elseif ($benar_listening == 69 ) $score_listening = 350; 
		elseif ($benar_listening == 70 ) $score_listening = 355; 
		elseif ($benar_listening == 71 ) $score_listening = 360; 
		elseif ($benar_listening == 72 ) $score_listening = 365; 
		elseif ($benar_listening == 73 ) $score_listening = 370; 
		elseif ($benar_listening == 74 ) $score_listening = 375; 
		elseif ($benar_listening == 75 ) $score_listening = 380; 
		elseif ($benar_listening == 76 ) $score_listening = 385; 
		elseif ($benar_listening == 77 ) $score_listening = 390; 
		elseif ($benar_listening == 78 ) $score_listening = 395; 
		elseif ($benar_listening == 79 ) $score_listening = 400; 
		elseif ($benar_listening == 80 ) $score_listening = 405; 
		elseif ($benar_listening == 81 ) $score_listening = 410; 
		elseif ($benar_listening == 82 ) $score_listening = 415; 
		elseif ($benar_listening == 83 ) $score_listening = 420; 
		elseif ($benar_listening == 84 ) $score_listening = 425; 
		elseif ($benar_listening == 85 ) $score_listening = 430; 
		elseif ($benar_listening == 86 ) $score_listening = 435; 
		elseif ($benar_listening == 87 ) $score_listening = 440; 
		elseif ($benar_listening == 88 ) $score_listening = 445; 
		elseif ($benar_listening == 89 ) $score_listening = 450; 
		elseif ($benar_listening == 90 ) $score_listening = 460; 
		elseif ($benar_listening == 91 ) $score_listening = 465; 
		elseif ($benar_listening == 92 ) $score_listening = 470; 
		elseif ($benar_listening == 93 ) $score_listening = 480; 
		elseif ($benar_listening == 94 ) $score_listening = 485; 
		elseif ($benar_listening == 95 ) $score_listening = 490; 
		if ($benar_listening >=96 && $benar_listening <= 100 ) $score_listening = 495; 

		return $score_listening;
	}
	public function scoring_reading($benar_reading){
		$score_reading = 0;
		if ($benar_reading >= 0 && $benar_reading <= 15 ) $score_reading = 5; 
		elseif ($benar_reading == 16 ) $score_reading = 10; 
		elseif ($benar_reading == 17 ) $score_reading = 15; 
		elseif ($benar_reading == 18 ) $score_reading = 20; 
		elseif ($benar_reading == 19 ) $score_reading = 25; 
		elseif ($benar_reading == 20 ) $score_reading = 30; 
		elseif ($benar_reading == 21 ) $score_reading = 35; 
		elseif ($benar_reading == 22 ) $score_reading = 40; 
		elseif ($benar_reading == 23 ) $score_reading = 45; 
		elseif ($benar_reading == 24 ) $score_reading = 50; 
		elseif ($benar_reading == 25 ) $score_reading = 60; 
		elseif ($benar_reading == 26 ) $score_reading = 65; 
		elseif ($benar_reading == 27 ) $score_reading = 70; 
		elseif ($benar_reading == 28 ) $score_reading = 80; 
		elseif ($benar_reading == 29 ) $score_reading = 85; 
		elseif ($benar_reading == 30 ) $score_reading = 90; 
		elseif ($benar_reading == 31 ) $score_reading = 95; 
		elseif ($benar_reading == 32 ) $score_reading = 100; 
		elseif ($benar_reading == 33 ) $score_reading = 110; 
		elseif ($benar_reading == 34 ) $score_reading = 115; 
		elseif ($benar_reading == 35 ) $score_reading = 120; 
		elseif ($benar_reading == 36 ) $score_reading = 125; 
		elseif ($benar_reading == 37 ) $score_reading = 130; 
		elseif ($benar_reading == 38 ) $score_reading = 140; 
		elseif ($benar_reading == 39 ) $score_reading = 145; 
		elseif ($benar_reading == 40 ) $score_reading = 150; 
		elseif ($benar_reading == 41 ) $score_reading = 160; 
		elseif ($benar_reading == 42 ) $score_reading = 165; 
		elseif ($benar_reading == 43 ) $score_reading = 170; 
		elseif ($benar_reading == 44 ) $score_reading = 175; 
		elseif ($benar_reading == 45 ) $score_reading = 180; 
		elseif ($benar_reading == 46 ) $score_reading = 190; 
		elseif ($benar_reading == 47 ) $score_reading = 195; 
		elseif ($benar_reading == 48 ) $score_reading = 200; 
		elseif ($benar_reading == 49 ) $score_reading = 210; 
		elseif ($benar_reading == 50 ) $score_reading = 215; 
		elseif ($benar_reading == 51 ) $score_reading = 220; 
		elseif ($benar_reading == 52 ) $score_reading = 225; 
		elseif ($benar_reading == 53 ) $score_reading = 230; 
		elseif ($benar_reading == 54 ) $score_reading = 235; 
		elseif ($benar_reading == 55 ) $score_reading = 240; 
		elseif ($benar_reading == 56 ) $score_reading = 250; 
		elseif ($benar_reading == 57 ) $score_reading = 255; 
		elseif ($benar_reading == 58 ) $score_reading = 260; 
		elseif ($benar_reading == 59 ) $score_reading = 265; 
		elseif ($benar_reading == 60 ) $score_reading = 270; 
		elseif ($benar_reading == 61 ) $score_reading = 280; 
		elseif ($benar_reading == 62 ) $score_reading = 285; 
		elseif ($benar_reading == 63 ) $score_reading = 290; 
		elseif ($benar_reading == 64 ) $score_reading = 300; 
		elseif ($benar_reading == 65 ) $score_reading = 305; 
		elseif ($benar_reading == 66 ) $score_reading = 310; 
		elseif ($benar_reading == 67 ) $score_reading = 320; 
		elseif ($benar_reading == 68 ) $score_reading = 325; 
		elseif ($benar_reading == 69 ) $score_reading = 330; 
		elseif ($benar_reading == 70 ) $score_reading = 335; 
		elseif ($benar_reading == 71 ) $score_reading = 340; 
		elseif ($benar_reading == 72 ) $score_reading = 350; 
		elseif ($benar_reading == 73 ) $score_reading = 355; 
		elseif ($benar_reading == 74 ) $score_reading = 360; 
		elseif ($benar_reading == 75 ) $score_reading = 365; 
		elseif ($benar_reading == 76 ) $score_reading = 370; 
		elseif ($benar_reading == 77 ) $score_reading = 380; 
		elseif ($benar_reading == 78 ) $score_reading = 385; 
		elseif ($benar_reading == 79 ) $score_reading = 390; 
		elseif ($benar_reading == 80 ) $score_reading = 395; 
		elseif ($benar_reading == 81 ) $score_reading = 400; 
		elseif ($benar_reading == 82 ) $score_reading = 405; 
		elseif ($benar_reading == 83 ) $score_reading = 410; 
		elseif ($benar_reading == 84 ) $score_reading = 415; 
		elseif ($benar_reading == 85 ) $score_reading = 420; 
		elseif ($benar_reading == 86 ) $score_reading = 425; 
		elseif ($benar_reading == 87 ) $score_reading = 430; 
		elseif ($benar_reading == 88 ) $score_reading = 435; 
		elseif ($benar_reading == 89 ) $score_reading = 445; 
		elseif ($benar_reading == 90 ) $score_reading = 450; 
		elseif ($benar_reading == 91 ) $score_reading = 455; 
		elseif ($benar_reading == 92 ) $score_reading = 465; 
		elseif ($benar_reading == 93 ) $score_reading = 470; 
		elseif ($benar_reading == 94 ) $score_reading = 480; 
		elseif ($benar_reading == 95 ) $score_reading = 485; 
		elseif ($benar_reading == 96 ) $score_reading = 490; 
		if ($benar_reading >=97 && $benar_reading <= 100 ) $score_reading = 495; 

		return $score_reading;
	}

	public function level($total_score){
		if($total_score <= 200) $level_of_competent = 'Beginner 1';
		elseif($total_score >= 205 && $total_score <= 300) $level_of_competent = 'Beginner 2';
		elseif($total_score >= 305 && $total_score <= 400) $level_of_competent = 'High Beginner';
		elseif($total_score >= 406 && $total_score <= 550) $level_of_competent = 'Intermediate';
		elseif($total_score >= 555 && $total_score <= 650) $level_of_competent = 'High Intermediate';
		elseif($total_score >= 655 && $total_score <= 800) $level_of_competent = 'Advance';
		elseif($total_score >= 805 && $total_score <= 990) $level_of_competent = 'High Advance';

		return $level_of_competent;
	}
}
