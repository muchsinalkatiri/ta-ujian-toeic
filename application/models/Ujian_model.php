<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_data() { //ambil data mahasiswa dari table barang yang akan di generate ke datatable

  	return $this->db->get('sesi_ujian');
  }

  public function get_data_by_id($id){      
    $query = $this->db->get_where('sesi_ujian', array('sesi_ujian.id_sesi_ujian' => $id));

    return $query->row();
  }
  public function get_data_paket_by_nama_paket($nama_paket){      
    $query = $this->db->get_where('data_paket', array('data_paket.nama_paket' => $nama_paket));

    return $query->row();
  }
  public function get_data_part_by_id_part($id_part){      
    $query = $this->db->get_where('data_part_soal', array('data_part_soal.id_part' => $id_part));

    return $query->row();
  }
  public function get_data_kelompok_by_id_kelompok($id_kelompok_soal){      
    $query = $this->db->get_where('kelompok_soal', array('kelompok_soal.id_kelompok_soal' => $id_kelompok_soal));

    return $query->row();
  }
  public function get_data_soal_by_nama_paket_n_nomer_soal($nama_paket, $nomer_soal){      
    $query = $this->db->get_where('data_soal', array('data_soal.nama_paket' => $nama_paket, 'nomer_soal' => $nomer_soal));

    return $query->row();
  }
  public function get_data_ujian_by_id_mahasiswa_and_id_sesi($id, $id_mahasiswa_terdaftar){      
    $query = $this->db->get_where('data_ujian', array('data_ujian.id_sesi_ujian' => $id, 'id_mahasiswa_terdaftar' => $id_mahasiswa_terdaftar));

    return $query->row();
  }
  public function get_data_ujian_by_id_mahasiswa_and_id_ujian($id_data_ujian, $id_mahasiswa_terdaftar){      
    $query = $this->db->query("SELECT id_data_ujian, id_mahasiswa_terdaftar, du.id_sesi_ujian as id_sesi_ujian, nama_paket, du.waktu_dimulai as waktu_dimulai, du.waktu_berakhir AS waktu_berakhir, waktu_selesai, sisa_waktu, audio_curent_time, status_pengerjaan, nama_sesi_ujian FROM  data_ujian du LEFT JOIN sesi_ujian su ON su.id_sesi_ujian = du.id_sesi_ujian WHERE id_data_ujian like ".$id_data_ujian." AND id_mahasiswa_terdaftar like ".$id_mahasiswa_terdaftar." ");

    return $query->row();
  }
  public function get_jawabanmahasiswa_by_id_data_ujian_and_nomer_soal($id_data_ujian, $nomer_soal){      
    $query = $this->db->get_where('jawaban_mahasiswa', array('jawaban_mahasiswa.id_data_ujian' => $id_data_ujian, 'nomer_soal' => $nomer_soal));

    return $query->row();
  }

  public function insert_jawaban($table, $data){
    $query = $this->db->insert($table,$data);
    if ($query) {
      return true;
    }else{
      return false;
    }
  }
  public function create_ujian($table, $data){
    if ($this->db->insert($table,$data)) {
      $last_id = $this->db->insert_id();
      return $last_id;
    }else{
      return false;
    }
  }

  public function update($where,$data,$table){
    if($this->db->update($table, $data, $where)){
      return true;
    }else{
      return false;
    }
  } 

  public function delete($where,$table){
    $this->db->where($where);
    if ($this->db->delete($table)) {
      return true;
    }else{
      return false;
    }
  }

  public function get_jawaban($id_data_ujian, $nomor) {
    $data_jawaban = $this->db->get_where('jawaban_mahasiswa', array('id_data_ujian' => $id_data_ujian, 'nomer_soal' => $nomor))->result();

    return (count($data_jawaban) > 0 ? strtoupper($data_jawaban[0]->jawaban) : "");
  }
}