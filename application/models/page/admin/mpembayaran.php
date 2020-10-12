<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpembayaran extends CI_Model {

public function get_pembayaran()
	{
		$query = $this->db->query("SELECT * FROM `tb_pembayaran` 
			JOIN tb_pesanan ON tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan 
			JOIN tb_alamat ON tb_alamat.id_alamat=tb_pesanan.id_alamat
			JOIN tb_pembeli ON tb_pembeli.id_pembeli=tb_alamat.id_pembeli
			ORDER BY `tb_pembayaran`.`id_pembayaran` DESC");
		return $query;
	}

public function get_edit_pembayaran($id_pembayaran)
	{
		$query = $this->db->query("SELECT * FROM `tb_pembayaran`
		JOIN tb_pesanan ON tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan 
		JOIN tb_alamat ON tb_alamat.id_alamat=tb_pesanan.id_alamat
		JOIN tb_pembeli ON tb_pembeli.id_pembeli=tb_alamat.id_pembeli
		WHERE `tb_pembayaran`.`id_pembayaran` = '$id_pembayaran'");
		return $query;
	}

public function update_pembayaran()
	{
		$id_pembayaran = $this->input->post('id_pembayaran');
		$jenis_pembayaran = $this->input->post('jenis_pembayaran');
		$status_pembayaran = $this->input->post('status_pembayaran');

		$query = $this->db->query("UPDATE `tb_pembayaran` SET `jenis_pembayaran` = '$jenis_pembayaran', `status_pembayaran` = '$status_pembayaran' WHERE `tb_pembayaran`.`id_pembayaran` = '$id_pembayaran';");
		return $query;

	}

function delete_pembayaran($id_pembayaran)
	{
		$query = $this->db->query("DELETE FROM `tb_pembayaran` WHERE `tb_pembayaran`.`id_pembayaran` = '$id_pembayaran'");
		return $query;
	}
}