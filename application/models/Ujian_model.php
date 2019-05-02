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
  public function get_data_ujian_by_id_mahasiswa_and_id_sesi($id, $id_mahasiswa_terdaftar){      
    $query = $this->db->get_where('data_ujian', array('data_ujian.id_sesi_ujian' => $id, 'id_mahasiswa_terdaftar' => $id_mahasiswa_terdaftar));

    return $query->row();
  }

  public function create($table, $data){
    if ($this->db->insert($table,$data)) {
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

}