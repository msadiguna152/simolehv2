<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// update
class Mberanda extends CI_Model {

public function get_kategori()
	{
		$query = $this->db->query("SELECT * FROM `tb_kategori` JOIN tb_produk ON tb_kategori.id_kategori=tb_produk.id_kategori GROUP BY tb_produk.id_kategori ORDER BY `tb_kategori`.`id_kategori` DESC");
		return $query;
	}

public function get_sliders()
	{
		$query = $this->db->query("SELECT * FROM `tb_sliders` ORDER BY `tb_sliders`.`id_sliders` DESC");
		return $query;
	}

public function get_grid1() //Untukmu hari ini
	{
		$query = $this->db->query("SELECT * FROM `tb_kategori` JOIN tb_produk ON tb_kategori.id_kategori=tb_produk.id_kategori ORDER BY `tb_produk`.`id_produk`, tb_produk.promosi DESC LIMIT 8");
		return $query;
	}

public function get_produk1() //Untukmu hari ini
	{
		$query = $this->db->query("SELECT * FROM `tb_kategori` JOIN tb_produk ON tb_kategori.id_kategori=tb_produk.id_kategori ORDER BY `tb_produk`.`id_produk`, tb_produk.promosi DESC");
		return $query;
	}

public function get_grid2() //Promosi hari ini
	{
		$query = $this->db->query("SELECT * FROM `tb_kategori` JOIN tb_produk ON tb_kategori.id_kategori=tb_produk.id_kategori WHERE tb_produk.promosi='1' ORDER BY `tb_produk`.`id_produk` DESC LIMIT 4");
		return $query;
	}
public function get_produk2() //Promosi hari ini
	{
		$query = $this->db->query("SELECT * FROM `tb_kategori` JOIN tb_produk ON tb_kategori.id_kategori=tb_produk.id_kategori WHERE tb_produk.promosi='1' ORDER BY `tb_produk`.`id_produk` DESC");
		return $query;
	}

public function get_grid3() //Best Seller
	{
		$query = $this->db->query("SELECT * FROM `tb_kategori` JOIN tb_produk ON tb_kategori.id_kategori=tb_produk.id_kategori WHERE tb_produk.terlaris='1' ORDER BY `tb_produk`.`id_produk` DESC LIMIT 4");
		return $query;
	}

public function get_produk3() //Best Seller
	{
		$query = $this->db->query("SELECT * FROM `tb_kategori` JOIN tb_produk ON tb_kategori.id_kategori=tb_produk.id_kategori WHERE tb_produk.terlaris='1' ORDER BY `tb_produk`.`id_produk` DESC");
		return $query;
	}

public function get_perproduk($id)
	{
		$query = $this->db->query("SELECT * FROM `tb_kategori` JOIN tb_produk ON tb_kategori.id_kategori=tb_produk.id_kategori WHERE tb_produk.slug_p='$id'");
		return $query;
	}

public function get_perkategori($id)
	{
		$query = $this->db->query("SELECT * FROM `tb_kategori` JOIN tb_produk ON tb_kategori.id_kategori=tb_produk.id_kategori WHERE tb_kategori.slug='$id' ORDER BY `tb_kategori`.`id_kategori`, tb_produk.promosi DESC");
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