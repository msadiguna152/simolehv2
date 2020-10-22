<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mpesanan extends CI_Model
{

	public function get_pesanan()
	{
		$query = $this->db->query("SELECT * FROM `tb_pesanan` 
			JOIN tb_alamat on tb_alamat.id_alamat=tb_pesanan.id_alamat 
			JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli
			JOIN tb_pembayaran ON tb_pesanan.id_pesanan=tb_pembayaran.id_pesanan
			JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna
			ORDER BY `tb_pesanan`.`id_pesanan` DESC");
		return $query;
	}

	public function get_kurir()
	{
		$query = $this->db->query("SELECT * FROM `tb_pengguna` WHERE level='Kurir'");
		return $query;
	}

	public function get_detail_pesanan($id_pesanan)
	{
		$query = $this->db->query("SELECT * FROM `tb_pesanan` 
			JOIN tb_alamat on tb_alamat.id_alamat=tb_pesanan.id_alamat 
			JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli
			JOIN tb_pembayaran ON tb_pesanan.id_pesanan=tb_pembayaran.id_pesanan
			JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna
			WHERE `tb_pesanan`.`id_pesanan` = '$id_pesanan'");
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
		$total_pembayaran = $this->input->post('total_pembayaran');
		$id_pengguna = $this->input->post('id_pengguna');
		$ongkir = $this->input->post('ongkir');
		$voucher = $this->input->post('voucher');
		$status = $this->input->post('status');
		$catatan = $this->input->post('catatan');

		$query = $this->db->query("UPDATE `tb_pesanan` SET `total_pembayaran` = '$total_pembayaran', `ongkir` = '$ongkir', `status` = '$status', `voucher` = '$voucher', `catatan` = '$catatan', `id_pengguna` = '$id_pengguna' WHERE `tb_pesanan`.`id_pesanan` = '$id_pesanan';");
		return $query;
	}

	function delete_pesanan($id_pesanan)
	{
		$query = $this->db->query("DELETE FROM `tb_pesanan` WHERE `tb_pesanan`.`id_pesanan` = '$id_pesanan'");
		return $query;
	}

	function insert_pesanan($data)
	{
		$this->db->insert('tb_pesanan', $data);
		return $this->db->insert_id();
	}

	function insert_pembayaran($data)
	{
		$this->db->insert('tb_pembayaran', $data);
		return $this->db->insert_id();
	}

	function get_pembayaran($id)
	{
		return $this->db->select('*')->where('id_pembayaran', $id)->get('tb_pembayaran')->row();
	}

	function insert_rincian_pesanan($data)
	{
		return $this->db->insert_batch('tb_rincian_pesanan', $data);
	}

	function get_pesanan_by_external_id($id)
	{
		return $this->db->where('kode_pembayaran', $id)->get('tb_pesanan')->row();
	}

	function update_status_pesanan($status, $id)
	{
		return $this->db->set(['status_pembayaran' => $status])->where('kode_pembayaran', $id)->update('tb_pembayaran');
	}
}

