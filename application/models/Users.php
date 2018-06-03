<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model
{
	private $table = 'users';

	public function log_in($username,$password)
	{
  	$this->db->where("email",$username);
		$this->db->where("password",$password);
		$this->db->where("active","1");
  	$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	public function sign_up($username,$password)
	{
    $key = $this->uniqueUsername();
		$data = array(
      'username' => $key,
      'email' => $username,
      'password' => $password,
      'active' => '0');
		$query = $this->db->insert($this->table,$data);
	  return $key;
	}


  public function uniqueUsername() {
    $username = substr(md5(microtime()),rand(0,26),12);
    $this->db->where('username',$username);
    $query = $this->db->get($this->table);
    if ($query->num_rows() == 0) {
      return $username;
    } 
    else {
      $this->uniqueUsername();
    }
  }

  function get_username($email) {
    $this->db->where('email',$email);
    $query = $this->db->get($this->table);
    return $query->result()[0]->username;
  }

  function confirm_account($key) {
    $data = array('active' => 1);
    $this->db->where('username',$key);
    $query = $this->db->update($this->table,$data);
    if ((int)$this->db->affected_rows()) {
      return true;
    }    
    else {
      return false;
    }
  }

  function get_email($username) {
    $this->db->where('username',$username);
    $query = $this->db->get($this->table);
    return $query->result()[0]->email;
  }

  function getPass($user) {
    $this->db->where('email',$user);
    $query = $this->db->get($this->table);
    return $query->result();
  }  

}




?>