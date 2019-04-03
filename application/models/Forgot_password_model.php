<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password_model extends CI_Model {

  function __construct(){
    parent::__construct();
  }

  public function get_data_admin_by_id($id)
  {
    $this->db->get('data_admin');

    $query = $this->db->get_where('data_admin', array('data_admin.id_admin' => $id));

    return $query->row();
  }
  public function get_data_admin_by_id2($id)
  {
    $this->db->get('data_mahasiswa_terdaftar');

    $query = $this->db->get_where('data_mahasiswa_terdaftar', array('data_mahasiswa_terdaftar.nim' => $id));

    return $query->row();
  }

  public function get_data_admin_by_email($email)
  {
    $this->db->get('data_admin');

    $query = $this->db->get_where('data_admin', array('data_admin.email' => $email));

    return $query->row();
  }

  public function get_data_admin_by_email2($email)
  {
    $this->db->get('data_mahasiswa_terdaftar');

    $query = $this->db->get_where('data_mahasiswa_terdaftar', array('data_mahasiswa_terdaftar.email' => $email));

    return $query->row();
  }

  public function insertToken($table, $data){
    if ($this->db->insert($table,$data)) {

      return $data['token'].$data['id_user'];

    }else{

      return false;
    }

  }

  public function isTokenValid($token)
  {
    $tkn = substr($token,0,30);  
    $uid = substr($token,30);     

    $q = $this->db->get_where('token_lupa_password', array(  
     'token_lupa_password.token' => $tkn,   
     'token_lupa_password.id_user' => $uid), 1);               

    if($this->db->affected_rows() > 0){  
     $row = $q->row();         
     $created = $row->tanggal_pembuatan;  
     $createdTS = strtotime($created);  
     $today = date('Y-m-d');   
     $todayTS = strtotime($today);  

     if($createdTS != $todayTS){  
       return false;  
     }  
     return $row->id_user;  
   }
   else{  
     return false;  
   }  

 }   

 public function updatePassword($where,$data,$table)
 {
  if($this->db->update($table, $data, $where)){
    return true;
  }
  else{
    return false;
  }
}
public function updateDataToken($where,$data,$table)
{
  if($this->db->update($table, $data, $where)){
    return true;
  }
  else{
    return false;
  }
}
public  function get_all_data() { //ambil data mahasiswa dari table barang yang akan di generate ke datatable

  return $this->db->get('token_lupa_password');
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
