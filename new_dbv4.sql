-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 05:02 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alamat`
--

CREATE TABLE `tb_alamat` (
  `id_alamat` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `rincian_alamat` text NOT NULL,
  `lat` varchar(20) NOT NULL,
  `long` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alamat`
--

INSERT INTO `tb_alamat` (`id_alamat`, `id_pembeli`, `alamat_lengkap`, `rincian_alamat`, `lat`, `long`) VALUES
(1, 1, 'Jalan Dua Mas Putra', 'Kosan berwarna Abu-abu', '-3.7550099', '114.7662845'),
(4, 3, 'Jln. Bina Bersama RT.02 RW.01 Desa Sarikandi Kec. Kurau', 'Didepan rumah yang ada pohon beringin', '-3.6055826', '114.6971873'),
(5, 3, 'Jln. Dua Mas Putra', 'Kosan warna abu-abu', '-3.6055826', '114.6971873'),
(6, -1, 'Pelaihari Pelaihari,Tanah Laut Regency,South Kalimantan,Indonesia', 'Deket Tembok', '-3.7901775', '114.7380385'),
(7, -1, ' E9,Belimbing Baru,Sungai Pinang,Banjar,Kalimantan Selatan,Indonesia,70675', '', '-3.0926522132106093', '115.28377995767212'),
(8, 25, 'Teras Teras,Boyolali Regency,Central Java,Indonesia', '', '-7.540383299999998', '110.6586087'),
(9, 25, 'Angsau Angsau,Pelaihari,Tanah Laut Regency,South Kalimantan,Indonesia', '', '-3.7935672', '114.7795914'),
(10, 19, 'Pelaihari Pelaihari,Tanah Laut Regency,South Kalimantan,Indonesia', 'Mantap', '-3.7901775', '114.7380385');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `icon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `slug`, `icon`) VALUES
(1, 'Makanan', 'makanan', '8.svg'),
(2, 'Minuman', 'minuman', '5.svg'),
(3, 'Pakaian', 'pakaian', '7.svg'),
(4, 'Seafood', 'Seafood', '4.svg'),
(6, 'Minuman Es', 'minuman-es', '1.svg'),
(7, 'Minuman Dingin', 'minuman-dingin', '1.svg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_medsos`
--

CREATE TABLE `tb_medsos` (
  `id_medsos` int(11) NOT NULL,
  `medsos` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_medsos`
--

INSERT INTO `tb_medsos` (`id_medsos`, `medsos`, `url`, `icon`) VALUES
(3, 'Instagram', 'https://www.instagram.com/adiguna152/', 'instagram.svg'),
(4, 'Facebook', 'https://www.facebook.com/msadiguna.fromsarikandi', 'Facebook.svg'),
(5, 'WhatApps', 'https://api.whatsapp.com/send?phone=6285245462842', 'WhatsApp.svg'),
(6, 'line', 'line.com', 'instagram.svg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `kode_pembayaran` varchar(50) DEFAULT NULL,
  `id_pesanan` int(11) NOT NULL,
  `jenis_pembayaran` varchar(20) NOT NULL,
  `tanggal_pembayaran` datetime DEFAULT CURRENT_TIMESTAMP,
  `status_pembayaran` varchar(20) NOT NULL,
  `checkout_url` text,
  `account_number` varchar(255) DEFAULT NULL,
  `expired_pembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `kode_pembayaran`, `id_pesanan`, `jenis_pembayaran`, `tanggal_pembayaran`, `status_pembayaran`, `checkout_url`, `account_number`, `expired_pembayaran`) VALUES
