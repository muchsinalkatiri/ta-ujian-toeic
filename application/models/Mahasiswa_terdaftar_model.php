<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_terdaftar_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_mahasiswa_terdaftar() { //ambil data mahasiswa dari table barang yang akan di generate ke datatable

  	return $this->db->get('data_mahasiswa_terdaftar');
  }

  public function get_data_by_id($id)
  {
         // Inner Join dengan table Categories
    $this->db->get('data_mahasiswa_terdaftar');

    $query = $this->db->get_where('data_mahasiswa_terdaftar', array('data_mahasiswa_terdaftar.id_mahasiswa_terdaftar' => $id));

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

}