<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Part_soal_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_data() {

    return $this->db->get('data_part_soal');
  }

  function get_all_data_where_listening($nama_paket) {

    return $this->db->get_where('data_part_soal', array('data_part_soal.jenis_soal' => 'listening', 'nama_paket' => $nama_paket));
  }
  function get_all_data_where_reading($nama_paket) {

    return $this->db->get_where('data_part_soal', array('data_part_soal.jenis_soal' => 'reading', 'nama_paket' => $nama_paket));
  }
  
  public function get_data_by_id($id)
  {
    $this->db->get('data_part_soal');

    $query = $this->db->get_where('data_part_soal', array('data_part_soal.id_part' => $id));

    return $query->row();
  }

  public function create($table, $data){
    if ($this->db->insert($table,$data)) {
      return true;
    }else{
      return false;
    }
  }
  public function insert_batch($table, $data){
    if ($this->db->insert_batch($table,$data)) {
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