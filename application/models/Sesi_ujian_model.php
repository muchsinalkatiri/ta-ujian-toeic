<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sesi_ujian_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_data() { //ambil data mahasiswa dari table barang yang akan di generate ke datatable
// SELECT id_sesi_ujian, nama_sesi_ujian, waktu_dimulai, waktu_berakhir, durasi, status, nama as nama_admin
// FROM
// sesi_ujian sj
// LEFT JOIN data_admin da on sj.id_admin = da.id_admin
    $this->db->select('id_sesi_ujian, nama_sesi_ujian, waktu_dimulai, waktu_berakhir, durasi, jumlah_peserta, status, nama as nama_admin');
    $this->db->from('sesi_ujian sj');
    $this->db->join('data_admin da', 'sj.id_admin = da.id_admin', 'left');
  	return $this->db->get();
  }

    public function get_update_data_by_id($where,$table){      
        return $this->db->get_where($table,$where);
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

}