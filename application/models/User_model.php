<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }


    // Proses login user
    public function login($table, $username, $password){
        // Validasi
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($username);
        $this->db->where($password);

        $result = $this->db->get();


        if($result->num_rows() == 0){
            return false;
        } else {
            return $result->result();
        }
    }

}
