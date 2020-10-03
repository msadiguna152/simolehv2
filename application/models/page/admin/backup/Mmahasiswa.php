<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mmahasiswa extends CI_Model {

public function insert_mahasiswa()
	{
		$nim = $this->input->post('nim');
		$nama_mhs = $this->input->post('nama_mhs');

		$get_tgl_lahir = $this->input->post('tgl_lahir');
		$date1  = date_create($get_tgl_lahir);
		$tgl_lahir = date_format($date1,"Y-m-d");

		$tmp_lahir = $this->input->post('tmp_lahir');
		$alamat = $this->input->post('alamat');
		$jenis_kelamin = $this->input->post('jenis_kelamin');

		$this->db->query("INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `tgl_lahir`, `tmp_lahir`, `alamat`, `jenis_kelamin`) VALUES ('$nim', '$nama_mhs', '$tgl_lahir', '$tmp_lahir', '$alamat', '$jenis_kelamin');");
	}

public function get_mahasiswa()
	{
		$query = $this->db->query("SELECT * FROM mahasiswa ORDER BY nim DESC");
		return $query;
	}

public function get_edit_mahasiswa($nim)
	{
		$query = $this->db->query("SELECT * FROM mahasiswa WHERE mahasiswa.nim = '$nim'");
		return $query;
	}

function update_mahasiswa()
	{
		$nim = $this->input->post('nim');
		$nama_mhs = $this->input->post('nama_mhs');

		$get_tgl_lahir = $this->input->post('tgl_lahir');
		$date = strtotime($get_tgl_lahir);
    	$tgl_lahir = date('Y-m-d',$date);

		echo $tgl_lahir;

		$tmp_lahir = $this->input->post('tmp_lahir');
		$alamat = $this->input->post('alamat');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		
		$this->db->query("UPDATE `mahasiswa` SET `nama_mhs` = '$nama_mhs', `tgl_lahir` = '$tgl_lahir', `tmp_lahir` = '$tmp_lahir', `alamat` = '$alamat', `jenis_kelamin` = '$jenis_kelamin' WHERE `mahasiswa`.`nim` = '$nim';");

	}

function delete_mahasiswa($nim)
	{
		$query = $this->db->query("DELETE FROM `perkuliahan` WHERE `perkuliahan`.`nim` = '$nim'");
		$query = $this->db->query("DELETE FROM `mahasiswa` WHERE `mahasiswa`.`nim` = '$nim'");
		return $query;
	}

function kode_mahasiswa()
{
	$carikode = $this->db->query("SELECT max(nim) AS kode FROM mahasiswa");

		foreach ($carikode->result() as $key) {
			if ($key->kode != NULL) {
				$nilaikode = substr($key->kode, 3,6);
			    $kode = (int) $nilaikode;
			    $kode2 = $kode + 1;
			    $kode_otomatis = "MK-".str_pad($kode2, 3, "000", STR_PAD_LEFT);
			} else {
				$kode_otomatis = "MK-001";
			}

		$kodemahasiswa = $kode_otomatis;
		return $kodemahasiswa;
	};
	}
}