<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// update
class Mmedsos extends CI_Model
{
	public function get_medsos()
	{
		$query = $this->db->query("SELECT * FROM `tb_medsos` ORDER BY `tb_medsos`.`id_medsos` DESC");
		return $query;
	}

	public function get_edit_medsos($id_medsos)
	{
		$query = $this->db->query("SELECT * FROM `tb_medsos` WHERE `tb_medsos`.`id_medsos` = '$id_medsos'");
		return $query;
	}

	public function insert_medsos()
	{
		$keterangan_medsos = $this->input->post('keterangan_medsos');

		$get_gambar_medsos = $_FILES['gambar_medsos']['name'];
		$gambar_medsos = str_replace(" ", "_", "$get_gambar_medsos");

		$config['upload_path'] = './medsos/';
		$config['allowed_types'] = '*';
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar_medsos');
		$this->upload->data();

		$query = $this->db->query("INSERT INTO `tb_medsos` (`id_medsos`, `url_medsos`, `gambar_medsos`, `keterangan_medsos`) VALUES (NULL, NULL, '$gambar_medsos', '$keterangan_medsos');");
		return $query;
	}

	public function update_medsos()
	{
		$id_medsos = $this->input->post('id_medsos');
		$keterangan_medsos = $this->input->post('keterangan_medsos');
		$get_gambar_medsos = $_FILES['gambar_medsos']['name'];

		$config['upload_path'] = './medsos/';
		$config['allowed_types'] = '*';
		$config['overwrite'] = true;
		$this->load->library('upload', $config);

		if (!empty($get_gambar_medsos)) {
			$this->upload->do_upload('gambar_medsos');
			$this->upload->data();
			$get_gambar_medsos = $_FILES['gambar_medsos']['name'];
			$gambar_medsos = str_replace(" ", "_", "$get_gambar_medsos");

			$query = $this->db->query("UPDATE `tb_medsos` SET `gambar_medsos` = '$gambar_medsos', `keterangan_medsos` = '$keterangan_medsos' WHERE `tb_medsos`.`id_medsos` = '$id_medsos';");
		} else {
			$query = $this->db->query("UPDATE `tb_medsos` SET `keterangan_medsos` = '$keterangan_medsos' WHERE `tb_medsos`.`id_medsos` = '$id_medsos';");
		};

		return $query;
	}

	function delete_medsos($id_medsos)
	{
		$query = $this->db->query("DELETE FROM `tb_medsos` WHERE `tb_medsos`.`id_medsos` = '$id_medsos'");
		return $query;
	}
}
