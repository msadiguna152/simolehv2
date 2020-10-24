<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// update
class Mpengguna extends CI_Model
{
	public function update_pengguna()
	{
		$id_pengguna = $this->input->post('id_pengguna');
		$nama_pengguna = $this->input->post('nama_pengguna');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password_baru'));
		$email = $this->input->post('email');
		$no_telpon = $this->input->post('no_telpon');
		$level = $this->input->post('level');
		$foto_pengguna = $_FILES['foto_pengguna']['name'];

		$config['upload_path'] = './file/';
		$config['allowed_types'] = '*';
		$config['overwrite'] = true;
		$this->load->library('upload', $config);

		if (!empty($foto_pengguna)) {
			$this->upload->do_upload('foto_pengguna');
			$this->upload->data();
			$get_foto_pengguna = $_FILES['foto_pengguna']['name'];
			$foto_pengguna2 = str_replace(" ", "_", "$get_foto_pengguna");

			$query = $this->db->query("UPDATE `tb_pengguna` SET `nama_pengguna` = '$nama_pengguna', `username` = '$username', `password` = '$password', `email` = '$email', `no_telpon` = '$no_telpon', `level` = '$level' , `foto_pengguna` = '$foto_pengguna2' WHERE `tb_pengguna`.`id_pengguna` = '$id_pengguna';");
		} else {
			$query = $this->db->query("UPDATE `tb_pengguna` SET `nama_pengguna` = '$nama_pengguna', `username` = '$username', `password` = '$password', `email` = '$email', `no_telpon` = '$no_telpon', `level` = '$level' WHERE `tb_pengguna`.`id_pengguna` = '$id_pengguna';");
		};

		return $query;

	}
}
