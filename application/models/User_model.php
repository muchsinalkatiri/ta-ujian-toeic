<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function get_data_by_id($id)
    {
         // Inner Join dengan table Categories
        $this->db->get('data_admin');

        $query = $this->db->get_where('data_admin', array('data_admin.id_admin' => $id));

        return $query->row();
    }
    public function get_data_mahasiswa_by_id($id)
    {
         // Inner Join dengan table Categories
        $this->db->get('data_mahasiswa_terdaftar');

        $query = $this->db->join('data_mahasiswa','data_mahasiswa.nim = data_mahasiswa_terdaftar.nim')->get_where('data_mahasiswa_terdaftar', array('data_mahasiswa_terdaftar.id_mahasiswa_terdaftar' => $id));

        return $query->row();
    }

    public function update($where,$data,$table){
        if($this->db->update($table, $data, $where)){
          return true;
      }
      else{
          return false;
      }
    }
}
