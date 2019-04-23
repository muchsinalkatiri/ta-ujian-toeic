<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_data() {

    return $this->db->get('data_part_soal');
  }

  function get_all_data_where_namapaket_idpart($nama_paket, $id_part) {

    return $this->db->order_by('nomer_soal', 'desc')->get_where('data_soal', array('data_soal.nama_paket' => $nama_paket, 'data_soal.id_part' => $id_part));
  }
  function get_all_data_where_namapaket_idpart_idkelompok($nama_paket, $id_part, $id_kelompok_soal) {

    return $this->db->order_by('nomer_soal', 'desc')->get_where('data_soal', array('data_soal.nama_paket' => $nama_paket, 'data_soal.id_part' => $id_part, 'data_soal.id_kelompok_soal' => $id_kelompok_soal));
  }

  function get_all_kelompok_where_namapaket_idpart($nama_paket, $id_part) {

    return $this->db->get_where('kelompok_soal', array('kelompok_soal.nama_paket' => $nama_paket, 'kelompok_soal.id_part' => $id_part));
  }
  
  public function cek_paket_dan_part($nama_paket, $id_part, $nama_part)
  {
    $query = $this->db->get_where('data_part_soal', array('data_part_soal.nama_paket' => $nama_paket, 'data_part_soal.id_part' => $id_part, 'data_part_soal.nama_part' => $nama_part));
    return $query->row();
  }
  
    public function get_data_by_id($id_soal, $nama_part)
  {
    $query = $this->db->get_where('data_soal', array('data_soal.id_soal' => $id_soal, 'data_soal.part_soal' => $nama_part));
    return $query->row();
  }  
    public function get_data_kelompok_by_id($id_kelompok_soal, $nama_part)
  {
    $query = $this->db->get_where('kelompok_soal', array('kelompok_soal.id_kelompok_soal' => $id_kelompok_soal, 'kelompok_soal.part_soal' => $nama_part));
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