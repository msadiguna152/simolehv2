<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// update
class Mpesanan extends CI_Model
{

	public function get_pesanan()
	{
		$query = $this->db->query("SELECT *,tb_pembeli.no_telpon AS no_pembeli FROM `tb_pesanan` 
			JOIN tb_alamat on tb_alamat.id_alamat=tb_pesanan.id_alamat 
			JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli 
			LEFT JOIN tb_pembayaran ON tb_pesanan.id_pesanan=tb_pembayaran.id_pesanan 
			LEFT JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna 
			ORDER BY `tb_pesanan`.`id_pesanan` DESC");
		return $query;
	}

	public function get_pesanan_customer($id_pembeli)
	{
		$alamats = $this->db->select('id_alamat')->where('id_pembeli', $id_pembeli)->get('tb_alamat')->result();
		$data_alamat = array_map(function ($item) {
			return $item->id_alamat;
		}, $alamats);
		$query = [];
		if (count($alamats) > 0) {
			$query = $this->db->query("SELECT * FROM `tb_pesanan` 
			JOIN tb_alamat on tb_alamat.id_alamat=tb_pesanan.id_alamat 
			JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli 
			JOIN tb_pembayaran ON tb_pesanan.id_pesanan=tb_pembayaran.id_pesanan 
			WHERE tb_alamat.id_alamat IN(" . implode(',', $data_alamat) . ")
			ORDER BY `tb_pesanan`.`id_pesanan` DESC")->result();
		}
		return $query;
	}

	public function get_kurir()
	{
		$query = $this->db->query("SELECT * FROM `tb_pengguna` WHERE level='Kurir'");
		return $query;
	}

	public function get_detail_pesanan($id_pesanan)
	{
		$query = $this->db->query("SELECT *,tb_pembeli.no_telpon AS no_pembeli FROM `tb_pesanan` 
			JOIN tb_alamat on tb_alamat.id_alamat=tb_pesanan.id_alamat 
			JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli
			LEFT JOIN tb_pembayaran ON tb_pesanan.id_pesanan=tb_pembayaran.id_pesanan
			LEFT JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna
			WHERE `tb_pesanan`.`id_pesanan` = '$id_pesanan'");
		return $query;
	}

	public function get_detail_transaksi($id_pesanan)
	{
		$query = $this->db->query("SELECT *,tb_pembeli.no_telpon AS no_pembeli FROM `tb_pesanan` 
			JOIN tb_alamat on tb_alamat.id_alamat=tb_pesanan.id_alamat 
			JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli
			JOIN tb_pembayaran ON tb_pesanan.id_pesanan=tb_pembayaran.id_pesanan
			JOIN tb_rincian_pesanan ON tb_rincian_pesanan.id_pesanan = tb_pesanan.id_pesanan
			JOIN tb_produk ON tb_produk.id_produk = tb_rincian_pesanan.id_produk
			WHERE `tb_pesanan`.`id_pesanan` = '$id_pesanan'")->result();
		return $query;
	}

	public function get_detail_produk($id_pesanan)
	{
		$query = $this->db->query("SELECT * FROM `tb_rincian_pesanan` JOIN tb_produk ON tb_rincian_pesanan.id_produk=tb_produk.id_produk WHERE tb_rincian_pesanan.id_pesanan='$id_pesanan'");
		return $query;
	}

	public function get_edit_pesanan($id_pesanan)
	{
		$query = $this->db->query("SELECT *,tb_pembeli.no_telpon AS no_pembeli FROM `tb_pesanan` 
			JOIN tb_alamat on tb_alamat.id_alamat=tb_pesanan.id_alamat 
			JOIN tb_pembeli ON tb_alamat.id_pembeli=tb_pembeli.id_pembeli
			LEFT JOIN tb_pembayaran ON tb_pesanan.id_pesanan=tb_pembayaran.id_pesanan
			LEFT JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna
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
		return $this->db->select('tb_pembayaran.*,tb_pesanan.total_pembayaran')->join('tb_pesanan', 'tb_pesanan.id_pesanan = tb_pembayaran.id_pesanan', 'INNER')->where('id_pembayaran', $id)->get('tb_pembayaran')->row();
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

	function get_last_pesanan()
	{
		return $this->db->select('*')->order_by('timestamp_pesanan', 'DESC')->get('tb_pesanan')->row();
	}
	function total_pesanan($status){
		$jnotif = $this->db->query("SELECT id_pesanan AS notif FROM `tb_pesanan` WHERE status='$status'");
		return $jnotif->num_rows();
	}
}

