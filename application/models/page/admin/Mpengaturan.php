<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// update
class Mpengaturan extends CI_Model
{

	public function get_pengaturan()
	{
		$query = $this->db->query("SELECT * FROM `tb_pengaturan`");
		return $query;
	}

	public function update_pengaturan()
	{
		$nama_bisnis = $this->input->post('nama_bisnis');
		$no_wa = $this->input->post('no_wa');
		$alamat_toko = $this->input->post('alamat_toko');
		$kota = $this->input->post('kota');
		$provinsi = $this->input->post('provinsi');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$tipe_ongkir = $this->input->post('tipe_ongkir');
		$harga_ongkir_flat = $this->input->post('harga_ongkir_flat');
		$harga_ongkir_perkm = $this->input->post('harga_ongkir_perkm');
		$google_api_key = $this->input->post('google_api_key');
		$icon = $_FILES['icon']['name'];

		$config['upload_path'] = './pengaturan/';
		$config['allowed_types'] = '*';
		$config['overwrite'] = true;
		$this->load->library('upload', $config);

		if (!empty($icon)) {
			$this->upload->do_upload('icon');
			$this->upload->data();
			$get_icon = $_FILES['icon']['name'];
			$icon2 = str_replace(" ", "_", "$get_icon");

			$query = $this->db->query("UPDATE `tb_pengaturan` SET `nama_bisnis` = '$nama_bisnis', `no_wa` = '$no_wa', `alamat_toko` = '$alamat_toko', `kota` = '$kota', `provinsi` = '$provinsi', `latitude` = '$latitude', `longitude` = '$longitude', `tipe_ongkir` = '$tipe_ongkir', `harga_ongkir_flat` = '$harga_ongkir_flat', `harga_ongkir_perkm` = '$harga_ongkir_perkm', `google_api_key` = '$google_api_key', `icon` = '$icon' WHERE `tb_pengaturan`.`id_pengaturan` = '1';");
		} else {
			$query = $this->db->query("UPDATE `tb_pengaturan` SET `nama_bisnis` = '$nama_bisnis', `no_wa` = '$no_wa', `alamat_toko` = '$alamat_toko', `kota` = '$kota', `provinsi` = '$provinsi', `latitude` = '$latitude', `longitude` = '$longitude', `tipe_ongkir` = '$tipe_ongkir', `harga_ongkir_flat` = '$harga_ongkir_flat', `harga_ongkir_perkm` = '$harga_ongkir_perkm', `google_api_key` = '$google_api_key' WHERE `tb_pengaturan`.`id_pengaturan` = '1';");
		}

		return $query;

	}

	public function getLokasi()
	{
		return $this->db->query("SELECT latitude as lat,longitude as lng FROM `tb_pengaturan`")->row();
	}

	public function getOngkir()
	{
		return $this->db->query("SELECT tipe_ongkir,harga_ongkir_flat,harga_ongkir_perkm FROM `tb_pengaturan`")->row();

	}
}
