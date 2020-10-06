<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpesanan extends CI_Model {

public function get_pesanan()
	{
		$query = $this->db->query("SELECT * FROM `tb_pesanan` JOIN tb_alamat on tb_alamat.id_alamat=tb_pesanan.id_alamat JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli ORDER BY `tb_pesanan`.`id_pesanan` DESC");
		return $query;
	}

public function get_detail_pesanan($id_pesanan)
	{
		$query = $this->db->query("SELECT * FROM `tb_pesanan` JOIN tb_alamat on tb_alamat.id_alamat=tb_pesanan.id_alamat JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli WHERE `tb_pesanan`.`id_pesanan` = '$id_pesanan'");
		return $query;
	}

public function get_detail_produk($id_pesanan)
	{
		$query = $this->db->query("SELECT * FROM `tb_rincian_pesanan` JOIN tb_produk ON tb_rincian_pesanan.id_produk=tb_produk.id_produk WHERE tb_rincian_pesanan.id_pesanan='$id_pesanan'");
		return $query;
	}

public function get_edit_pesanan($id_pesanan)
	{
		$query = $this->db->query("SELECT * FROM `tb_pesanan` JOIN tb_alamat on tb_alamat.id_alamat=tb_pesanan.id_alamat JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli WHERE `tb_pesanan`.`id_pesanan` = '$id_pesanan'");
		return $query;
	}

public function update_pesanan()
	{
		$id_pesanan = $this->input->post('id_pesanan');
		$total_pembayaran = $this->input->post('total_pembayaran');
		$ongkir = $this->input->post('ongkir');
		$voucher = $this->input->post('voucher');

		$query = $this->db->query("UPDATE `tb_pesanan` SET `total_pembayaran` = '$total_pembayaran', `ongkir` = '$ongkir', `voucher` = '$voucher' WHERE `tb_pesanan`.`id_pesanan` = '$id_pesanan';");
		return $query;

	}

function delete_pesanan($id_pesanan)
	{
		$query = $this->db->query("DELETE FROM `tb_pesanan` WHERE `tb_pesanan`.`id_pesanan` = '$id_pesanan'");
		return $query;
	}
}