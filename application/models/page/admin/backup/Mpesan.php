<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpesan extends CI_Model {

public function insert_pesan()
	{
		$kode_pesan = $this->input->post('kode_pesan');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$email = $this->input->post('email');

		$tanggal_pesan = date("Y-m-d H:i:sa");

		$query = $this->db->query("");

		return $query;
	}

public function get_pesan()
	{
		$query = $this->db->query("SELECT * FROM pesan  ORDER BY `pesan`.`id_pesan` DESC");
		return $query;
	}

public function get_edit_pesan($kode_pesan)
	{
		$query = $this->db->query("SELECT * FROM pesan WHERE pesan.kode_pesan = '$kode_pesan'");
		return $query;
	}

function update_pesan()
	{
		$id_pesan = $this->input->post('id_pesan');
		$kode_pesan = $this->input->post('kode_pesan');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$email = $this->input->post('email');
		$nomor_hp = $this->input->post('nomor_hp');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		$pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
		$dokumen = $this->input->post('dokumen');
		$alasan_mendaftar = $this->input->post('alasan_mendaftar');
		$status_pesan = $this->input->post('status_pesan');

		$query = $this->db->query("UPDATE `pesan` SET `kode_pesan` = '$kode_pesan', `nama_lengkap` = '$nama_lengkap', `jenis_kelamin` = '$jenis_kelamin', `tempat_lahir` = '$tempat_lahir', `tanggal_lahir` = '$tanggal_lahir', `email` = '$email', `nomor_hp` = '$nomor_hp', `alamat` = '$alamat', `pekerjaan` = '$pekerjaan', `pendidikan_terakhir` = '$pendidikan_terakhir', `dokumen` = '$dokumen', `alasan_mendaftar` = '$alasan_mendaftar', `status_pesan` = '$status_pesan' WHERE `pesan`.`id_pesan` = '$id_pesan';");
		
		return $query;

	}

function delete_pesan($kode_pesan)
	{
		$query = $this->db->query("DELETE FROM `pesan` WHERE `pesan`.`kode_pesan` = '$kode_pesan'");
		return $query;
	}

// function kode_pesan()
// {
// 	$carikode = $this->db->query("SELECT max(nim) AS kode FROM pesan");

// 		foreach ($carikode->result() as $key) {
// 			if ($key->kode != NULL) {
// 				$nilaikode = substr($key->kode, 3,6);
// 			    $kode = (int) $nilaikode;
// 			    $kode2 = $kode + 1;
// 			    $kode_otomatis = "MK-".str_pad($kode2, 3, "000", STR_PAD_LEFT);
// 			} else {
// 				$kode_otomatis = "MK-001";
// 			}

// 		$kodepesan = $kode_otomatis;
// 		return $kodepesan;
// 	};
// 	}
}