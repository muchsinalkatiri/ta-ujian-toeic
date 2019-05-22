<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sesi_ujian_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_data() { 
    $this->db->select('id_sesi_ujian, nama_sesi_ujian, waktu_dimulai, waktu_berakhir, durasi, jumlah_peserta, status, nama as nama_admin');
    $this->db->from('sesi_ujian sj');
    $this->db->join('data_admin da', 'sj.id_admin = da.id_admin', 'left');
    return $this->db->get();
  }

  public function get_update_data_by_id($where,$table){      
    return $this->db->get_where($table,$where);
  }
  public function get_data_by_id($table,$where,$id ){      
    $query = $this->db->get_where($table, array($where => $id));

    return $query->row();
  }

  public function create($table, $data){
    if ($this->db->insert($table,$data)) {
      return true;
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

  public function get_data_ujian_join_data_mahasiswa_join_data_nilai_lengkap_by_id($id_sesi_ujian){      
    $this->db->select(' data_ujian.*,data_nilai.*, data_mahasiswa_lengkap.nim,  data_mahasiswa_lengkap.nama');
    $this->db->from('data_ujian');
    $this->db->join('data_nilai', 'data_nilai.id_data_ujian = data_ujian.id_data_ujian', 'left');
    $this->db->join('data_mahasiswa_lengkap', 'data_ujian.id_mahasiswa_terdaftar = data_mahasiswa_lengkap.id_mahasiswa_terdaftar', 'left');
    $this->db->where('data_ujian.id_sesi_ujian', $id_sesi_ujian);
    return $this->db->get();
    
  }

}