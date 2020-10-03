<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mperkuliahan extends CI_Model {

public function insert_perkuliahan()
	{
		$nim = $this->input->post('nim');
		$kode_mk = $this->input->post('kode_mk');
		$nip = $this->input->post('nip');
		$nilai = $this->input->post('nilai');

		$this->db->query("INSERT INTO `perkuliahan` (`id_perkuliahan`, `nim`, `kode_mk`, `nip`, `nilai`) VALUES (NULL, '$nim', '$kode_mk', '$nip', '$nilai');");
	}

public function get_perkuliahan()
	{
		$query = $this->db->query("SELECT * FROM perkuliahan JOIN matakuliah ON perkuliahan.kode_mk=matakuliah.kode_mk JOIN mahasiswa ON mahasiswa.nim=perkuliahan.nim JOIN dosen ON dosen.nip=perkuliahan.nip ORDER BY perkuliahan.id_perkuliahan DESC");
		return $query;
	}

public function get_edit_perkuliahan($id_perkuliahan)
	{
		$query = $this->db->query("SELECT * FROM perkuliahan WHERE perkuliahan.id_perkuliahan = '$id_perkuliahan'");
		return $query;
	}

function update_perkuliahan()
	{
		$id_perkuliahan = $this->input->post('id_perkuliahan');
		$nim = $this->input->post('nim');
		$kode_mk = $this->input->post('kode_mk');
		$nip = $this->input->post('nip');
		$nilai = $this->input->post('nilai');

		
		$this->db->query("UPDATE `perkuliahan` SET `nim` = '$nim', `kode_mk` = '$kode_mk', `nip` = '$nip', `nilai` = '$nilai' WHERE `perkuliahan`.`id_perkuliahan` = '$id_perkuliahan';");

	}

function delete_perkuliahan($id_perkuliahan)
	{
		$query = $this->db->query("DELETE FROM `perkuliahan` WHERE `perkuliahan`.`id_perkuliahan` = '$id_perkuliahan'");
		return $query;
	}

function kode_perkuliahan()
{
	$carikode = $this->db->query("SELECT max(id_perkuliahan) AS kode FROM perkuliahan");

		foreach ($carikode->result() as $key) {
			if ($key->kode != NULL) {
				$nilaikode = substr($key->kode, 3,6);
			    $kode = (int) $nilaikode;
			    $kode2 = $kode + 1;
			    $kode_otomatis = "MK-".str_pad($kode2, 3, "000", STR_PAD_LEFT);
			} else {
				$kode_otomatis = "MK-001";
			}

		$kodeperkuliahan = $kode_otomatis;
		return $kodeperkuliahan;
	};
	}
}