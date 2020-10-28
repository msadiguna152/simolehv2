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
		$medsos = $this->input->post('medsos');
		$url = $this->input->post('url');
		$get_icon = $_FILES['icon']['name'];

		$icon = str_replace(" ", "_", "$get_icon");

		$config['upload_path'] = './pengaturan/';
		$config['allowed_types'] = '*';
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		$this->upload->do_upload('icon');
		$this->upload->data();

		$query = $this->db->query("INSERT INTO `tb_medsos` (`id_medsos`, `medsos`, `url`, `icon`) VALUES (NULL, '$medsos', '$url', '$icon');");
		return $query;
	}

	public function update_medsos()
	{
		$id_medsos = $this->input->post('id_medsos');
		$medsos = $this->input->post('medsos');
		$url = $this->input->post('url');
		$get_icon = $_FILES['icon']['name'];

		$config['upload_path'] = './pengaturan/';
		$config['allowed_types'] = '*';
		$config['overwrite'] = true;
		$this->load->library('upload', $config);

		if (!empty($get_icon)) {
			$this->upload->do_upload('icon');
			$this->upload->data();
			$get_icon = $_FILES['icon']['name'];
			$icon = str_replace(" ", "_", "$get_icon");

			$query = $this->db->query("UPDATE `tb_medsos` SET `icon` = '$icon', `medsos` = '$medsos', `url` = '$url' WHERE `tb_medsos`.`id_medsos` = '$id_medsos';");
		} else {
			$query = $this->db->query("UPDATE `tb_medsos` SET `medsos` = '$medsos', `url` = '$url' WHERE `tb_medsos`.`id_medsos` = '$id_medsos';");
		};

		return $query;
	}

	function delete_medsos($id_medsos)
	{
		$query = $this->db->query("DELETE FROM `tb_medsos` WHERE `tb_medsos`.`id_medsos` = '$id_medsos'");
		return $query;
	}
}
