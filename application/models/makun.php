<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Makun extends CI_Model{

	function regis(){
		$nama_pembeli = $this->input->post('nama_pembeli');
		$email = $this->input->post('email');
		$no_telpon = $this->input->post('no_telpon');
		$password = $this->input->post('password');

		$query = $this->db->query("INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `foto_pengguna`, `username`, `password`, `email`, `no_telpon`, `level`) VALUES (NULL, '$nama_pembeli', 'user.png', '$email', '$password', '$email', '$no_telpon', 'Pembeli');");

		$lastid = $this->db->insert_id();

		$query2 = $this->db->query("INSERT INTO `tb_pembeli` (`id_pembeli`, `id_pengguna`, `nama_pembeli`, `no_telpon`, `email`) VALUES (NULL, '$lastid', '$nama_pembeli', '$no_telpon', '$email');");

		return $query;
	}

	function cek($username, $password){
		$query = $this->db->query("SELECT * FROM tb_pengguna WHERE username='$username' AND password='$password'");
		return $query;
	}	
}