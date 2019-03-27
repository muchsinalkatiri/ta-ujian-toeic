<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_mahasiswa() { //ambil data mahasiswa dari table barang yang akan di generate ke datatable

  	return $this->db->get('data_mahasiswa');
  }

    public function get_update_data_by_nim($where,$table){      
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