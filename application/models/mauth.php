<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// update
class Mauth extends CI_Model{
	function cek($username, $password){
		$query = $this->db->query("SELECT * FROM tb_pengguna WHERE username='$username' AND password='$password'");
		return $query;
	}	
}