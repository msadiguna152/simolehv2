<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Madmin extends CI_Model {


public function get_pengguna()
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$query = $this->db->query("SELECT * FROM pengguna WHERE pengguna.id_pengguna = '$id_pengguna'");
		return $query;
	}

public function get_sosmed()
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$query = $this->db->query("SELECT * FROM sosmed WHERE sosmed.id_pengguna = '$id_pengguna'");
		return $query;
	}

public function get_pendaftar()
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$query = $this->db->query("
		SELECT * FROM pendaftar LEFT JOIN pengguna ON pendaftar.kode_pendaftar=pengguna.kode_pendaftar WHERE pengguna.id_pengguna='$id_pengguna'");
		return $query;
	}

public function get_edit_pengguna($id_pengguna)
	{
		$query = $this->db->query("SELECT * FROM pengguna WHERE pengguna.id_pengguna = '$id_pengguna'");
		return $query;
	}

public function update_pengguna()
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$username = htmlspecialchars($this->input->post('username'),TRUE);
		$nama_pengguna = htmlspecialchars($this->input->post('nama_pengguna'),TRUE);
		$kon_password_baru = password_hash($this->input->post('kon_password_baru'), PASSWORD_DEFAULT);
		$foto_pengguna = $_FILES['foto_pengguna']['name'];

		if (empty($foto_pengguna)) {
			$query = $this->db->query("UPDATE `pengguna` SET `username` = '$username', `password` = '$kon_password_baru', `nama_pengguna` = '$nama_pengguna', WHERE `pengguna`.`id_pengguna` = '$id_pengguna';");
		} else {
			$foto_pengguna = $_FILES['foto_pengguna']['name'];
			$config['upload_path']          = './profile/';
			$config['allowed_types']        = '*';
			$config['file_name']            = $foto_pengguna;
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto_pengguna');
			$this->upload->data("file_name");

			$query = $this->db->query("UPDATE `pengguna` SET `username` = '$username', `password` = '$kon_password_baru', `nama_pengguna` = '$nama_pengguna', `foto_pengguna` = '$foto_pengguna' WHERE `pengguna`.`id_pengguna` = '$id_pengguna';");
		}
		return $query;

	}

}