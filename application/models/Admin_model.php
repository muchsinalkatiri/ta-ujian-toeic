<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_admin() { //ambil data mahasiswa dari table barang yang akan di generate ke datatable

  	return $this->db->get('data_admin');
  }

  public function get_data_by_id($id)
  {
         // Inner Join dengan table Categories
    $this->db->get('data_admin');

    $query = $this->db->get_where('data_admin', array('data_admin.id_admin' => $id));

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