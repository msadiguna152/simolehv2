<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// update
class Makun extends CI_Model{

	function regis(){
		$nama_pembeli = $this->input->post('nama_pembeli');
		$email = $this->input->post('email');
		$no_telpon = $this->input->post('no_telpon');
		$password = md5($this->input->post('password'));

		$query = $this->db->query("INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `foto_pengguna`, `username`, `password`, `email`, `no_telpon`, `level`) VALUES (NULL, '$nama_pembeli', 'user.png', '$email', '$password', '$email', '$no_telpon', 'Pembeli');");

		$lastid = $this->db->insert_id();

		$query2 = $this->db->query("INSERT INTO `tb_pembeli` (`id_pembeli`, `id_pengguna`, `nama_pembeli`, `no_telpon`, `email`) VALUES (NULL, '$lastid', '$nama_pembeli', '$no_telpon', '$email');");

		return $query;
	}

	function update_regis(){
		$id_pengguna = $this->input->post('id_pengguna');
		$nama_pengguna = $this->input->post('nama_pengguna');
		$email = $this->input->post('email');
		$no_telpon = $this->input->post('no_telpon');
		$password = md5($this->input->post('password'));

		$foto = $_FILES['foto_pengguna']['name'];

		$config['upload_path'] = './assets2/img/';
		$config['allowed_types'] = '*';
		$config['overwrite'] = true;
		$this->load->library('upload', $config);

		if (!empty($foto)) {
			$this->upload->do_upload('foto_pengguna');
			$this->upload->data();

			$foto_pengguna = str_replace(" ", "_", "$foto");

			if (empty($password)) {
				$query = $this->db->query("UPDATE `tb_pengguna` SET `nama_pengguna` = '$nama_pengguna', `foto_pengguna` = '$foto_pengguna', `username` = '$email', `email` = '$email', `no_telpon` = '$no_telpon' WHERE `tb_pengguna`.`id_pengguna` = '$id_pengguna';");
			} else {
				$query = $this->db->query("UPDATE `tb_pengguna` SET `nama_pengguna` = '$nama_pengguna', `foto_pengguna` = '$foto_pengguna', `username` = '$email', `password` = '$password', `email` = '$email', `no_telpon` = '$no_telpon' WHERE `tb_pengguna`.`id_pengguna` = '$id_pengguna';");
			}
			
			$queryPembeli = $this->db->query("UPDATE `tb_pembeli` SET `nama_pembeli` = '$nama_pengguna', `no_telpon` = '$no_telpon', `email` = '$email' WHERE `tb_pembeli`.`id_pengguna` = '$id_pengguna';");
		} else {
			if (empty($password)) {
				$query = $this->db->query("UPDATE `tb_pengguna` SET `nama_pengguna` = '$nama_pengguna', `username` = '$email', `email` = '$email', `no_telpon` = '$no_telpon' WHERE `tb_pengguna`.`id_pengguna` = '$id_pengguna';");
			} else {
				$query = $this->db->query("UPDATE `tb_pengguna` SET `nama_pengguna` = '$nama_pengguna', `username` = '$email', `password` = '$password', `email` = '$email', `no_telpon` = '$no_telpon' WHERE `tb_pengguna`.`id_pengguna` = '$id_pengguna';");
			}

			$queryPembeli = $this->db->query("UPDATE `tb_pembeli` SET `nama_pembeli` = '$nama_pengguna', `no_telpon` = '$no_telpon', `email` = '$email' WHERE `tb_pembeli`.`id_pengguna` = '$id_pengguna';");
		};

		return $query;
	}

	function cek($username, $password){
		$query = $this->db->query("SELECT * FROM tb_pengguna WHERE username='$username' AND password='$password'");
		return $query;
	}	
}