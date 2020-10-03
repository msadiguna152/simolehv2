<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdosen extends CI_Model {

public function insert_dosen()
	{
		$nip = $this->input->post('nip');
		$nama_dosen = $this->input->post('nama_dosen');

		$this->db->query("INSERT INTO `dosen` (`nip`, `nama_dosen`) VALUES ('$nip', '$nama_dosen');");
	}

public function get_dosen()
	{
		$query = $this->db->query("SELECT * FROM dosen ORDER BY nama_dosen DESC");
		return $query;
	}

public function get_edit_dosen($nip)
	{
		$query = $this->db->query("SELECT * FROM dosen WHERE dosen.nip = '$nip'");
		return $query;
	}

function update_dosen()
	{
		$nip = $this->input->post('nip');
		$nama_dosen = $this->input->post('nama_dosen');
		
		$this->db->query("UPDATE `dosen` SET `nama_dosen` = '$nama_dosen' WHERE `dosen`.`nip` = '$nip';");

	}

function delete_dosen($nip)
	{
		$query = $this->db->query("DELETE FROM `perkuliahan` WHERE `perkuliahan`.`nip` = '$nip'");
		$query = $this->db->query("DELETE FROM `dosen` WHERE `dosen`.`nip` = '$nip'");
		return $query;
	}

function kode_dosen()
	{
		//query mencek nilai ID maxsimal
		$query = $this->db->query("SELECT max(nip) as kode FROM dosen");
		//apabila nilai ID tidak sama dengan 0 maka ID akan ditambah 1
		if($query->num_rows()<>0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}
		//apabila nilai ID sama dengan 0 maka ID akan di set dengan nilai 1
		else{
			$kode = 1;
		}
		$kodemax = str_pad($kode,5,"KP00",STR_PAD_LEFT);
		$kodedosen = $kodemax;
		return $kodedosen;
	}

}