<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// update
class Msliders extends CI_Model
{
	public function get_sliders()
	{
		$query = $this->db->query("SELECT * FROM `tb_sliders` ORDER BY `tb_sliders`.`id_sliders` DESC");
		return $query;
	}

	public function get_edit_sliders($id_sliders)
	{
		$query = $this->db->query("SELECT * FROM `tb_sliders` WHERE `tb_sliders`.`id_sliders` = '$id_sliders'");
		return $query;
	}

	public function insert_sliders()
	{
		$keterangan_sliders = $this->input->post('keterangan_sliders');

		$get_gambar_sliders = $_FILES['gambar_sliders']['name'];
		$gambar_sliders = str_replace(" ", "_", "$get_gambar_sliders");

		$config['upload_path'] = './sliders/';
		$config['allowed_types'] = '*';
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar_sliders');
		$this->upload->data();

		$query = $this->db->query("INSERT INTO `tb_sliders` (`id_sliders`, `url_sliders`, `gambar_sliders`, `keterangan_sliders`) VALUES (NULL, NULL, '$gambar_sliders', '$keterangan_sliders');");
		return $query;
	}

	public function update_sliders()
	{
		$id_sliders = $this->input->post('id_sliders');
		$keterangan_sliders = $this->input->post('keterangan_sliders');
		$get_gambar_sliders = $_FILES['gambar_sliders']['name'];

		$config['upload_path'] = './sliders/';
		$config['allowed_types'] = '*';
		$config['overwrite'] = true;
		$this->load->library('upload', $config);

		if (!empty($get_gambar_sliders)) {
			$this->upload->do_upload('gambar_sliders');
			$this->upload->data();
			$get_gambar_sliders = $_FILES['gambar_sliders']['name'];
			$gambar_sliders = str_replace(" ", "_", "$get_gambar_sliders");

			$query = $this->db->query("UPDATE `tb_sliders` SET `gambar_sliders` = '$gambar_sliders', `keterangan_sliders` = '$keterangan_sliders' WHERE `tb_sliders`.`id_sliders` = '$id_sliders';");
		} else {
			$query = $this->db->query("UPDATE `tb_sliders` SET `keterangan_sliders` = '$keterangan_sliders' WHERE `tb_sliders`.`id_sliders` = '$id_sliders';");
		};

		return $query;
	}

	function delete_sliders($id_sliders)
	{
		$query = $this->db->query("DELETE FROM `tb_sliders` WHERE `tb_sliders`.`id_sliders` = '$id_sliders'");
		return $query;
	}
}
