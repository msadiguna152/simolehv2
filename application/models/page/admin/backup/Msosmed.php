<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msosmed extends CI_Model {

public function insert_sosmed()
	{
		$id_sosmed = $this->input->post('id_sosmed');
		$nama_sosmed = $this->input->post('nama_sosmed');
		$url_sosmed = $this->input->post('url_sosmed');
		$jenis_sosmed = $this->input->post('jenis_sosmed');
		$id_pengguna = $this->session->userdata('id_pengguna');

		$query = $this->db->query("INSERT INTO `sosmed` (`id_sosmed`, `id_pengguna`, `nama_sosmed`, `url_sosmed`, `jenis_sosmed`) VALUES (NULL, '$id_pengguna', '$nama_sosmed', '$url_sosmed', '$jenis_sosmed');");
		return $query;
	}

public function get_sosmed()
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$query = $this->db->query("SELECT * FROM sosmed LEFT JOIN pengguna ON pengguna.id_pengguna=sosmed.id_pengguna ORDER BY `sosmed`.`id_sosmed` DESC");
		return $query;
	}

public function get_edit_sosmed($id_sosmed)
	{
		$query = $this->db->query("SELECT * FROM sosmed LEFT JOIN pengguna ON pengguna.id_pengguna=sosmed.id_pengguna WHERE sosmed.id_sosmed = '$id_sosmed'");
		return $query;
	}

function update_sosmed()
	{
		$id_sosmed = $this->input->post('id_sosmed');
		$nama_sosmed = $this->input->post('nama_sosmed');
		$url_sosmed = $this->input->post('url_sosmed');
		$jenis_sosmed = $this->input->post('jenis_sosmed');
		$id_pengguna = $this->session->userdata('id_pengguna');

		$query = $this->db->query("UPDATE `sosmed` SET `id_pengguna` = '$id_pengguna', `nama_sosmed` = '$nama_sosmed', `url_sosmed` = '$url_sosmed', `jenis_sosmed` = '$jenis_sosmed' WHERE `sosmed`.`id_sosmed` = '$id_sosmed';");
		return $query;

	}

function delete_sosmed($id_sosmed)
	{
		$query = $this->db->query("DELETE FROM `sosmed` WHERE `sosmed`.`id_sosmed` = '$id_sosmed'");
		return $query;
	}
}