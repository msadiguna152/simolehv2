<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mvideo extends CI_Model {

public function get_video()
	{
		$id_pengguna = $this->session->userdata('id_pengguna');;
		$query = $this->db->query("SELECT * FROM `video` LEFT JOIN pengguna ON video.id_pengguna=pengguna.id_pengguna ORDER BY `video`.`id_video` DESC");
		return $query;
	}

public function insert_video()
	{
		$id_pengguna = $this->input->post('id_pengguna');
		$judul_video = $this->input->post('judul_video');
		$deskripsi_video = $this->input->post('deskripsi_video');
		$tanggal_video = $this->input->post('tanggal_video');
		$url_video = $this->input->post('url_video');

		$query = $this->db->query("INSERT INTO `video` (`id_video`, `id_pengguna`, `judul_video`, `deskripsi_video`, `tanggal_video`, `status_video`, `url_video`) VALUES (NULL, '$id_pengguna', '$judul_video', '$deskripsi_video', '$tanggal_video', 'Tidak Aktif', '$url_video');");
		return $query;
	}

public function get_edit_video($id_video)
	{
		$query = $this->db->query("SELECT * FROM video JOIN pengguna ON video.id_pengguna=pengguna.id_pengguna WHERE video.id_video = '$id_video'");
		return $query;
	}

function update_video()
	{
		$id_video = $this->input->post('id_video');
		$id_pengguna = $this->input->post('id_pengguna');
		$judul_video = $this->input->post('judul_video');
		$deskripsi_video = $this->input->post('deskripsi_video');
		$tanggal_video = $this->input->post('tanggal_video');
		$url_video = $this->input->post('url_video');
		$status_video = $this->input->post('status_video');

		$query = $this->db->query("UPDATE `video` SET `id_pengguna` = '$id_pengguna', `judul_video` = '$judul_video', `deskripsi_video` = '$deskripsi_video', `tanggal_video` = '$tanggal_video', `status_video` = '$status_video', `url_video` = '$url_video' WHERE `video`.`id_video` = '$id_video';");
		return $query;

	}

function delete_video($id_video)
	{
		$query = $this->db->query("DELETE FROM `video` WHERE `video`.`id_video` = '$id_video'");
		return $query;
	}
}