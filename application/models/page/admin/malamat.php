<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Malamat extends CI_Model
{

	public function get_alamat()
	{
		$query = $this->db->query("SELECT * FROM `tb_alamat` JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli ORDER BY `tb_alamat`.`id_alamat` DESC");
		return $query;
	}

	public function get_alamat_pembeli($id)
	{
		$query = $this->db->query("SELECT * FROM `tb_alamat` JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli WHERE tb_pembeli.id_pembeli = '$id' ORDER BY `tb_alamat`.`id_alamat` DESC");
		return $query;
	}

	public function get_edit_alamat($id_alamat)
	{
		$query = $this->db->query("SELECT * FROM `tb_alamat` JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli WHERE `tb_alamat`.`id_alamat` = '$id_alamat'");
		return $query;
	}

	public function insert_alamat()
	{
		$id_alamat = $this->input->post('id_alamat');
		$id_pembeli = $this->input->post('id_pembeli');
		$alamat_lengkap = $this->input->post('alamat_lengkap');
		$rincian_alamat = $this->input->post('rincian_alamat');
		$lat = $this->input->post('lat');
		$long = $this->input->post('long');

		$query = $this->db->query("INSERT INTO `tb_alamat` (`id_alamat`, `id_pembeli`, `alamat_lengkap`, `rincian_alamat`, `lat`, `long`) VALUES (NULL, '$id_pembeli', '$alamat_lengkap', '$rincian_alamat', '$lat', '$long');");
		return $query;
	}

	public function update_alamat()
	{
		$id_alamat = $this->input->post('id_alamat');
		$alamat_lengkap = $this->input->post('alamat_lengkap');
		$rincian_alamat = $this->input->post('rincian_alamat');
		$lat = $this->input->post('lat');
		$long = $this->input->post('long');

		$query = $this->db->query("UPDATE `tb_alamat` SET `alamat_lengkap` = '$alamat_lengkap', `rincian_alamat` = '$rincian_alamat', `lat` = '$lat', `long` = '$long' WHERE `tb_alamat`.`id_alamat` = '$id_alamat';");
		return $query;

	}

	function delete_alamat($id_alamat)
	{
		$query = $this->db->query("DELETE FROM `tb_alamat` WHERE `tb_alamat`.`id_alamat` = '$id_alamat'");
		return $query;
	}
}
