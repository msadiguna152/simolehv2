<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mproduk extends CI_Model {

public function get_produk()
	{
		$query = $this->db->query("SELECT * FROM `tb_produk` JOIN tb_kategori ON tb_kategori.id_kategori=tb_produk.id_kategori ORDER BY `tb_produk`.`id_produk` DESC");
		return $query;
	}

public function get_detail_produk($id_produk)
	{
		$query = $this->db->query("SELECT * FROM `tb_produk` JOIN tb_kategori ON tb_kategori.id_kategori=tb_produk.id_kategori WHERE `tb_produk`.`id_produk` = '$id_produk'");
		return $query;
	}

public function get_edit_produk($id_produk)
	{
		$query = $this->db->query("SELECT * FROM `tb_produk` WHERE `tb_produk`.`id_produk` = '$id_produk'");
		return $query;
	}

public function insert_produk()
	{
		$id_kategori = $this->input->post('id_kategori');
		$nama_produk = $this->input->post('nama_produk');
		$harga = $this->input->post('harga');
		$harga_promosi = $this->input->post('harga_promosi');
		$deskripsi = $this->input->post('deskripsi');

		if ($this->input->post('promosi')==1) {
			$promosi = 1;
		} else {
			$promosi = 0;
		}
		if ($this->input->post('terlaris')==1) {
			$terlaris = 1;
		} else {
			$terlaris = 0;
		}

		$gambar = $_FILES['gambar']['name'];
		$config['upload_path'] = './file/';
		$config['allowed_types'] = '*';
		//$config['file_name'] = $gambar;
	   	//$config['max_size'] = 2048; // 1MB
	   	$config['overwrite'] = true;
	   	$this->load->library('upload', $config);
	   	$this->upload->do_upload('gambar');
        $this->upload->data();

		$query = $this->db->query("INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `harga_promosi`, `deskripsi`, `gambar`, `promosi`, `terlaris`) VALUES (NULL, '$id_kategori', '$nama_produk', '$harga', '$harga_promosi', '$deskripsi', '$gambar', '$promosi', '$terlaris');");
		return $query;
	}

public function update_produk()
	{
		$id_produk = $this->input->post('id_produk');
		$id_kategori = $this->input->post('id_kategori');
		$nama_produk = $this->input->post('nama_produk');
		$harga = $this->input->post('harga');
		$harga_promosi = $this->input->post('harga_promosi');
		$deskripsi = $this->input->post('deskripsi');
		$gambar = $_FILES['gambar']['name'];

		if ($this->input->post('promosi')==1) {
			$promosi = 1;
		} else {
			$promosi = 0;
		}
		if ($this->input->post('terlaris')==1) {
			$terlaris = 1;
		} else {
			$terlaris = 0;
		}

		$config['upload_path'] = './file/';
		$config['allowed_types'] = '*';
		//$config['file_name'] = $gambar;
	   	//$config['max_size'] = 2048; // 1MB
	   	$config['overwrite'] = true;
	   	$this->load->library('upload', $config);

		if (!empty($gambar)) {
			$this->upload->do_upload('gambar');
         	$this->upload->data();
		    $gambar2 = $_FILES['gambar']['name'];
		    
		    $query = $this->db->query("UPDATE `tb_produk` SET `id_kategori` = '$id_kategori', `nama_produk` = '$nama_produk', `harga` = '$harga', `harga_promosi` = '$harga', `deskripsi` = '$deskripsi', `gambar` = '$gambar2', `promosi` = '$promosi', `terlaris` = '$terlaris' WHERE `tb_produk`.`id_produk` = '$id_produk';");
		} else {
			$query = $this->db->query("UPDATE `tb_produk` SET `id_kategori` = '$id_kategori', `nama_produk` = '$nama_produk', `harga` = '$harga', `harga_promosi` = '$harga', `deskripsi` = '$deskripsi', `promosi` = '$promosi', `terlaris` = '$terlaris' WHERE `tb_produk`.`id_produk` = '$id_produk';");
		};

		return $query;

	}

function delete_produk($id_produk)
	{
		$query = $this->db->query("DELETE FROM `tb_produk` WHERE `tb_produk`.`id_produk` = '$id_produk'");
		return $query;
	}
}