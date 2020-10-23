<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// update
class Mkategori extends CI_Model {

public function get_kategori()
	{
		$query = $this->db->query("SELECT * FROM `tb_kategori` ORDER BY `tb_kategori`.`id_kategori` DESC");
		return $query;
	}

public function get_edit_kategori($id_kategori)
	{
		$query = $this->db->query("SELECT * FROM `tb_kategori` WHERE `tb_kategori`.`id_kategori` = '$id_kategori'");
		return $query;
	}

public function insert_kategori()
	{
		$nama_kategori = ucwords($this->input->post('nama_kategori'));
		$slug = str_replace(" ", "-",strtolower($nama_kategori));

		$icon = $_FILES['icon']['name'];
		$config['upload_path'] = './file/';
		$config['allowed_types'] = '*';
	   	$config['overwrite'] = true;
	   	$this->load->library('upload', $config);
	   	$this->upload->do_upload('icon');
        $this->upload->data();

		$query = $this->db->query("INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `slug`, `icon`) VALUES (NULL, '$nama_kategori', '$slug', '$icon');");
		return $query;
	}

public function update_kategori()
	{
		$id_kategori = $this->input->post('id_kategori');
		$nama_kategori = ucwords($this->input->post('nama_kategori'));
		$slug = str_replace(" ", "-",strtolower($nama_kategori));

		$icon2 = $_FILES['icon']['name'];

		if ($icon2==NULL) {
			$query = $this->db->query("UPDATE `tb_kategori` SET `nama_kategori` = '$nama_kategori', `slug` = '$slug' WHERE `tb_kategori`.`id_kategori` = '$id_kategori';");
			return $query;
		} else {
			$icon = $_FILES['icon']['name'];
			$config['upload_path'] = './file/';
			$config['allowed_types'] = '*';
		   	$config['overwrite'] = true;
		   	$this->load->library('upload', $config);
		   	$this->upload->do_upload('icon');
	        $this->upload->data();
			$query = $this->db->query("UPDATE `tb_kategori` SET `nama_kategori` = '$nama_kategori', `slug` = '$slug', `icon` = '$icon'  WHERE `tb_kategori`.`id_kategori` = '$id_kategori';");
			return $query;

		}

	}

function delete_kategori($id_kategori)
	{
		$query = $this->db->query("DELETE FROM `tb_kategori` WHERE `tb_kategori`.`id_kategori` = '$id_kategori'");
		return $query;
	}
}