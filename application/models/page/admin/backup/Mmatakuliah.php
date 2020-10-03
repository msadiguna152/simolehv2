<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mmatakuliah extends CI_Model {

public function insert_matakuliah()
	{
		$nama_mk = $this->input->post('nama_mk');
		$kode_mk = $this->input->post('kode_mk');
		$sks = $this->input->post('sks');

		$this->db->query("INSERT INTO `matakuliah` (`kode_mk`, `nama_mk`, `sks`) VALUES ('$kode_mk', '$nama_mk', '$sks');");
	}

public function get_matakuliah()
	{
		$query = $this->db->query("SELECT * FROM matakuliah ORDER BY kode_mk DESC");
		return $query;
	}

public function get_edit_matakuliah($kode_mk)
	{
		$query = $this->db->query("SELECT * FROM matakuliah WHERE matakuliah.kode_mk = '$kode_mk'");
		return $query;
	}

function update_matakuliah()
	{
		$nama_mk = $this->input->post('nama_mk');
		$kode_mk = $this->input->post('kode_mk');
		$sks = $this->input->post('sks');
		
		$this->db->query("UPDATE `matakuliah` SET `nama_mk` = '$nama_mk', `sks` = '$sks' WHERE `matakuliah`.`kode_mk` = '$kode_mk';");

	}

function delete_matakuliah($kode_mk)
	{
		$query = $this->db->query("DELETE FROM `perkuliahan` WHERE `perkuliahan`.`kode_mk` = '$kode_mk'");
		$query = $this->db->query("DELETE FROM `matakuliah` WHERE `matakuliah`.`kode_mk` = '$kode_mk'");
		return $query;
	}

function kode_matakuliah()
{
	$carikode = $this->db->query("SELECT max(kode_mk) AS kode FROM matakuliah");

		foreach ($carikode->result() as $key) {
			if ($key->kode != NULL) {
				$nilaikode = substr($key->kode, 3,6);
			    $kode = (int) $nilaikode;
			    $kode2 = $kode + 1;
			    $kode_otomatis = "MK-".str_pad($kode2, 3, "000", STR_PAD_LEFT);
			} else {
				$kode_otomatis = "MK-001";
			}

		$kodematakuliah = $kode_otomatis;
		return $kodematakuliah;
	};
	}
}