(2, 'ovo-ewallet-1603353604-1678811808', 11, 'OVO', '2020-10-22 08:00:06', 'PENDING', NULL, NULL, NULL),
(3, 'linkaja-ewallet-1603355509-1835002799', 12, 'LINKAJA', '2020-10-22 08:31:51', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/d88131e1-bba4-4aca-96ed-865ce0939563', NULL, NULL),
(4, 'linkaja-ewallet-1603355541-1503702071', 13, 'LINKAJA', '2020-10-22 08:32:23', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/f897932a-802e-4625-945e-daf836728fe7', NULL, NULL),
(5, 'linkaja-ewallet-1603355616-337973535', 14, 'LINKAJA', '2020-10-22 08:33:37', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/8e316c4f-616c-400f-a1ea-4ecca369d1b6', NULL, NULL),
(6, 'linkaja-ewallet-1603355804-428871190', 15, 'LINKAJA', '2020-10-22 08:36:46', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/db1c7e69-7114-4681-8abe-532292566d63', NULL, NULL),
(7, 'linkaja-ewallet-1603356458-1907025393', 16, 'LINKAJA', '2020-10-22 08:47:40', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/475e0563-7041-45b1-9fdb-9b249d287133', NULL, NULL),
(8, 'linkaja-ewallet-1603356843-1365151914', 17, 'LINKAJA', '2020-10-22 08:54:34', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/08d5c334-0769-4f5c-9329-e80857a4e712', NULL, NULL),
(9, 'linkaja-ewallet-1603356991-468288546', 18, 'LINKAJA', '2020-10-22 08:56:33', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/e96aa788-34cb-48c3-9746-e411543be9b4', NULL, NULL),
(10, 'linkaja-ewallet-1603357077-525615870', 19, 'LINKAJA', '2020-10-22 08:57:58', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/ff65b337-04ba-4476-b2c2-c61e097a6674', NULL, NULL),
(11, 'linkaja-ewallet-1603357153-1330922297', 20, 'LINKAJA', '2020-10-22 08:59:16', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/6b8fa48c-7c66-40a5-a6e8-eccc92940c47', NULL, NULL),
(12, 'linkaja-ewallet-1603357246-1529388928', 21, 'LINKAJA', '2020-10-22 09:00:48', 'FAILED', 'https://ewallet-linkaja-dev.xendit.co/checkouts/9c0ef706-d30b-49bd-8fea-f148f4ebbe44', NULL, NULL),
(13, 'linkaja-ewallet-1603357328-2046577849', 22, 'LINKAJA', '2020-10-22 09:02:09', 'SUCCESS_COMPLETED', 'https://ewallet-linkaja-dev.xendit.co/checkouts/8c1bcc79-da55-438c-a814-a80c6a2a22e4', NULL, NULL),
(14, 'linkaja-ewallet-1603357407-211544931', 23, 'LINKAJA', '2020-10-22 09:03:59', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/9b2ed3d7-6419-4d6d-a278-aa3ab694d9bd', NULL, NULL),
(15, 'linkaja-ewallet-1603358237-418767827', 24, 'LINKAJA', '2020-10-22 09:17:19', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/7385dd23-7457-4b0a-b00d-2e2276ec7b36', NULL, NULL),
(16, 'linkaja-ewallet-1603358286-266686618', 25, 'LINKAJA', '2020-10-22 09:18:08', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/14ab5201-7752-4aa2-bb74-158e56d71b13', NULL, NULL),
(17, 'linkaja-ewallet-1603358304-110029616', 26, 'LINKAJA', '2020-10-22 09:18:26', 'SUCCESS_COMPLETED', 'https://ewallet-linkaja-dev.xendit.co/checkouts/32b11f6b-3648-47ad-ab9d-0b7a2ec22e30', NULL, NULL),
(18, 'linkaja-ewallet-1603358322-1683245877', 27, 'LINKAJA', '2020-10-22 09:18:44', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/ce3b8c1d-b3ff-45c2-906e-8e562ec5c01e', NULL, NULL),
(19, 'linkaja-ewallet-1603358351-1071062616', 28, 'LINKAJA', '2020-10-22 09:19:13', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/5532e614-7763-40e8-ab29-e3a10525bbef', NULL, NULL),
(20, 'linkaja-ewallet-1603358367-1321709855', 29, 'LINKAJA', '2020-10-22 09:19:29', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/ef588b77-0bcb-4e62-af44-1cc1095703a1', NULL, NULL),
(21, 'linkaja-ewallet-1603358377-1272838503', 30, 'LINKAJA', '2020-10-22 09:20:09', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/a42b7fe7-d3e5-471f-90ac-08ac45b24a69', NULL, NULL),
(22, 'linkaja-ewallet-1603358471-454390012', 31, 'LINKAJA', '2020-10-22 09:21:13', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/4b3e7a8b-c996-423c-8cc4-c89de87200e3', NULL, NULL),
(23, 'linkaja-ewallet-1603358491-1140602723', 32, 'LINKAJA', '2020-10-22 09:21:33', 'PENDING', 'https://ewallet-linkaja-dev.xendit.co/checkouts/66d11609-ade3-4790-aa48-e230888d24b5', NULL, NULL),
(24, 'ovo-ewallet-1603358555-569895606', 33, 'OVO', '2020-10-22 09:22:37', 'COMPLETED', 'NULL', NULL, NULL),
(25, 'ovo-ewallet-1603360190-1654037261', 34, 'OVO', '2020-10-22 09:49:51', 'COMPLETED', 'NULL', NULL, NULL),
(26, 'MANDIRI-bank1603360483-1210423251', 36, 'MANDIRI', '2020-10-22 09:54:44', 'PENDING', NULL, '889089999675676', '2051-10-21T17:00:00.000Z'),
(27, 'MANDIRI-bank1603360618-1496816200', 37, 'MANDIRI', '2020-10-22 09:56:59', 'PENDING', NULL, '889089999519457', '2051-10-21T17:00:00.000Z'),
(28, 'MANDIRI-bank1603360829-94812040', 38, 'MANDIRI', '2020-10-22 10:00:31', 'PENDING', NULL, '889089999360261', '2051-10-21T17:00:00.000Z'),
(29, 'MANDIRI-bank1603360838-1974337923', 39, 'MANDIRI', '2020-10-22 10:00:39', 'PENDING', NULL, '889089999746862', '2051-10-21T17:00:00.000Z'),
(30, 'MANDIRI-bank1603360846-335712828', 40, 'MANDIRI', '2020-10-22 10:00:47', 'SUCCESS', NULL, '889089999735519', '2051-10-21T17:00:00.000Z'),
(31, 'MANDIRI-bank1603360857-1621083648', 41, 'MANDIRI', '2020-10-22 10:00:58', 'PENDING', NULL, '889089999755466', '2051-10-21T17:00:00.000Z'),
(32, 'BCA-bank1603363342-661343236', 42, 'COD', '2020-10-22 10:42:23', 'Sudah Dibayar', NULL, '107669999729502', '2051-10-21T17:00:00.000Z');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembeli`
--

CREATE TABLE `tb_pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembeli`
--

INSERT INTO `tb_pembeli` (`id_pembeli`, `id_pengguna`, `nama_pembeli`, `no_telpon`, `email`) VALUES
(1, NULL, 'Adiguna', '6285245462842', 'msadiguna152@gmail.com'),
(3, NULL, 'Syahbani Adiguna', '6295245462842', 'dev@gopedia.id'),
(18, NULL, 'Dio', '0878-7687-6876', NULL),
(19, NULL, 'Dio', '0878-7687-6876', NULL),
(20, NULL, 'Dio', '0878-7687-6800', NULL),
(21, NULL, 'Dio', '0878-7687-6876', NULL),
(22, NULL, 'Paijo', '0989-8298-382', NULL),
(23, NULL, 'Paijo', '1231-2312-3123', NULL),
(24, NULL, 'Paijo', '0832-8793-842', NULL),
(25, NULL, 'Paijo', '0887-8767-5656', NULL),
(26, 6, 'Adiguna v3', '085252283152', 'ms'),
(27, 7, 'Muhammad Syahbani Adiguna', '085252283152', 'msadiguna152@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaturan`
--

CREATE TABLE `tb_pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `nama_bisnis` varchar(50) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `alamat_toko` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `tipe_ongkir` int(11) DEFAULT NULL,
  `harga_ongkir_flat` varchar(20) DEFAULT NULL,
  `harga_ongkir_perkm` varchar(20) DEFAULT NULL,
  `google_api_key` text,
  `xendit_api` text,
  `icon` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengaturan`
--

INSERT INTO `tb_pengaturan` (`id_pengaturan`, `nama_bisnis`, `no_wa`, `alamat_toko`, `kota`, `provinsi`, `latitude`, `longitude`, `tipe_ongkir`, `harga_ongkir_flat`, `harga_ongkir_perkm`, `google_api_key`, `xendit_api`, `icon`) VALUES
(1, 'Testing Nama Aplikasi', '6285245462842', 'Jln. Bina Bersama RT.01 RW.02 Desa Sarikandi Kecamatan Kurau', 'Tanah Laut', 'Kalimantan Selatan', '-3.799686', '114.746696', 2, '2000', '3000', '1234456', '123456789', 'logo_d.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `foto_pengguna` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `foto_pengguna`, `username`, `password`, `email`, `no_telpon`, `level`) VALUES
(1, 'Adiguna', 'logo_d.png', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'msadiguna152@gmail.com', '085245462842', 'Admin'),
(2, 'Adiguna Kurir', NULL, '2', '2', 'msadiguna152@gmail.com', '1234', 'Kurir'),
(3, 'Adiguna Kurir v2', 'logo_d.png', '3', '202cb962ac59075b964b07152d234b70', 'msadiguna152@gmail.com', '1234', 'Kurir'),
(5, 'Adiguna', 'aa5E5Cyybn.jpg', '2', 'd41d8cd98f00b204e9800998ecf8427e', 'gomarket.id@gopedia.id', '1123', 'Kurir'),
(6, 'Adiguna v3', 'user.png', 'ms', '202cb962ac59075b964b07152d234b70', 'ms', '085252283152', 'Pembeli'),
(7, 'Muhammad Syahbani Adiguna', 'KRN_7852edit.jpg', 'msadiguna152@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'msadiguna152@gmail.com', '085252283152', 'Pembeli');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `total_pembayaran` varchar(50) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `ongkir` int(20) NOT NULL,
  `voucher` varchar(20) NOT NULL,
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_alamat`, `id_pengguna`, `total_pembayaran`, `tanggal_pesanan`, `status`, `ongkir`, `voucher`, `catatan`) VALUES
(8, 9, NULL, '89150', '2020-10-22 07:40:33', 'PENDING', 11150, '0', 'Tahu dan segalanya harus disimpan dalam tempat hangat.		'),
(11, 9, NULL, '89150', '2020-10-22 08:00:05', 'Pemesanan', 11150, '0', 'Tahu dan segalanya harus disimpan dalam tempat hangat.'),
(12, 9, NULL, '89150', '1970-01-01 00:00:00', 'Pemesanan', 11150, '0', 'Tahu dan segalanya harus disimpan dalam tempat hangat.		'),
(13, 9, NULL, '89150', '2020-10-22 08:32:23', 'Pemesanan', 11150, '0', 'Tahu dan segalanya harus disimpan dalam tempat hangat.		'),
(14, 9, NULL, '89150', '2020-10-22 08:33:37', 'Pemesanan', 11150, '0', 'Tahu dan segalanya harus disimpan dalam tempat hangat.		'),
(15, 9, NULL, '89150', '2020-10-22 08:36:46', 'Pemesanan', 11150, '0', 'Tahu dan segalanya harus disimpan dalam tempat hangat.		'),
(16, 10, NULL, '9290', '2020-10-22 08:47:40', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?'),
(17, 10, NULL, '9290', '2020-10-22 08:54:34', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?'),
(18, 10, NULL, '18290', '2020-10-22 08:56:33', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(19, 10, NULL, '18290', '2020-10-22 08:57:58', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(20, 10, NULL, '18290', '2020-10-22 08:59:16', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(21, 10, NULL, '18290', '2020-10-22 09:00:48', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(22, 10, NULL, '18290', '2020-10-22 09:02:09', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(23, 10, NULL, '18290', '2020-10-22 09:03:59', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(24, 10, NULL, '18290', '2020-10-22 09:17:19', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(25, 10, NULL, '18290', '2020-10-22 09:18:08', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(26, 10, NULL, '18290', '2020-10-22 09:18:26', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(27, 10, NULL, '18290', '2020-10-22 09:18:44', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(28, 10, NULL, '18290', '2020-10-22 09:19:13', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(29, 10, NULL, '18290', '2020-10-22 09:19:29', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(30, 10, NULL, '18290', '2020-10-22 09:20:09', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(31, 10, NULL, '18290', '2020-10-22 09:21:13', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(32, 10, NULL, '18290', '2020-10-22 09:21:33', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?		'),
(33, 10, NULL, '18290', '2020-10-22 09:22:37', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?				'),
(34, 10, NULL, '18290', '2020-10-22 09:49:51', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?				'),
(36, 10, NULL, '18290', '2020-10-22 09:54:44', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?						'),
(37, 10, NULL, '18290', '2020-10-22 09:56:59', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?						'),
(38, 10, NULL, '18290', '2020-10-22 10:00:31', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?						'),
(39, 10, 3, '18290', '2020-10-22 10:00:39', '1', 4290, '0', 'Yang enak ya anunya?						'),
(40, 10, NULL, '18290', '2020-10-22 10:00:47', 'Pemesanan', 4290, '0', 'Yang enak ya anunya?						'),
(41, 10, 2, '18290', '2020-10-22 10:00:58', '1', 4290, '0', 'Yang enak ya anunya?						'),
(42, 10, 3, '48290', '2020-10-22 10:42:23', '4', 4290, '0', 'Yang enak ya anunya?						');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `harga_promosi` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `promosi` int(11) NOT NULL,
  `terlaris` int(11) NOT NULL,
  `slug_p` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `harga_promosi`, `deskripsi`, `gambar`, `promosi`, `terlaris`, `slug_p`) VALUES
(1, 1, 'Wadai Untuk', '1000', '1000', 'Testing', 'v1.jpg', 0, 0, 'wadai-untuk-GCevT'),
(2, 1, 'Okkey Jelly Drink', '2000', '2000', ' Minuman Ringan Penunda LaparMinuman Ringan Penunda LaparMinuman Ringan Penunda LaparMinuman Ringan Penunda LaparMinuman Ringan Penunda Lapar', 'v1.jpg', 1, 1, 'okkey-jelly-drink-e9PmM'),
(3, 2, 'Es Kelapa Muda', '2000', '2000', 'test', 'v1.jpg', 1, 1, 'es-kelapa-muda-ZEt9K'),
(4, 2, 'Es Satrup', '5000', '5000', 'Minuman dingin rasa satrup, pelepas lelah.', 'aa5E5Cyybn.jpg', 1, 1, 'es-satrup-jgdu5'),
(5, 2, 'Es Kelapa Muda', '10000', '10000', 'testingggg', 'aa5E5Cyybn.jpg', 0, 0, 'es-kelapa-muda-ZNgcf'),
(6, 4, 'Tahu Ayam', '5000', '5000', 'tahu rasa ayam', 'aa5E5Cyybn.jpg', 1, 1, 'tahu-ayam-sP45m'),
(7, 7, 'Tahu Ayam', '5000', '2000', 'tahu rasa ayam', 'aa5E5Cyybn.jpg', 1, 0, 'tahu-ayam-zpu6F');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rincian_pesanan`
--

CREATE TABLE `tb_rincian_pesanan` (
  `id_rincian_pesanan` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `banyak` varchar(20) NOT NULL,
  `sub_total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rincian_pesanan`
--

INSERT INTO `tb_rincian_pesanan` (`id_rincian_pesanan`, `id_pesanan`, `id_produk`, `banyak`, `sub_total`) VALUES
(1, 1, 1, '2', '300000'),
(2, 1, 2, '3', '10000'),
(3, 2, 1, '2', '2000'),
(4, 2, 3, '8', '16000'),
(5, 2, 4, '8', '40000'),
(6, 2, 5, '2', '20000'),
(7, 3, 1, '2', '2000'),
(8, 3, 3, '8', '16000'),
(9, 3, 4, '8', '40000'),
(10, 3, 5, '2', '20000'),
(11, 4, 1, '2', '2000'),
(12, 4, 3, '8', '16000'),
(13, 4, 4, '8', '40000'),
(14, 4, 5, '2', '20000'),
(15, 5, 1, '2', '2000'),
(16, 5, 3, '8', '16000'),
(17, 5, 4, '8', '40000'),
(18, 5, 5, '2', '20000'),
(19, 6, 1, '2', '2000'),
(20, 6, 3, '8', '16000'),
(21, 6, 4, '8', '40000'),
(22, 6, 5, '2', '20000'),
(23, 7, 1, '2', '2000'),
(24, 7, 3, '8', '16000'),
(25, 7, 4, '8', '40000'),
(26, 7, 5, '2', '20000'),
(27, 8, 1, '2', '2000'),
(28, 8, 3, '8', '16000'),
(29, 8, 4, '8', '40000'),
(30, 8, 5, '2', '20000'),
(31, 11, 1, '2', '2000'),
(32, 11, 3, '8', '16000'),
(33, 11, 4, '8', '40000'),
(34, 11, 5, '2', '20000'),
(35, 12, 1, '2', '2000'),
(36, 12, 3, '8', '16000'),
(37, 12, 4, '8', '40000'),
(38, 12, 5, '2', '20000'),
(39, 13, 1, '2', '2000'),
(40, 13, 3, '8', '16000'),
(41, 13, 4, '8', '40000'),
(42, 13, 5, '2', '20000'),
(43, 14, 1, '2', '2000'),
(44, 14, 3, '8', '16000'),
(45, 14, 4, '8', '40000'),
(46, 14, 5, '2', '20000'),
(47, 15, 1, '2', '2000'),
(48, 15, 3, '8', '16000'),
(49, 15, 4, '8', '40000'),
(50, 15, 5, '2', '20000'),
(51, 16, 1, '1', '1000'),
(52, 16, 2, '4', '4000'),
(53, 17, 1, '1', '1000'),
(54, 17, 2, '4', '4000'),
(55, 18, 1, '3', '3000'),
(56, 18, 2, '5', '5000'),
(57, 18, 3, '3', '6000'),
(58, 19, 1, '3', '3000'),
(59, 19, 2, '5', '5000'),
(60, 19, 3, '3', '6000'),
(61, 20, 1, '3', '3000'),
(62, 20, 2, '5', '5000'),
(63, 20, 3, '3', '6000'),
(64, 21, 1, '3', '3000'),
(65, 21, 2, '5', '5000'),
(66, 21, 3, '3', '6000'),
(67, 22, 1, '3', '3000'),
(68, 22, 2, '5', '5000'),
(69, 22, 3, '3', '6000'),
(70, 23, 1, '3', '3000'),
(71, 23, 2, '5', '5000'),
(72, 23, 3, '3', '6000'),
(73, 24, 1, '3', '3000'),
(74, 24, 2, '5', '5000'),
(75, 24, 3, '3', '6000'),
(76, 25, 1, '3', '3000'),
(77, 25, 2, '5', '5000'),
(78, 25, 3, '3', '6000'),
(79, 26, 1, '3', '3000'),
(80, 26, 2, '5', '5000'),
(81, 26, 3, '3', '6000'),
(82, 27, 1, '3', '3000'),
(83, 27, 2, '5', '5000'),
(84, 27, 3, '3', '6000'),
(85, 28, 1, '3', '3000'),
(86, 28, 2, '5', '5000'),
(87, 28, 3, '3', '6000'),
(88, 29, 1, '3', '3000'),
(89, 29, 2, '5', '5000'),
(90, 29, 3, '3', '6000'),
(91, 30, 1, '3', '3000'),
(92, 30, 2, '5', '5000'),
(93, 30, 3, '3', '6000'),
(94, 31, 1, '3', '3000'),
(95, 31, 2, '5', '5000'),
(96, 31, 3, '3', '6000'),
(97, 32, 1, '3', '3000'),
(98, 32, 2, '5', '5000'),
(99, 32, 3, '3', '6000'),
(100, 33, 1, '3', '3000'),
(101, 33, 2, '5', '5000'),
(102, 33, 3, '3', '6000'),
(103, 34, 1, '3', '3000'),
(104, 34, 2, '5', '5000'),
(105, 34, 3, '3', '6000'),
(106, 36, 1, '3', '3000'),
(107, 36, 2, '5', '5000'),
(108, 36, 3, '3', '6000'),
(109, 37, 1, '3', '3000'),
(110, 37, 2, '5', '5000'),
(111, 37, 3, '3', '6000'),
(112, 38, 1, '3', '3000'),
(113, 38, 2, '5', '5000'),
(114, 38, 3, '3', '6000'),
(115, 39, 1, '3', '3000'),
(116, 39, 2, '5', '5000'),
(117, 39, 3, '3', '6000'),
(118, 40, 1, '3', '3000'),
(119, 40, 2, '5', '5000'),
(120, 40, 3, '3', '6000'),
(121, 41, 1, '3', '3000'),
(124, 42, 1, '3', '3000'),
(125, 42, 2, '5', '5000'),
(126, 42, 3, '3', '6000'),
(127, 42, 5, '3', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sliders`
--

CREATE TABLE `tb_sliders` (
  `id_sliders` int(11) NOT NULL,
  `url_sliders` text,
  `gambar_sliders` text NOT NULL,
  `keterangan_sliders` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sliders`
--

INSERT INTO `tb_sliders` (`id_sliders`, `url_sliders`, `gambar_sliders`, `keterangan_sliders`) VALUES
(1, 'https://www.google.com/search?q=nasi+uduk&rlz=1C1GCEA_enID900ID900&oq=nasi+uduk&aqs=chrome..69i57.2081j0j1&sourceid=chrome&ie=UTF-8', 'aa5E5Cyybn.jpg', 'test'),
(2, 'https://www.google.com/search?q=nasi+uduk&rlz=1C1GCEA_enID900ID900&oq=nasi+uduk&aqs=chrome..69i57.2081j0j1&sourceid=chrome&ie=UTF-8', 'aa5E5Cyybn.jpg', 'Bagus1'),
(3, 'testing.cpm', 'aa5E5Cyybn.jpg', 'Makanan Ringan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alamat`
--
ALTER TABLE `tb_alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_medsos`
--
ALTER TABLE `tb_medsos`
  ADD PRIMARY KEY (`id_medsos`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_rincian_pesanan`
--
ALTER TABLE `tb_rincian_pesanan`
  ADD PRIMARY KEY (`id_rincian_pesanan`);

--
-- Indexes for table `tb_sliders`
--
ALTER TABLE `tb_sliders`
  ADD PRIMARY KEY (`id_sliders`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alamat`
--
ALTER TABLE `tb_alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_medsos`
--
ALTER TABLE `tb_medsos`
  MODIFY `id_medsos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_rincian_pesanan`
--
ALTER TABLE `tb_rincian_pesanan`
  MODIFY `id_rincian_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `tb_sliders`
--
ALTER TABLE `tb_sliders`
  MODIFY `id_sliders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
