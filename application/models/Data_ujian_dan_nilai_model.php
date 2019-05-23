<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ujian_dan_nilai_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_data_ujian() {

    $this->db->select('data_ujian.*, data_mahasiswa_lengkap.nim,  data_mahasiswa_lengkap.nama, sesi_ujian.nama_sesi_ujian');
    $this->db->from('data_ujian');
    $this->db->join('sesi_ujian', 'sesi_ujian.id_sesi_ujian = data_ujian.id_sesi_ujian', 'left');
    $this->db->join('data_mahasiswa_lengkap', 'data_ujian.id_mahasiswa_terdaftar = data_mahasiswa_lengkap.id_mahasiswa_terdaftar', 'left');
    $this->db->order_by("sesi_ujian.nama_sesi_ujian");
    return $this->db->get();
  }
  function get_all_data_nilai() {

    $this->db->select(' data_ujian.*,data_nilai.*, data_mahasiswa_lengkap.nim,  data_mahasiswa_lengkap.nama, sesi_ujian.nama_sesi_ujian');
    $this->db->from('data_nilai');
    $this->db->join('data_ujian', 'data_nilai.id_data_ujian = data_ujian.id_data_ujian', 'left');
    $this->db->join('sesi_ujian', 'sesi_ujian.id_sesi_ujian = data_ujian.id_sesi_ujian', 'left');
    $this->db->join('data_mahasiswa_lengkap', 'data_ujian.id_mahasiswa_terdaftar = data_mahasiswa_lengkap.id_mahasiswa_terdaftar', 'left');
    $this->db->order_by("sesi_ujian.nama_sesi_ujian");
    return $this->db->get();
  }

  public function delete($where,$table){
    $this->db->where($where);
    if ($this->db->delete($table)) {
      return true;
    }else{
      return false;
    }
  }

}