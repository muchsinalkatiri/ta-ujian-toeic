<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }


  function get_all_mahasiswa() { //ambil data barang dari table barang yang akan di generate ke datatable

    return $this->db->get('data_mahasiswa');
  }
}