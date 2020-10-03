<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpembeli extends CI_Model {

public function get_pembeli()
	{
		$query = $this->db->query("SELECT * FROM `tb_pembeli` ORDER BY `tb_pembeli`.`id_pembeli` DESC");
		return $query;
	}

public function get_edit_pembeli($id_pembeli)
	{
		$query = $this->db->query("SELECT * FROM `tb_pembeli` WHERE `tb_pembeli`.`id_pembeli` = '$id_pembeli'");
		return $query;
	}

public function get_detail_pembeli($id_pembeli)
	{
		$query = $this->db->query("SELECT * FROM `tb_pembeli` JOIN tb_alamat ON tb_pembeli.id_pembeli=tb_alamat.id_pembeli WHERE `tb_pembeli`.`id_pembeli` = '$id_pembeli'");
		return $query;
	}

public function insert_pembeli()
	{
		$nama_pembeli = $this->input->post('nama_pembeli');
		$no_telpon = $this->input->post('no_telpon');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$query = $this->db->query("INSERT INTO `tb_pembeli` (`id_pembeli`, `nama_pembeli`, `no_telpon`, `email`, `password`) VALUES (NULL, '$nama_pembeli', '$no_telpon', '$email', '$password');");
		return $query;
	}

public function update_pembeli()
	{
		$id_pembeli = $this->input->post('id_pembeli');
		$nama_pembeli = $this->input->post('nama_pembeli');
		$no_telpon = $this->input->post('no_telpon');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$query = $this->db->query("UPDATE `tb_pembeli` SET `nama_pembeli` = '$nama_pembeli', `no_telpon` = '$no_telpon', `email` = '$email', `password` = '$password' WHERE `tb_pembeli`.`id_pembeli` = '$id_pembeli';");
		return $query;

	}

public function delete_pembeli($id_pembeli)
	{
		$query = $this->db->query("DELETE FROM `tb_pembeli` WHERE `tb_pembeli`.`id_pembeli` = '$id_pembeli'");
		return $query;
	}
}