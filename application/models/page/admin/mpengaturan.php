<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpengaturan extends CI_Model {

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

		$query = $this->db->query("UPDATE `tb_pengaturan` SET `nama_bisnis` = '$nama_bisnis', `no_wa` = '$no_wa', `alamat_toko` = '$alamat_toko', `kota` = '$kota', `provinsi` = '$provinsi', `latitude` = '$latitude', `longitude` = '$longitude' WHERE `tb_pengaturan`.`id_pengaturan` = '1';");

		return $query;

	}

}