<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

  public function get_data_ujian_by_id_mahasiswa_and_id_ujian($id_data_ujian, $id_mahasiswa_terdaftar){      
    $query = $this->db->get_where('data_ujian', array('data_ujian.id_data_ujian' => $id_data_ujian, 'id_mahasiswa_terdaftar' => $id_mahasiswa_terdaftar));
    return $query->row();
  }
  public function get_jawaban_ujian_listening($id_data_ujian){      
    return $this->db->get_where('cocokan_jawaban', array('cocokan_jawaban.id_data_ujian' => $id_data_ujian, 'jenis_soal' => 'listening')); 
  }
  public function get_jawaban_ujian_reading($id_data_ujian){      
    return $this->db->get_where('cocokan_jawaban', array('cocokan_jawaban.id_data_ujian' => $id_data_ujian, 'jenis_soal' => 'reading')); 
  }
  public function get_data_nilai($id_sesi_ujian, $id_mahasiswa_terdaftar){      
    $query = $this->db->query("SELECT id_sesi_ujian, id_data_nilai, dn.id_mahasiswa_terdaftar as id_mahasiswa_terdaftar, dn.id_data_ujian as id_data_ujian, terjawab_listening, terjawab_reading, benar_listening, benar_reading, score_listening, score_reading, total_score, level_of_competent FROM  data_nilai dn LEFT JOIN data_ujian du ON dn.id_data_ujian = du.id_data_ujian WHERE id_sesi_ujian like ".$id_sesi_ujian." AND dn.id_mahasiswa_terdaftar like ".$id_mahasiswa_terdaftar." ");

    return $query->row();
  }

  public function get_data_nilai_by_id($id_data_nilai){      
    $query = $this->db->get_where('data_nilai', array('data_nilai.id_data_nilai' => $id_data_nilai)); 
    return $query->row();
  }

  public function create($table, $data){
    if ($this->db->insert($table,$data)) {
      return true;
    }else{
      return false;
    }
  }
}