<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// update
class Mpesanan extends CI_Model
{

	public function get_pesanan()
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$query = $this->db->query("SELECT *,tb_pembeli.no_telpon AS no_pembeli FROM `tb_pesanan`
			JOIN tb_alamat on tb_alamat.id_alamat=tb_pesanan.id_alamat 
			JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli
			JOIN tb_pembayaran ON tb_pesanan.id_pesanan=tb_pembayaran.id_pesanan
			JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna
			WHERE tb_pengguna.id_pengguna = '$id_pengguna'
			ORDER BY `tb_pesanan`.`id_pesanan` DESC");
		return $query;
	}

	public function get_detail_pesanan($id_pesanan)
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$query = $this->db->query("SELECT *, tb_pembeli.no_telpon AS no_pembeli FROM `tb_pesanan` 
			JOIN tb_alamat on tb_alamat.id_alamat=tb_pesanan.id_alamat 
			JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli
			JOIN tb_pembayaran ON tb_pesanan.id_pesanan=tb_pembayaran.id_pesanan
			JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna
			WHERE `tb_pesanan`.`id_pesanan` = '$id_pesanan' AND tb_pengguna.id_pengguna = '$id_pengguna'");
		return $query;
	}

	public function get_detail_produk($id_pesanan)
	{
		$query = $this->db->query("SELECT * FROM `tb_rincian_pesanan` JOIN tb_produk ON tb_rincian_pesanan.id_produk=tb_produk.id_produk WHERE tb_rincian_pesanan.id_pesanan='$id_pesanan'");
		return $query;
	}

	public function get_edit_pesanan($id_pesanan)
	{
		$query = $this->db->query("SELECT * FROM `tb_pesanan` 
			JOIN tb_alamat on tb_alamat.id_alamat=tb_pesanan.id_alamat 
			JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli
			JOIN tb_pembayaran ON tb_pesanan.id_pesanan=tb_pembayaran.id_pesanan
			JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna
			WHERE `tb_pesanan`.`id_pesanan` = '$id_pesanan'");
		return $query;
	}

	public function update_pesanan()
	{
		$id_pesanan = $this->input->post('id_pesanan');
		$status = $this->input->post('status');
		$jenis_pembayaran = $this->input->post('jenis_pembayaran');

		if ($jenis_pembayaran=="COD" AND $status==4) {
			$query2 = $this->db->query("UPDATE `tb_pembayaran` SET `status_pembayaran` = 'Sudah Dibayar' WHERE `tb_pembayaran`.`id_pesanan` = '$id_pesanan';");
			$query = $this->db->query("UPDATE `tb_pesanan` SET `status` = '$status' WHERE `tb_pesanan`.`id_pesanan` = '$id_pesanan';");
		} else {
			$query = $this->db->query("UPDATE `tb_pesanan` SET `status` = '$status' WHERE `tb_pesanan`.`id_pesanan` = '$id_pesanan';");
		}
		return $query;
	}
}

