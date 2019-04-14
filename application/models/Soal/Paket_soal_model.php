<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_soal_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_data() { //ambil data mahasiswa dari table barang yang akan di generate ke datatable

  	return $this->db->get('data_paket');
  }
  
  public function get_data_by_id($id)
  {
    // $this->db->get('data_paket');

    $query = $this->db->get_where('data_paket', array('data_paket.id_paket' => $id));

    return $query->row();
  }  
  public function get_data_by_nama($nama_paket)
  {
    // $this->db->get('data_paket');

    $query = $this->db->get_where('data_paket', array('data_paket.nama_paket' => $nama_paket));

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