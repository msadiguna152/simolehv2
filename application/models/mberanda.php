<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mberanda extends CI_Model {

public function get_kategori()
	{
		$query = $this->db->query("SELECT * FROM `tb_kategori` ORDER BY `tb_kategori`.`id_kategori` DESC");
		return $query;
	}

public function get_promosi()
	{
		$query = $this->db->query("SELECT * FROM `tb_produk` WHERE promosi=1");
		return $query;
	}

public function get_edit_kategori($id_kategori)
	{
		$query = $this->db->query("SELECT * FROM `tb_kategori` WHERE `tb_kategori`.`id_kategori` = '$id_kategori'");
		return $query;
	}

}