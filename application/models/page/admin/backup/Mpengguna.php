<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpengguna extends CI_Model {

public function insert_pengguna()
	{
		$kode_pengguna = $this->input->post('kode_pengguna');
		$nama_pengguna = $this->input->post('nama_pengguna');
		$url_pengguna = $this->input->post('url_pengguna');
		$jenis_pengguna = $this->input->post('jenis_pengguna');

		$query = $this->db->query("INSERT INTO `pengguna` (`id_pengguna`, `kode_pengguna`, `nama_pengguna`, `url_pengguna`, `jenis_pengguna`) VALUES (NULL, '$url_pengguna', '$nama_pengguna', '$url_pengguna', '$jenis_pengguna');");
		return $query;
	}

public function get_pengguna()
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$query = $this->db->query("SELECT * FROM pengguna ORDER BY `pengguna`.`id_pengguna` DESC");
		return $query;
	}

public function get_edit_pengguna($id_pengguna)
	{
		$query = $this->db->query("SELECT * FROM pengguna WHERE pengguna.id_pengguna = '$id_pengguna'");
		return $query;
	}

function update_pengguna()
	{
		$id_pengguna = $this->input->post('id_pengguna');
		$nama_pengguna = $this->input->post('nama_pengguna');
		$url_pengguna = $this->input->post('url_pengguna');
		$jenis_pengguna = $this->input->post('jenis_pengguna');
		$id_pengguna = $this->session->userdata('id_pengguna');

		$query = $this->db->query("UPDATE `pengguna` SET `id_pengguna` = '$id_pengguna', `nama_pengguna` = '$nama_pengguna', `url_pengguna` = '$url_pengguna', `jenis_pengguna` = '$jenis_pengguna' WHERE `pengguna`.`id_pengguna` = '$id_pengguna';");
		return $query;

	}

function delete_pengguna($kode_pengguna)
	{
		$query = $this->db->query("DELETE FROM `pengguna` WHERE `pengguna`.`kode_pengguna` = '$kode_pengguna'");
		return $query;
	}

// function kode_pengguna()
// {
// 	$carikode = $this->db->query("SELECT max(nim) AS kode FROM pengguna");

// 		foreach ($carikode->result() as $key) {
// 			if ($key->kode != NULL) {
// 				$nilaikode = substr($key->kode, 3,6);
// 			    $kode = (int) $nilaikode;
// 			    $kode2 = $kode + 1;
// 			    $kode_otomatis = "MK-".str_pad($kode2, 3, "000", STR_PAD_LEFT);
// 			} else {
// 				$kode_otomatis = "MK-001";
// 			}

// 		$kodepengguna = $kode_otomatis;
// 		return $kodepengguna;
// 	};
// 	}
}