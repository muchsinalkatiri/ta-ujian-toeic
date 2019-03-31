<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

  public function register($table, $data){
    if ($this->db->insert($table,$data)) {
      return true;
    }else{
      return false;
    }
  }
}